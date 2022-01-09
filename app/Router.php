<?php

namespace App;

use Closure;
use Exception;

class Router {
    
    private $routes = [];

    public function get($route, $action) {
        self::add('GET', $route, $action);
    }

    public function post($route, $action) {
        self::add('POST', $route, $action);
    }

    public function delete($route, $action) {
        self::add('DELETE', $route, $action);
    }
    public function put($route, $action) {
        self::add('PUT', $route, $action);
    }

    private function add($method, $route, $action) {
        $this->routes[$method][$route] = $action;
    }

    private function removeParams($route) {
        return '/'.explode('/', $route)[1];
    }

    public function run() {
        $args = [];
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = explode('/', $_SERVER['REQUEST_URI'])[1];
        $uri = str_replace("/$uri", '',$_SERVER['REQUEST_URI']);
        if(isset($_REQUEST['_method']) && $_REQUEST['_method'] === 'DELETE') {
            $method = 'DELETE';
            $uri = explode('?', $uri)[0];
            $args = [
                'id' => filter_var($uri, FILTER_SANITIZE_NUMBER_INT)
            ];
        }
        if(isset($_REQUEST['_method']) && $_REQUEST['_method'] === 'PUT') {
            $method = 'PUT';
            $uri = explode('?', $uri)[0];
            $args = [
                'id' => filter_var($uri, FILTER_SANITIZE_NUMBER_INT)
            ];
        }
        $uri = preg_replace('/\d+/u', '{id}', $uri);

        if (!isset($this->routes[$method][$uri])) throw new Exception('Página não encontrada!');
        if (!isset($this->routes[$method])) throw new Exception('Método não registrado!');

        return call_user_func_array($this->routes[$method][$uri], $args);
    }
}