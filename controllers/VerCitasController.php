<?php

namespace Controllers;

use Model\Cita;
use MVC\Router;

class VerCitasController {
    public static function index(Router $router){
        is_auth();
        is_admin();
        if(!is_admin()){
            header('Location: /');
        }

        // $citas = Cita::All();
        $alertas = [];


        $router->render('admin/ver-citas/index',[
            'titulo' => 'Ver Citas',
            'alertas' => $alertas
            // 'citas' => $citas
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
        $Fecha = $_POST['Fecha'] ?? date('Y-m-d');
        $Consultorio = $_POST['Consultorio'];
        

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // if(!is_admin()){
            //     header('Location: /login');
            // }

            if($Fecha !== ''){
                // $consulta = "SELECT * FROM citas WHERE Fecha = '$Fecha' AND Consultorio = '$Consultorio' ";
                $consulta = "SELECT * FROM citas WHERE Fecha = '$Fecha' AND Consultorio = '$Consultorio' ORDER BY CASE WHEN Estado = 'cita' THEN 1 WHEN Estado = 'fila' THEN 2 ELSE 3 END, Hora";

            }else{
                $consulta = "SELECT * FROM citas WHERE Consultorio = '$Consultorio' ORDER BY CASE WHEN Estado = 'cita' THEN 1 WHEN Estado = 'fila' THEN 2 ELSE 3 END, Hora ";
            }
            


        }

        $citas = Cita::SQL($consulta);
        
        
        $router->render('admin/ver-citas/index',[
            'titulo' => 'Ver Citas',
            'alertas' => $alertas,
            'citas' => $citas
        ]);
    }

    public static function eliminar(){
        is_auth();
        is_admin();
        if(!is_admin()){
            header('Location: /');
        }

        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $cita = Cita::find($id);

            if(!isset($cita)){
                header('Location: /admin/ver-citas');
            }
            $resultado = $cita->eliminar();
            if(($resultado)){
                header('Location: /admin/ver-citas');
            }
        }
    }
}
