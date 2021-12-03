<?php

namespace Controllers;

use Classes\Email;
use Model\Contacto;
use MVC\Router;

class PaginasController{
    public static function index(Router $router){

        $alertas = [];
        $contacto = new Contacto;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $contacto = new Contacto($_POST);

            $alertas = $contacto->validarForm();
            if(empty($alertas)){

                $resultado = $contacto->guardar();

                $email = new Email($contacto->email, $contacto->nombre, $contacto->mensaje);
                $email->enviarFormContacto();

                if($resultado){
                    $email->enviarFormContactoAdmin();
                    header('location: /');
                }
            }
        }

        $router->render('landing/index', [
            'alertas' => $alertas,
            'contacto' => $contacto,
            'principal' => '<meta name="google-site-verification" content="xvRqnYO5l6U-oH4I7ARA1OWbptYjl-DJ6Nokl7m9WTA" />'
        ]);
    }

    public static function sitemap(Router $router){

        $router->xml('sitemap/index');
    }
}