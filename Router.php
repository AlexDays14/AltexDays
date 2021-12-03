<?php

namespace MVC;

class Router{

    public $getRoutes = [];
    public $postRoutes = [];

    public function get($url, $fn){
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn){
        $this->postRoutes[$url] = $fn;
    }

    public function comprobarRutas(){
        session_start();

        $auth = $_SESSION['login'] ?? null;

        $rutasProtegidas = [
            '/dashboard',
            '/admin'
        ];
        $rutasInvitados = [

        ];

        $currentUrl = explode('?', $_SERVER['REQUEST_URI'], 2) ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];
        

        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl[0]] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl[0]] ?? null;
        }

        if(in_array($currentUrl[0], $rutasProtegidas) && !$auth){
            header('location: /');
        }
        if(in_array($currentUrl[0], $rutasInvitados) && $auth){
            header('location: /');
        }

        if ( $fn ) {
            // Call user fn va a llamar una función cuando no sabemos cual sera
            call_user_func($fn, $this); // This es para pasar argumentos
        } else {
            header('location: /');
        }
    }

    public function render($view, $datos = [])
    {

        // Leer lo que le pasamos  a la vista
        foreach ($datos as $key => $value) {
            $$key = $value;  // Doble signo de dolar significa: variable variable, básicamente nuestra variable sigue siendo la original, pero al asignarla a otra no la reescribe, mantiene su valor, de esta forma el nombre de la variable se asigna dinamicamente
        }

        ob_start(); // Almacenamiento en memoria durante un momento...

        // entonces incluimos la vista en el layout
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); // Limpia el Buffer
        include_once __DIR__ . '/views/layout.php';
    }

    public function xml($view){
        include_once __DIR__ . "/views/$view.php";
    }
}