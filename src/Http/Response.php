<?php
    declare(strict_types=1);

    // namespace Linkly\Http;

    class Response {

        protected string $body = "";

        protected array $headers = [];

        protected int $status_code  = 200;

        protected string $status_messsage = "";
        
        public function get_header(string $name):mixed {
			return $this->headers[$name];        
        }

        public function get_headers():array {
            return $this->headers;
        }

        public function set_header(string $name, mixed $value):Response {
            $this->headers[ $name ] = $value;

            return $this;
        }

        public function set_headers(array $headers = [] ):Response {
            foreach ($headers as $key => $val) {
                $this->set_header($key, $vale);
            }

            return $this;
        }

        public function get_body():string {
            return $this->body;
        }

        public function set_body( $content ):Response {
            $this->body = $content;

            return $this;
        }

        public function get_status():int {
            return $this->status_code;
        }

        public function get_status_message():string {
            return $this->status_messsage;
        }

        public function set_status(int $code, string $message = ""):Response {
            $this->status_code = $code;
            $this->status_messsage = $message;

            return $this;
        }
    }

?>
