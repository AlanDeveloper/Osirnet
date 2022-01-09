<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/app/config.php';

use \App\Router;
use \App\Http\Response;
use \App\Controller\Controller;
use \App\Controller\DocsController;
use \App\Controller\AttachController;
use \App\Controller\CollaboratorController;

$router = new Router;

$router->get('/', function() {
    return new Response(200, Controller::index());
});

$router->get('/colaborador', function() {
    return new Response(200, CollaboratorController::index());
});

$router->get('/documentos', function() {
    return new Response(200, DocsController::index());
});
$router->post('/documentos', function() {
    return new Response(201, DocsController::store());
});
$router->delete('/documentos/{id}', function($id) {
    return new Response(204, DocsController::delete($id));
});
$router->put('/documentos/{id}', function($id) {
    return new Response(204, DocsController::update($id));
});

$router->get('/anexar', function() {
    return new Response(200, AttachController::index());
});
$router->post('/anexar', function() {
    return new Response(201, AttachController::store());
});
$router->delete('/anexar/{id}', function($id) {
    return new Response(204, AttachController::delete($id));
});

$router->run()->sendResponse();