<?php

namespace Model;

class Consultorio extends ActiveRecord{
    //Base de datos
    protected static $tabla = 'consultorios';
    protected static $columnasDB = ['Id','Nombre'];

    public $Id;
    public $Nombre;

    public function __construct($args = [])
    {
        $this->Id= $args['Id'] ?? null;
        $this->Nombre = $args['Nombre'] ?? '';
    }

    public function validar(){
        if(!$this->Nombre){
            self::$alertas['error'][] = 'El nombre del consultorio es obligatorio';

        }

        return self::$alertas;
    }
}