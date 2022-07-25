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

$router->get('/portafolio', [PaginasController::class, 'portafolio']); /* Pendiente */

$router->get('/servicios', [PaginasController::class, 'servicios']); /* Pendiente */

// Auth
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);

$router->get('/crear', [LoginController::class, 'crear']);
$router->post('/crear', [LoginController::class, 'crear']);

$router->get('/logout', [LoginController::class, 'logout']);

// Dashboard cliente
$router->get('/dashboard', [DashboardController::class, 'index']);
$router->post('/dashboard', [DashboardController::class, 'index']);

$router->get('/proyecto', [DashboardController::class, 'proyecto']);

// ZONA PRIVADA
$router->get('/admin', [AdminController::class, 'index']);
$router->post('/admin', [AdminController::class, 'index']);

$router->get('/admin/crear-proyecto', [AdminController::class, 'crear_proyecto']);
$router->post('/admin/crear-proyecto', [AdminController::class, 'crear_proyecto']);

$router->get('/admin/proyecto', [AdminController::class, 'proyecto']);

$router->post('/admin/proyecto/crear-avance', [AdminController::class, 'crear_avance']);

// SITEMAPS
$router->get('/sitemap', [PaginasController::class, 'sitemap']);

// GOOGLE INDEXING API, solo usar en dev
$router->get('/api/index', [APIController::class, 'APIIndexing']);
$router->post('/api/index', [APIController::class, 'APIIndexing']);
$router->get('/api/getRequest', [APIController::class, 'getRequest']);

// API AVANCES
$router->get('/api/avances', [APIController::class, 'index']);
$router->get('/api/crear-avance', [APIController::class, 'crear_avance']);
$router->post('/api/crear-avance', [APIController::class, 'crear_avance']);


$router->comprobarRutas();