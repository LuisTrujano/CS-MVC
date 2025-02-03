<?php

namespace Controllers;

use Model\Paciente;
use MVC\Router;

class BuscarExpedienteController {
    public static function index(Router $router){
        //LOGIN
        is_auth();
        is_admin();
        if(!is_admin()){
            header('Location: /');
        }
        $pacientes = Paciente::all();
        $alertas = [];
        $router->render('/admin/buscar-expediente/index',[
            'titulo' => ' Buscar Expediente',
            'alertas' => $alertas
        ]);
    }

    public static function obtener(Router $router){
        is_auth();
        is_admin();
        if(!is_admin()){
            header('Location: /');
        }

        $alertas = [];
        date_default_timezone_set('America/Mexico_City'); 
        $Expediente = $_POST['Expediente'];
        

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            is_auth();
            is_admin();
            if(!is_admin()){
                header('Location: /');
            }
            $consulta = "SELECT * FROM pacientes WHERE Expediente = '$Expediente';";

            // if($Fecha !== ''){
            //     $consulta = "SELECT * FROM citas WHERE Fecha = '$Fecha' AND Consultorio = '$Consultorio' ";
            //     $consulta = "SELECT * FROM citas WHERE Fecha = '$Fecha' AND Consultorio = '$Consultorio' ORDER BY CASE WHEN Estado = 'cita' THEN 1 WHEN Estado = 'fila' THEN 2 ELSE 3 END, Hora";

            // }else{
            //     $consulta = "SELECT * FROM pacientes";
            // }
            

        }

        $expedientes = Paciente::SQL($consulta);
        
        
        $router->render('admin/buscar-expediente/index',[
            'titulo' => 'Buscar Expediente',
            'alertas' => $alertas,
            'expedientes' => $expedientes
        ]);
    }
}