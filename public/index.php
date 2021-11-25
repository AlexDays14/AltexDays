<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\PaginasController;
use MVC\Router;

$router = new Router();

//Landing
$router->get('/', [PaginasController::class, 'index']);
$router->post('/', [PaginasController::class, 'index']);

$router->comprobarRutas();