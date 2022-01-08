<?php

namespace App;

class Router {
    
    private $routes = [];

    public function get($route, $action) {
        if(strpos($route, '?')) $route = $this->removeParams($route);
        $this->add('GET', $route, $action);
    }

    public function post($route, $action) {
        $this->add('POST', $route, $action);
    }

    private function add($method, $route, $action) {
        $this->routes[$method][$route] = $action;
    }

    private function removeParams($route) {
        return explode('?', $route)[0];
    }

    public function run() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        return call_user_func_array($this->routes[$method]['/'], []);
    }
}