<?php
	declare(strict_types=1);
    
    // namespace Linkly\Http;

	class Request {

		protected $root;

		protected $url;

		protected $path;

		protected $input;

		protected $method;

		protected $headers;

		protected $files;

		protected $secure;

		protected $ip;

		protected $segments;

		protected $server;

		protected $protocol;

		public function __construct( $req_var, $request, $server, $files ) {
         	$this->secure 	= isset($server['HTTPS']) && !empty($server['HTTPS']);
         	$this->protocol = $this->is_secure() ? "https://" : "http://";

         	$this->root 	= $server['SERVER_NAME'];
			$this->path     = $request[ $req_var ];
			$this->url 		= $this->protocol . $this->root . $this->path;

			$this->segments = explode("/",rtrim( $request[ $req_var ], "/" ));

			$this->method 	= $server['REQUEST_METHOD'];
			$this->sever 	= $server;


			if ( sizeof($files) > 0 ) {
				$this->files = [];

				foreach ($files as $file) {
					$finfo = new SplFileInfo( $file["tmp_name"] );

					if ( $finfo->isfile() ) {
						$this->files[ $file[ "name" ] ] = $finfo;
					}
				}

			} else {
				$this->files = null;
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
			$this->cookies = $this->parse_cookies( $this->header( "Cookie" ) );

		}

		public function url() {
			return $this->url;
		}

		public function path() {
			return $this->path;
		}

		public function root() {
			return $this->root;
		}

		public function segments() {
			return $this->segments;
		}

		public function header( $name ) {
			return $this->headers[ $name ];
		}

		public function headers() {
			return $this->headers;
		}

		public function has_header( $name ) {
			return (bool) $this->header( $name );
		}

		public function method () {
			return $this->method;
		}

		public function input( $name ) {
            return $this->input[ $name ];
		}

		public function inputs() {
            return $this->input;
		}

		public function has_input ( $name ) {
            return (bool) $this->input( $name );
		}

		public function cookie( $name ) {
			return $this->cookies[ $name ];
		}

		public function cookies() {
			return $this->cookies;
		}

		public function has_cookie( $name ) {
			return (bool) $this->cookie( $name );
		}

		public function file ( $name ) {
			if ( is_array($this->files) ) return $this->files[ $name ];

			return $this->files;
		}

		public function has_file( $name ) {
			return isset( $this->files[ $name ] ) && !empty( $this->files[ $name ] );
		}

		public function is_secure() {
			return $this->secure;
		}

		public function server( $key = "" ) {
			return $this->server[ $key ];
		}

		private function _sanitize( $data ) {
			$sanitied = [];

			if ( is_array( $data ) ) {
				foreach ( $data as $key => $val ) {
					$sanitied[$key] = $this->_sanitize( $val );
				}
			} else {
				$sanitied = trim(strip_tags($data));
			}

			return $sanitied;
		}

		private function parse_headers( $data ) {
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

		private function parse_cookies ( $data ) {
			$cookies = [];
			
			if (!$data) return;

			foreach ( explode( ";" , $data ) as $k => $v ) {
				$c = explode("=", trim( $v ));

				$cookies[ $this->_sanitize( $c[0] ) ] = $this->_sanitize( $c[1] );
			}

			return $cookies;
		}

	}

?>
