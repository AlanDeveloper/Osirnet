<?php

namespace App;

use Closure;
use Exception;

class Router {
    
    private $routes = [];

    public function get($route, $action) {
        if(strpos($route, '?')) $route = self::removeParams($route);
        self::add('GET', $route, $action);
    }

    public function post($route, $action) {
        self::add('POST', $route, $action);
    }

    private function add($method, $route, $action) {
        $this->routes[$method][$route] = $action;
    }

    private function removeParams($route) {
        return explode('?', $route)[0];
    }

    public function run() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = explode('/', $_SERVER['REQUEST_URI'])[1];
        $uri = str_replace("/$uri", '',$_SERVER['REQUEST_URI']);


        if (!isset($this->routes[$method][$uri])) throw new Exception('Página não encontrada!');
        if (!isset($this->routes[$method])) throw new Exception('Método não registrado!');

        return call_user_func_array($this->routes[$method][$uri], []);
    }
}