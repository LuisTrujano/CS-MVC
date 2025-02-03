<?php

namespace Controllers;

use Model\Paciente;
use MVC\Router;

class RegistrarPacientesController {
    public static function index(Router $router){
        is_auth();
        is_admin();
        if(!is_admin()){
            header('Location: /');
        }
        $alertas = [];


        $router->render('admin/registrar-pacientes/index',[
            'titulo' => 'Registrar Pacientes',
            'alertas' => $alertas
        ]);
    }

    public static function indexEditar(Router $router){
        is_auth();
        is_admin();
        if(!is_admin()){
            header('Location: /');
        }

        $alertas = [];

        //ENCONTRAR Y VALIDAR ID
        $id = $_GET['id'];
        $id = filter_var($id,FILTER_VALIDATE_INT);

        if(!$id){
            header('Location: /admin/buscar-expediente');
        }

        //obtener ponente a editar
        $paciente = Paciente::find($id);
        if(!$paciente){
            header('Location: /admin/buscar-expediente');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // if(!is_admin()){
            //     header('Location: /login');
            // }

            $paciente->sincronizar($_POST);

            //validar
            $alertas = $paciente->validar();

            //guardar registro
            if(empty($alertas)){
                //guardar en la BD
                $resultado = $paciente->guardar();

                if($resultado){
                    header('location: /admin/buscar-expediente');
                }
            }
        }
        
        $router->render('admin/registrar-pacientes/editar',[
            'titulo' => 'Editar Paciente',
            'alertas' => $alertas,
            'paciente' => $paciente
        ]);
    }

    public static function indexEliminar(Router $router){
        is_auth();
        is_admin();
        if(!is_admin()){
            header('Location: /');
        }

        $alertas = [];

        //ENCONTRAR Y VALIDAR ID
        $id = $_GET['id'];
        $id = filter_var($id,FILTER_VALIDATE_INT);

        if(!$id){
            header('Location: /admin/buscar-expediente');
        }

        //obtener ponente a editar
        $paciente = Paciente::find($id);
        if(!$paciente){
            header('Location: /admin/buscar-expediente');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // if(!is_admin()){
            //     header('Location: /login');
            // }

            //validar

            //guardar registro
            if(empty($alertas)){
                //guardar en la BD
                    header('location: /admin/buscar-expediente');
            }
        }
        
        $router->render('admin/registrar-pacientes/eliminar',[
            'titulo' => 'Eliminar Paciente',
            'alertas' => $alertas,
            'paciente' => $paciente
        ]);
    }

    public static function crear(Router $router){
        is_auth();
        is_admin();
        if(!is_admin()){
            header('Location: /');
        }

        $alertas = [];
        $paciente = new Paciente;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // if(!is_admin()){
            //     header('Location: /login');
            // }

            $paciente->sincronizar($_POST);

            //validar
            $alertas = $paciente->validar();

            //guardar registro
            if(empty($alertas)){
                //guardar en la BD
                $resultado = $paciente->guardar();

                if($resultado){
                    header('location: /admin/registrar-pacientes');
                }
            }
        }
        
        $router->render('admin/registrar-pacientes/index',[
            'titulo' => 'Registrar Paciente',
            'alertas' => $alertas,
            'paciente' => $paciente
        ]);
    }

    public static function editar(Router $router){
        is_auth();
        is_admin();
        if(!is_admin()){
            header('Location: /');
        }

        $alertas = [];
        //validar el ID
        $id = $_POST['id'];
        $paciente = Paciente::find($id);
        $id = filter_var($id,FILTER_VALIDATE_INT);

        if(!$id){
            header('Location: /admin/buscar-expediente');
        }

        //obtener ponente a editar
       
        if(!$paciente){
            header('Location: /admin/buscar-expediente');
        }


        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // if(!is_admin()){
            //     header('Location: /login');
            // }
    
            $paciente->sincronizar($_POST);

            $alertas = $paciente->validar();

            if(empty($alertas)){
                $resultado = $paciente->guardar();
                if($resultado){
                    header("Location: /admin/buscar-expediente?id=$id");
                    exit;
                }
            }
        
        $router->render('admin/registrar-pacientes/editar',[
            'titulo' => 'Editar Paciente',
            'alertas' => $alertas,
            'paciente' => $paciente
        ]);
    }
    }

    public static function eliminar(){
        is_auth();
        is_admin();
        if(!is_admin()){
            header('Location: /');
        }

        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $paciente = Paciente::find($id);

            if(!isset($paciente)){
                header('Location: /login');
            }
            $resultado = $paciente->eliminar();
            if(($resultado)){
                header('Location: /admin/buscar-expediente');
            }
        }
    }
}