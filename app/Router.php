<?php

namespace App;

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

    private function getMethod() {
        // DETECTAR MÉTODO PUT E DELETE
        if (isset($_REQUEST['_method'])) return strtoupper($_REQUEST['_method']);
        
        return $_SERVER['REQUEST_METHOD'];
    }

    private function getRoute() {
        // PEGAR A ROTA DO LINK
        $url = explode('/', $_SERVER['REQUEST_URI'])[1];
        $url = str_replace("/$url", '', $_SERVER['REQUEST_URI']);

        return $url;
    }

    public function run() {
        $method = self::getMethod();
        $route = self::getRoute();
        
        $route = explode('?', $route)[0];
        if($method === 'DELETE' || $method === 'PUT') {
            $args = ['id' => filter_var($route, FILTER_SANITIZE_NUMBER_INT)];
        } else {
            $args = [];
        }
        
        $route = preg_replace('/\d+/u', '{id}', $route);

        if (!isset($this->routes[$method][$route])) throw new Exception('Página não encontrada!');
        if (!isset($this->routes[$method])) throw new Exception('Método não registrado!');

        return call_user_func_array($this->routes[$method][$route], $args);
    }
}