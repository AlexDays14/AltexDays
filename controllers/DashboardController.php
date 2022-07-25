<?php

namespace Controllers;

use Model\Avance;
use Model\Proyecto;
use MVC\Router;

class DashboardController{
    public static function index(Router $router){

        $id = $_SESSION['id'];

        $proyectos = Proyecto::belongsTo('propietarioId', $id);

        $router->render('dashboard/index', [
            'titulo' => 'Mis Proyectos',
            'proyectos' => $proyectos
        ]);
    }

    public static function proyecto(Router $router){

        $slug = $_GET['slug'];
        $usuarioId = $_SESSION['id'];

        if(!$slug){
            header('location: /dashboard');
        }

        $proyecto = Proyecto::where('slug', $slug);
        if($proyecto->propietarioId !== $usuarioId){
            header('location: /dashboard');
        }
        $avances = Avance::belongsTo('proyectoId', $proyecto->id);
        $router->render('dashboard/proyecto', [
            'titulo' => $proyecto->nombre,
            'avances' => $avances,
            'proyecto' => $proyecto
        ]);
    }
}