<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/app/config.php';

use \App\Router;
use \App\Controller\DocsController;
use \App\Controller\CollaboratorController;

$router = new Router;

$router->get('/colaborador', function() {
    return CollaboratorController::index();
});

$router->get('/documentos', function() {
    return DocsController::index();
});
$router->post('/documentos', function() {
    return DocsController::store();
});

$router->run();