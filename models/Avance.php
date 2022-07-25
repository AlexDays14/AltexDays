<?php

namespace Model;

class Avance extends ActiveRecord{
    protected static $tabla = 'avancesaltex';
    protected static $columnasDB = ['id', 'nombre', 'imagen', 'proyectoId'];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->proyectoId = $args['proyectoId'] ?? '';
    }

    public function validarNuevoAvance(){
        if(!$this->nombre){
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->proyectoId){
            self::$alertas['error'][] = 'No es Posible Subir el Avance';
        }

        return self::$alertas;
    }
}