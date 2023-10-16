<?php

class RutinaModel{
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=gimnasio;charset=utf8', 'root', '');
    }

    function getProducts() {
        $query = $this->db->prepare('SELECT * FROM productos');
        $query->execute();

        // $tasks es un arreglo de tareas
        $rutinas = $query->fetchAll(PDO::FETCH_OBJ);

        return $rutinas;
    }

    function insertRutina($name, $des, $price, $weight, $category) {
    
        $query = $this->db->prepare('INSERT INTO `productos` (`ID`, `Nombre`, `Descripcion`, `Precio`,`Peso`,`Categoria`) VALUES (?,?,?,?,?)');
        $query->execute([$name, $des, $price, $weight, $category]);
    
        return $this->db->lastInsertId();
    }

    function deleteRutina($id){
        $query = $this->db->prepare('DELETE FROM productos WHERE id = ?');
        $query->execute([$id]);
    }
}