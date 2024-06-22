<?php

namespace App\Core;

class Router {
    private $routes = [];

    public function add($path, $callback, $method = 'GET') {
        $this->routes[$method][$path] = $callback;
    }

    public function dispatch() {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        if (isset($this->routes[$method][$url])) {
            $callback = $this->routes[$method][$url];
            if (is_callable($callback)) {
                call_user_func($callback);
            } else if (is_string($callback)) {
                $this->callController($callback);
            }
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }

    private function callController($callback) {
        list($controller, $method) = explode('@', $callback);
        $controller = "App\\Controllers\\$controller";
        if (class_exists($controller)) {
            $controller = new $controller();
            if (method_exists($controller, $method)) {
                $controller->$method();
            } else {
                echo "Method $method not found in controller $controller";
            }
        } else {
            echo "Controller $controller not found";
        }
    }
}