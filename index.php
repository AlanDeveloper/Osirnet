<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/app/config.php';

use \App\Router;
use \App\Controller\Controller;
use \App\Controller\DocsController;
use \App\Controller\AttachController;
use \App\Controller\CollaboratorController;

$router = new Router;

$router->get('/', function() {
    return Controller::index();
});

$router->get('/colaborador', function() {
    return CollaboratorController::index();
});

$router->get('/documentos', function() {
    return DocsController::index();
});
$router->post('/documentos', function() {
    return DocsController::store();
});
$router->delete('/documentos/{id}', function($id) {
    return DocsController::delete($id);
});
$router->put('/documentos/{id}', function($id) {
    return DocsController::update($id);
});

$router->get('/anexar', function() {
    return AttachController::index();
});
$router->post('/anexar', function() {
    return AttachController::store();
});
$router->delete('/anexar/{id}', function($id) {
    return AttachController::delete($id);
});

$router->run();