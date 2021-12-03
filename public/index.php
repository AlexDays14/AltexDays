<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AdminController;
use Controllers\APIController;
use Controllers\DashboardController;
use Controllers\LoginController;
use Controllers\PaginasController;

$router = new Router();

// Landing
$router->get('/', [PaginasController::class, 'index']);
$router->post('/', [PaginasController::class, 'index']);

// Auth
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);

$router->get('/crear', [LoginController::class, 'crear']);
$router->post('/crear', [LoginController::class, 'crear']);

$router->get('/logout', [LoginController::class, 'logout']);

// Dashboard cliente
$router->get('/dashboard', [DashboardController::class, 'index']);
$router->post('/dashboard', [DashboardController::class, 'index']);

// ZONA PRIVADA
$router->get('/admin', [AdminController::class, 'index']);
$router->post('/admin', [AdminController::class, 'index']);

$router->get('/sitemap', [PaginasController::class, 'sitemap']);

$router->get('/api/index', [APIController::class, 'APIIndexing']);
$router->post('/api/index', [APIController::class, 'APIIndexing']);
$router->get('/api/getRequest', [APIController::class, 'getRequest']);

$router->comprobarRutas();