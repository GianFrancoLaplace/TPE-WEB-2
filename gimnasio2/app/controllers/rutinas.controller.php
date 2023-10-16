<?php
require_once './app/models/gimnasio.model.php';
require_once './app/views/rutinas.view.php';

class RutinaController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new RutinaModel();
        $this->view = new RutinaView();
        
    }

    public function showRutinas() {
        // obtengo tareas del controlador
        $tasks = $this->model->getProducts();
        
        // muestro las tareas desde la vista
        $this->view->showRutinas($tasks);
    }

    function addRutina() {
        // TODO: validacion de datos
    
        // obtengo los datos del usuario
        $name = $_POST['Nombre'];
        $des = $_POST['Descripcion'];
        $price = $_POST['Precio'];
        $weight = $_POST['Peso'];
        $category = $_POST['Categoria'];
    
        // inserto en la DB
        $id = $this->model->insertRutina($name, $des, $price, $weight, $category);
        if ($id) {
            // redirigo la usuario a la pantalla principal
            header('Location: ' . BASE_URL);
        } else {
            echo "Error al insertar la tarea";
        }
    }

    function removeRutina($id) {
        $this->model->deleteRutina($id);
        header('Location: ' . BASE_URL);
    }

}