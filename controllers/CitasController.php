<?php

namespace Controllers;

use Model\Cita;
use Model\Paciente;
use MVC\Router;

class CitasController {
    public static function index(Router $router){
        // $citas = Cita::All();
        $alertas = [];
        is_auth();
        is_admin();
        if(!is_admin()){
            header('Location: /');
        }

        //ENCONTRAR Y VALIDAR ID
        $id = $_GET['id'];
        $id = filter_var($id,FILTER_VALIDATE_INT);
        $edad = isset($_GET['edad']) ? $_GET['edad'] : null;


        if(!$id){
            header('Location: /admin/buscar-expediente');
        }

                

        //obtener ponente a editar
        $paciente = Paciente::find($id);
        if(!$paciente){
            header('Location: /admin/buscar-expediente');
        }


        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_admin()){
                header('Location: /login');
            }
 
            $paciente->sincronizar($_POST);

            $alertas = $paciente->validar();


        }


        $router->render('admin/citas/index',[
            'titulo' => 'Crear Cita Medica',
            'alertas' => $alertas,
            'paciente' => $paciente,
            'edad' => $edad
            // 'citas' => $citas
        ]);

    }

    public static function guardarCita(){

        is_auth();
        is_admin();
        if(!is_admin()){
            header('Location: /');
        }
        
        //Almacena la cita y devuelve ID
        $cita = new Cita($_POST);
        $alertas = $cita->validar();

        if(empty($alertas)){
            $resultado = $cita->guardar();
        }
        
        echo json_encode(['resultado' => $resultado]);
    }

    public static function indexConsulta(Router $router){

        is_auth();
        is_admin();
        if(!is_admin()){
            header('Location: /');
        }
        // $citas = Cita::All();
        $alertas = [];

        //ENCONTRAR Y VALIDAR ID
        $id = $_GET['id'];
        $id = filter_var($id,FILTER_VALIDATE_INT);
        $edad = isset($_GET['edad']) ? $_GET['edad'] : null;


        if(!$id){
            header('Location: /admin/buscar-expediente');
        }

                

        //obtener ponente a editar
        $paciente = Paciente::find($id);
        if(!$paciente){
            header('Location: /admin/buscar-expediente');
        }


        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_admin()){
                header('Location: /login');
            }
 
            $paciente->sincronizar($_POST);

            $alertas = $paciente->validar();


        }


        $router->render('admin/consultas/index',[
            'titulo' => 'Crear Consulta Medica',
            'alertas' => $alertas,
            'paciente' => $paciente,
            'edad' => $edad
            // 'citas' => $citas
        ]);

    }

    public static function guardarConsulta(){
        is_auth();
        is_admin();
        if(!is_admin()){
            header('Location: /');
        }
        
        //Almacena la cita y devuelve ID
        $cita = new Cita($_POST);
        $alertas = $cita->validar();

        if(empty($alertas)){
            $resultado = $cita->guardar();
        }
        
        echo json_encode(['resultado' => $resultado]);
        //Almacena la cita y devuelve ID
    }

    public static function indexCertificado(Router $router){
        is_auth();
        is_admin();
        if(!is_admin()){
            header('Location: /');
        }

        $router->render('admin/certificado/index',[
            'titulo' => 'Consulta para Certificado Medico',
            // 'citas' => $citas
        ]);

    }

    // public static function eliminar(){
    //     // if(!is_admin()){
    //     //     header('Location: /login');
    //     // }

        
    //     if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //         $id = $_POST['id'];
    //         $cita = Cita::find($id);

    //         if(!isset($cita)){
    //             header('Location: /admin/ver-citas');
    //         }
    //         $resultado = $cita->eliminar();
    //         if(($resultado)){
    //             header('Location: /admin/ver-citas');
    //         }
    //     }
    // }
}
