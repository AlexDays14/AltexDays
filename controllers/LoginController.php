<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class LoginController{
    public static function login(Router $router){

        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $usuario = new Usuario($_POST);

            $alertas = $usuario->validarLogin();

            if(empty($alertas)){

                $usuario = Usuario::where('email',$usuario->email);

                if(!$usuario){
                    Usuario::setAlerta('error', 'El Usuario No Existe');
                }else{
                    if(password_verify($_POST['password'], $usuario->password)){

                        // Iniciar la sesión
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;

                        // Redireccionar
                        header('location: /dashboard');

                    }else{
                        Usuario::setAlerta('error', 'Password Incorrecto');
                    }
                }
            }
        }
        /* debuguear(Usuario::all()); */

        $alertas = Usuario::getAlertas();

        $router->render('auth/login', [
            'titulo' => 'Altex | Iniciar Sesión',
            'descripcion' => 'Inicia Sesión',
            'robots' => 'index, follow',
            'alertas' => $alertas
        ]);
    }

    public static function logout(){
        $_SESSION = [];
        header('location: /');
    }

    public static function crear(Router $router){

        $alertas = [];
        $usuario = new Usuario;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();
            
            if(empty($alertas)){
                $existeUsuario = Usuario::where('email', $usuario->email);

                if($existeUsuario){
                    Usuario::setAlerta('error', 'Este Usuario Ya Existe');
                    $alertas = Usuario::getAlertas();
                }else{

                    $usuario->hashPassword();

                    $resultado = $usuario->guardar();

                    if($resultado){
                        header('location: /login');
                    }
                }
            }
        }

        $router->render('auth/crear', [
            'alertas' => $alertas,
            'usuario' => $usuario
        ]);
    }
}