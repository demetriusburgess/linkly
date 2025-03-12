<?php
	declare(strict_types=1);
    
    // namespace Linkly\Http;

	class Request {

		protected string $root;

		protected string $url;

		protected string $path;

		protected array $input;

		protected string $method;

		protected array $headers;

		protected array $files;

		protected bool $secure;

		protected string $ip;

		protected array $segments;

		protected array $server;

		protected string $protocol;

		public function __construct(string $req_var, array $request, array $server, array $files) {
         	$this->secure 	= isset($server['HTTPS']) && !empty($server['HTTPS']);
         	$this->protocol = $this->is_secure() ? "https://" : "http://";

         	$this->root 	= $server['SERVER_NAME'];
			$this->path     = isset($request[ $req_var ]) ? $request[$req_var] : "";
			$this->url 		= $this->protocol . $this->root . $this->path;

			$this->segments = explode("/",rtrim( $this->path, "/" ));

			$this->method 	= $server['REQUEST_METHOD'];
			$this->sever 	= $server;
			
			$this->files = [];

			if ( sizeof($files) > 0 ) {
				foreach ($files as $file) {
					$finfo = new SplFileInfo( $file["tmp_name"] );

					if ( $finfo->isfile() ) {
						$this->files[ $file[ "name" ] ] = $finfo;
					}
				}

			}

			if ( $this->method == "POST" && array_key_exists("HTTP_X_HTTP_METHOD", $server) ) {
				if ( $server["HTTP_X_HTTP_METHOD"] == "DELETE" ) {
					$this->method = "DELETE";
				} else if ( $server["HTTP_X_HTTP_METHOD"] == "PUT" ) {
					$this->method = "PUT";
				} else {
					throw Exception("Unexpected Request Method");
				}
			}

			switch ( $this->method ) {
				case 'DELETE':
					break;
				case 'POST':
					$this->request = $this->_sanitize($_POST);
					$this->input   = $this->request;
					break;
				case 'GET':
					$this->request = $this->_sanitize($_GET);
					$this->input   = array_slice( $this->request, 1 );
					break;
				case 'PUT':
					$this->request = $this->_sanitize($_GET);
					$this->file    = file_get_contents("php://input");
					$this->input   = array_slice( $this->request, 1 );
					break;
				default:
					# code...
					break;
			}


			$this->headers = $this->parse_headers( $server );
			
			if ($this->has_header("cookie")) {
				$this->cookies = $this->parse_cookies( $this->header( "Cookie" ) );
			}

		}

		public function url():string {
			return $this->url;
		}

		public function path():string {
			return $this->path;
		}

		public function root():string {
			return $this->root;
		}

		public function segments():array {
			return $this->segments;
		}

		public function header(string $name ):mixed {
			return $this->headers[ $name ];
		}

		public function headers():array {
			return $this->headers;
		}

		public function has_header(string $name ):bool {
			return (bool) $this->header( $name );
		}

		public function method ():string {
			return $this->method;
		}

		public function input(string $name ) {
            return $this->input[ $name ];
		}

		public function inputs() {
            return $this->input;
		}

		public function has_input (string $name ):bool {
            return (bool) $this->input( $name );
		}

		public function cookie(string $name ):string {
			return $this->cookies[ $name ];
		}

		public function cookies():array {
			return $this->cookies;
		}

		public function has_cookie(string $name):bool {
			return (bool) $this->cookie( $name );
		}

		public function file (string $name):mixed {
			if ( is_array($this->files) ) return $this->files[ $name ];

			return $this->files;
		}

		public function has_file(string $name):bool {
			return isset( $this->files[ $name ] ) && !empty( $this->files[ $name ] );
		}

		public function is_secure():bool {
			return $this->secure;
		}

		public function server( $key = "" ) {
			return $this->server[ $key ];
		}

		private function _sanitize(string|array $data ):string|array {
			$sanitized = [];

			if ( is_array( $data ) ) {
				foreach ( $data as $key => $val ) {
					$sanitized[$key] = $this->_sanitize( $val );
				}
			} else {
				$sanitized = trim(strip_tags($data));
			}

			return $sanitized;
		}

		private function parse_headers(array $data):array {
			$headers = [];

			foreach ( $data as $k => $v ) {
				if ( substr( $k, 0, 5) == "HTTP_" ) {
					$name = str_replace( substr( $k, 0, 5) , "", $k );
					$name = str_replace( "_", " ", $name );
					$name = ucwords( strtolower($name) );
					$name = str_replace( " ", "_" , $name );

					$headers[ $name ] = $this->_sanitize( $v );
				}
			}

			return $headers;
		}

		private function parse_cookies (string $data):array {
			$cookies = [];

			foreach ( explode( ";" , $data ) as $k => $v ) {
				$c = explode("=", trim( $v ));

				$cookies[ $this->_sanitize( $c[0] ) ] = $this->_sanitize( $c[1] );
			}

			return $cookies;
		}

	}

?>
