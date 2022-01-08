<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/app/config.php';

use \App\Router;
use \App\Controller\Controller;

$router = new Router;
$router->get('/', function() {
    return Controller::index();
});

$router->run();