<?php

namespace Model;

class Paciente extends ActiveRecord {
    protected static $tabla = 'pacientes';
    protected static $columnasDB = ['id', 'Nombre', 'ApellidoP','ApellidoM', 'Calle', 'Telefono', 'Edad', 'CURP', 'Expediente'];

    public $id;
    public $Nombre;
    public $ApellidoP;
    public $ApellidoM;
    public $Calle;
    public $Telefono;
    public $Edad;
    public $CURP;
    public $Expediente;
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->Nombre = $args['Nombre'] ?? '';
        $this->ApellidoP = $args['ApellidoP'] ?? '';
        $this->ApellidoM = $args['ApellidoM'] ?? '';
        $this->Calle = $args['Calle'] ?? '';
        $this->Telefono = $args['Telefono'] ?? '';
        $this->Edad = $args['Edad'] ?? '';
        $this->CURP = $args['CURP'] ?? '';
        $this->Expediente = $args['Expediente'] ?? '';
    }

    // Validación para cuentas nuevas
    public function validar() {
        if(!$this->Nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->Expediente) {
            self::$alertas['error'][] = 'El Expediente es Obligatorio';
        }
        return self::$alertas;
    }
}