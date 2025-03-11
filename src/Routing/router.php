<?php
declare(strict_types=1);
// namespace Linkly\Routing;
// require( __DIR__ . "/src/Http/Request.php" );
// require( __DIR__ . "/src/Http/Response.php");
require("/home/dburgess923/dev.demetriusburgess.com/linkly/src/Http/Request.php" );
require("/home/dburgess923/dev.demetriusburgess.com/linkly/src/Http/Response.php");

// use Linkly\Https\Request;

class Router {

	private string $path;

	private array $uri = [];

	private string $method;

	private array $action = [];
	
	private bool $route_not_found = true;
	
	private array $status_codes = [
			200 => "OK",
			304 => "Not Modified",
			400 => "Bad Request",
			401 => "Unauthorized",
			403 => "Forbidden",
			404 => "Not Found",
			406 => "Not Acceptable",
			410 => "Gone",
			420 => "Enhance Your Calm",
			422 => "Unprocessable Entity",
			429 => "Too Many Requests",
			500 => "Internal Server Error",
			502 => "Bad Gateway",
			503 => "Service Unavailable",
			504 => "Gateway timeout",
	];

	public Request $request;

	public function __construct( Request $request ) {
		ob_start();
		$this->method = $request->method();
		$this->path   = $request->path();
		$this->request = $request;
	}

	public function add(string $method, string $uri, callable $handler ) {
		if (!$method) return false;
		
		if ( !is_array($this->uri[$method]) ) {
				$this->uri[ $method ] = [];
		}

		if ( !is_array($this->action[$method]) ) {
				$this->action[ $method ] = [];
		}

		$this->uri[ $method ][] = $uri == "/" ? "/" :  rtrim(trim($uri, "/"),"/");

		if ( is_callable($handler) ) {
				$h = $handler->bindTo( $this );
				$this->action[ $method ][] = $h;
		}
	}

	public function any(string $uri, callable $handler ):void {
		foreach ( ["GET","POST","PUT","HEAD","DELETE"] as $key => $val ) {
			$this->add( $val, $uri, $handler );
		}
	}

	public function which(array $methods = [], string $uri, callable $handler):void {
		foreach ($methods as $key => $val ) {
			$this->add( $val, $uri, $handler );
		}
	}

	public function get(string $uri, callable $handler ):void {
		$this->add( "GET", $uri, $handler );
	}

	public function post(string $uri, callable $handler ):void {
		$this->add( "POST", $uri, $handler );
	}

	public function put(string $uri, callable $handler ):void {
		$this->add( "PUT", $uri, $handler );
	}

	public function head(string $uri, callable $handler):void {
		$this->add( "HEAD", $uri, $handler );
	}

	public function delete (string $uri, callable $handler ):void {
		$this->add( "DELETE", $uri, $handler );
	}
	
	public function do_action($key, $params) {
		return call_user_func_array($this->action[$this->method][$key], $params );
	}
	
	public function handle_route($key, $params) {
		if (!is_array($params)) $params = [];
		
		return call_user_func_array($this->action[$this->method][$key], $params );
	}

	public function run() {
		$method_matched = $this->match_method();
		$match;
		$params;
		$output;

		if ( !$method_matched ) return false;

		foreach ( $this->uri[$this->method] as $key => $val ) {
				$match = $this->path_match( $val, $this->path );
				$params = $this->extract_params( $val );
				$params = $this->parse_template_path($params, $val);			 		
				
				if ($match) {
					$this->route_not_found = false;
					$output = $this->handle_route($key, $params);
					
			
				}		
		}
		
		if ($this->route_not_found) {
			$output = (new Response())
					->set_header("Content-Type", "text/html")
					->set_status( 404 );	
		}
		
		$this->build_response( $output );
		
		ob_end_flush();
	}

	private function path_match( string $a, string $b ) {
		$a_segments;
		$b_segments;
		$match = true;

		if (preg_match_All("#^$a$#", $b)) {
			return $match;
		} else {
			$a_segments = explode("/", $a);
			$b_segments = explode("/", $b);

			if ( sizeof($a_segments) !== sizeof($b_segments) ) return false;

			for ( $i = 0; $i < sizeof($a_segments); $i++ ) {
				if ( $a_segments[$i] !== $b_segments[$i] ) {
					// if ( !preg_match('/\{([^\}]+)\}/', $a_segments[$i]) ||  !preg_match('/\{([^\}]+)\}/', $a_segments[$i]) ) {
					if ( !preg_match('/\{([^\}]+)\}/', $a_segments[$i]) &&  !preg_match('/\{([^\}]+)\}/', $b_segments[$i]) ) {
						$match = false;
					}
				}
			}

			return $match;
		}
	}

	private function extract_params( string $url_sting ):array|bool {
		$params = false;

		preg_match_all("/\{([^\}]+)\}/", $url_sting, $matches);

		if ( isset($matches[1]) ) {
			$params = array_fill_keys( $matches[1], null );
		}

		return $params;
	}
	
	private function parse_template_path(array $params, string $path) {
		if ( !$params || !$path  ) return false;	
					
		$path_segments = explode("/",$this->path);
		$keys = array_keys(preg_grep("/\{([^\}]+)\}/", explode("/", $path) ));
		$values = [];

		for ($i = 0; $i < sizeof($keys); $i++) {
			$values[] = $path_segments[$keys[$i]];
		}

		$params = array_combine(array_keys($params), $values );
		return $params;
			
	}

	private function match_method():bool {
		return (bool) in_array( $this->method, array_keys($this->uri) );
	}

	private function build_response( Response $res_obj ):void {
		$response = $res_obj instanceof Response ? $res_obj : new Response();
		$headers  = $response->get_headers();
		$code  = $response->get_status();
		$error = false;
		$output = [];
		

		http_response_code( $response->get_status() );

		foreach ( $headers as $header => $val ) {
			header( $header . ": " . $val );
		}

		if ( in_array($code, array_keys($this->status_codes)) && $code !== 200 ) {
			$error = new stdClass();
			$error->code = $code;
			$error->message = $this->status_codes[ $code ] . $response->get_status_message();;
		}

		if ($error) {
			$output[ "error" ] = $error;
		}
		
		$output[ "data" ] = $response->get_body();
		
		if ($response->get_header('Content-Type') == 'application/json')  {
			echo json_encode( $output ); 
			return;
		}
		
		echo $output['data'];           
	}

}

?>
