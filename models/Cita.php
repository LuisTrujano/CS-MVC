<?php

namespace Model;

class Cita extends ActiveRecord {
    protected static $tabla = 'citas';
    protected static $columnasDB = ['id','estado', 'ApellidoP','ApellidoM', 'Nombre', 'Edad', 'Consultorio', 'Fecha', 'Hora', 'Expediente', 'PrimerVisita', 'Subsecuente', 'Embarazo', 'Hipertension', 'Diabetes', 'Respiratorio', 'EDAS', 'CertificadoMedico', 'Otros'];

    public $id;
    public $estado;
    public $ApellidoP;
    public $ApellidoM;
    public $Nombre;
    public $Edad;
    public $Consultorio;
    public $Fecha;
    public $Hora;
    public $Expediente;
    public $PrimerVisita;
    public $Subsecuente;
    public $Embarazo;
    public $Hipertension;
    public $Diabetes;
    public $Respiratorio;
    public $EDAS;
    public $CertificadoMedico;
    public $Otros;
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->estado = $args['estado'] ?? '';
        $this->ApellidoP = $args['ApellidoP'] ?? '';
        $this->ApellidoM = $args['ApellidoM'] ?? '';
        $this->Nombre = $args['Nombre'] ?? '';
        $this->Edad = $args['Edad'] ?? '';
        $this->Consultorio = $args['Consultorio'] ?? '';
        $this->Fecha = $args['Fecha'] ?? '';
        $this->Hora = $args['Hora'] ?? '';
        $this->Expediente = $args['Expediente'] ?? '';
        $this->PrimerVisita = $args['PrimerVisita'] ?? '';
        $this->Subsecuente = $args['Subsecuente'] ?? '';
        $this->Embarazo = $args['Embarazo'] ?? '';
        $this->Hipertension = $args['Hipertension'] ?? '';
        $this->Diabetes = $args['Diabetes'] ?? '';
        $this->Respiratorio = $args['Respiratorio'] ?? '';
        $this->EDAS = $args['EDAS'] ?? '';
        $this->CertificadoMedico = $args['CertificadoMedico'] ?? '';
        $this->Otros = $args['Otros'] ?? '';
    }

    // Validación para cuentas nuevas
    public function validar() {
        if(!$this->Fecha) {
            self::$alertas['error'][] = 'La Fecha es Obligatoria';
        }
        if(!$this->Hora) {
            self::$alertas['error'][] = 'La Hora es Obligatoria';
        }
        if(!$this->Consultorio) {
            self::$alertas['error'][] = 'El Consultorio es Obligatorio';
        }
    
        return self::$alertas;
    }
}