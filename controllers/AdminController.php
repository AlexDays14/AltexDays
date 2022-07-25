<?php

namespace Controllers;

use MVC\Router;
use Model\Avance;
use Model\Usuario;
use Model\Proyecto;

class AdminController{
    public static function index(Router $router){

        $proyectos = Proyecto::all();

        $router->render('admin/index', [
            'titulo' => 'Admin',
            'proyectos' => $proyectos
        ]);
    }

    public static function crear_proyecto(Router $router){

        $alertas = [];
        $usuarios = Usuario::all();
        $proyecto = new Proyecto;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $proyecto->sincronizar($_POST);
            $alertas = $proyecto->validarNuevoProyecto();

            if(empty($alertas)){
                
                // Generar una url unica
                $proyecto->slug = md5(uniqid());

                $proyecto->guardar();

                header('location: /admin/proyecto?slug=' . $proyecto->slug);
            }
        }

        $router->render('admin/crear-proyecto', [
            'titulo' => 'Crear Proyecto',
            'usuarios' => $usuarios,
            'alertas' => $alertas,
            'proyecto' => $proyecto
        ]);
    }

    public static function proyecto(Router $router){

        $slugProyecto = $_GET['slug'];
        if(!$slugProyecto){
            header('location: /admin');
        }
        $proyecto = Proyecto::where('slug', $slugProyecto);
        $avances = Avance::belongsTo('proyectoId', $proyecto->id);

        $alertas = [];
        $avance = new Avance;

        $router->render('admin/proyecto', [
            'titulo'=> $proyecto->nombre,
            'proyecto' => $proyecto,
            'avances' => $avances,
            'alertas' => $alertas
        ]);
    }

    public static function crear_avance(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $proyecto = Proyecto::where('id', $_POST['proyectoId']);
            $avance = new Avance($_POST);
            $avance->guardar();

            header('location: /admin/proyecto?slug='. $proyecto->slug);
        }
        /* if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $slug = $_POST['slug'];

            $proyecto = Proyecto::where('slug', $slug);
            $proyectoId = $proyecto->id;

            $avance = new Avance($_POST);
            $avance->proyectoId = $proyectoId;
            $resultado = $avance->guardar();

            $respuesta = [
                'tipo' => 'exito',
                'mensaje' => 'Se agregó correctamente la tarea',
                'resultado' => $resultado['resultado'],
                'id' => $resultado['id'],
                'proyectoId' => $proyectoId
            ];

            echo json_encode($respuesta);
        } */

    }
}