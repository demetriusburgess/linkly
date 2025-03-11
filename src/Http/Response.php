<?php
    declare(strict_types=1);

    // namespace Linkly\Http;

    class Response {

        protected $body = "";

        protected $headers = [];

        protected $status_code  = 200;

        protected $status_messsage = "";
        
        public function get_header( $name ) {
				return $this->headers[$name];        
        }

        public function get_headers() {
            return $this->headers;
        }

        public function set_header( $name, $value ) {
            $this->headers[ $name ] = $value;

            return $this;
        }

        public function set_headers( $headers = [] ) {
				foreach ($headers as $key => $val) {
					$this->set_header($key, $vale);
				}
        }

        public function get_body() {
            return $this->body;
        }

        public function set_body( $content ) {
            $this->body = $content;

            return $this;
        }

        public function get_status() {
            return $this->status_code;
        }

        public function get_status_message() {
            return $this->status_messsage;
        }

        public function set_status( $code, $message = "" ) {
            $this->status_code = $code;
            $this->status_messsage = $message;

            return $this;
        }
    }

?>
