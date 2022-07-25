<?php

namespace Model;

class Proyecto extends ActiveRecord{
    protected static $tabla = 'proyectosaltex';
    protected static $columnasDB = ['id', 'nombre', 'slug', 'propietarioId', 'link'];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->slug = $args['slug'] ?? '';
        $this->propietarioId = $args['propietarioId'] ?? '';
        $this->link = $args['link'] ?? '';
    }

    public function validarNuevoProyecto(){
        if(!$this->nombre){
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->propietarioId){
            self::$alertas['error'][] = 'Seleccione un usuario';
        }

        return self::$alertas;
    }
}