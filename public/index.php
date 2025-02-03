<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\APIMedicoController;
use MVC\Router;
use Controllers\AuthController;
use Controllers\BuscarExpedienteController;
use Controllers\CitasController;
use Controllers\ConsultaController;
use Controllers\DashboardController;
use Controllers\PonentesController;
use Controllers\RegistradosController;
use Controllers\RegistrarPacientesController;
use Controllers\VerCitasController;

$router = new Router();


// Login
$router->get('/', [AuthController::class, 'login']);
$router->post('/', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);

//AREA DE ADMINISTRACION
$router->get('/admin/dashboard', [DashboardController::class, 'index']);

$router->get('/admin/ponentes', [PonentesController::class, 'index']);
$router->get('/admin/ponentes/crear', [PonentesController::class, 'crear']);
$router->post('/admin/ponentes/crear', [PonentesController::class, 'crear']);
$router->get('/admin/ponentes/editar', [PonentesController::class, 'editar']);
$router->post('/admin/ponentes/editar', [PonentesController::class, 'editar']);
$router->post('/admin/ponentes/eliminar', [PonentesController::class, 'eliminar']);

$router->get('/admin/registrados', [RegistradosController::class, 'index']);

//REGISTRO PACIENTES
$router->get('/admin/registrar-pacientes', [RegistrarPacientesController::class, 'index']);
$router->post('/admin/registrar-pacientes', [RegistrarPacientesController::class, 'crear']);
$router->get('/admin/editar-pacientes', [RegistrarPacientesController::class, 'indexEditar']);
$router->post('/admin/editar-pacientes', [RegistrarPacientesController::class, 'editar']);
$router->get('/admin/eliminar-paciente', [RegistrarPacientesController::class, 'indexEliminar']);
$router->post('/admin/eliminar-paciente', [RegistrarPacientesController::class, 'eliminar']);

//BUSCAR EXPEDIENTE
$router->get('/admin/buscar-expediente', [BuscarExpedienteController::class, 'index']);
$router->post('/admin/buscar-expediente', [BuscarExpedienteController::class, 'obtener']);

$router->get('/admin/citas', [CitasController::class, 'index']);
$router->post('/admin/citas', [CitasController::class, 'guardarCita']);

$router->get('/admin/consultas', [CitasController::class, 'indexConsulta']);
$router->post('/admin/consultas', [CitasController::class, 'guardarConsulta']);

$router->get('/admin/certificado', [CitasController::class, 'indexCertificado']);

//BUSQUEDA DE CITAS
$router->get('/admin/api/medicos', [APIMedicoController::class, 'index']);
$router->get('/admin/ver-citas', [VerCitasController::class, 'index']);
$router->post('/admin/ver-citas', [VerCitasController::class, 'obtener']);
$router->post('/admin/ver-citas/eliminar', [VerCitasController::class, 'eliminar']);


$router->comprobarRutas();
