<?php

namespace Model;

class Contacto extends ActiveRecord{
    protected static $tabla = 'contacto';
    protected static $columnasDB = ['id', 'nombre', 'email'];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->mensaje = $args['mensaje'] ?? '';
    }

    public function validarForm(){
        if(!$this->nombre){
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->email){
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        if($this->email && !filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            self::$alertas['error'][] = 'El Email no es Válido';
        }
        if(!$this->mensaje){
            self::$alertas['error'][] = 'El Mensaje es Obligatorio';
        }

        return self::$alertas;
    }
}