<?php
    Class Router {
        private $routes = [];

        public function get($path, $callback) {
            $this->routes['GET'][$path] = $callback;
        }

        public function post($path, $callback) {
            $this->routes['POST'][$path] = $callback;
        }

        public function run() {
            $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $method = $_SERVER['REQUEST_METHOD'];

            if (isset($this->routes[$method][$path])) {
                call_user_func($this->routes[$method][$path]);
            } else {
                http_response_code(404);
                echo '404 - Not Found';
            }
        }
    }
?>