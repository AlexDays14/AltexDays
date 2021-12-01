<?php

namespace Model;

class Usuario extends ActiveRecord{
    protected static $tabla = 'usuariosAltex';
    protected static $columnasDB = ['id', 'nombre', 'email', 'password', 'admin'];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->admin = $args['admin'] ?? 0;
    }

    public function validarLogin(){
        if(!$this->email){
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        if($this->email && !filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            self::$alertas['error'][] = 'El Email no es Válido';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'El Password es Obligatorio';
        }
        if(strlen($this->password) < 6){
            self::$alertas['error'][] = 'El Password Debe Contener al menos 6 Caracteres';
        }

        return self::$alertas;
    }

    public function validarNuevaCuenta(){
        if(!$this->nombre){
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->email){
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            self::$alertas['error'][] = 'El Email no es Válido';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'El Password es Obligatorio';
        }
        if(strlen($this->password) < 6){
            self::$alertas['error'][] = 'El Password Debe Contener al menos 6 Caracteres';
        }
        if($this->password !== $this->password2){
            self::$alertas['error'][] = 'Los Passwords Deben ser Iguales';
        }

        return self::$alertas;
    }

    // verificar si coincide con el password anterior
    public function comprobarPassword() : bool{
        return password_verify($this->password_actual, $this->password);
    }

    // hashear password
    public function hashPassword() : void{
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }
}