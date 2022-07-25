<?php

namespace Controllers;

use Google\Client;
use Model\Avance;
use Model\Proyecto;

class APIController{

    public static function index(){

        $slug = $_GET['slug'];

        if(!$slug) header('location: /dashboard');

        $proyecto = Proyecto::where('slug', $slug);
        $proyectoId = $proyecto->id;

        $avances = Avance::belongsTo('proyectoId', $proyectoId);
        
        echo json_encode([
            'avances' => $avances
        ]);
    }

    public static function crear_avance(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $proyecto = Proyecto::where('id', $_POST['proyectoId']);
            $avance = new Avance($_POST);
            $avance->guardar();

            header('location: /admin/proyecto?slug='. $proyecto->slug);
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

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
        }

    }

    public static function APIIndexing(){

        $client = new Client();
        $addr = __DIR__ . '/api-altex-e88fd63ddc80.json';

        // service_account_file.json is the private key that you created for your service account.
        $client->setAuthConfig($addr);
        $client->addScope('https://www.googleapis.com/auth/indexing');

        // Get a Guzzle HTTP Client
        $httpClient = $client->authorize();
        $endpoint = 'https://indexing.googleapis.com/v3/urlNotifications:publish';

        // Define contents here. The structure of the content is described in the next step.
        $content = '{
        "url": "https://altexdays.herokuapp.com/",
        "type": "URL_UPDATED"
        }';

        $response = $httpClient->post($endpoint, [ 'body' => $content ]);
        $status_code = $response->getStatusCode();
        echo $status_code;

    }

    public static function getRequest(){
    }
}