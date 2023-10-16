<?php
require_once './app/controllers/rutinas.controller.php';
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);


switch ($params[0]) {
    case 'listar':
        $controller = new RutinaController();
        $controller->showRutinas();
        break;
    case 'agregar';
        $controller = new RutinaController();
        $controller->addRutina();
    case 'eliminar':
        $controller = new RutinaController();
        $controller->removeRutina($params[1]);
    // case 'actualizar':
    //     $controller = new RutinaController();
    //     $controller->showRutinas();
    default: 
        echo "404 Page Not Found";
        break;
}