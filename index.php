<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/app/config.php';

use \App\Router;
use \App\Controller\CollaboratorController;

$router = new Router;
$router->get('/colaborador', function() {
    return CollaboratorController::index();
});

$router->run();