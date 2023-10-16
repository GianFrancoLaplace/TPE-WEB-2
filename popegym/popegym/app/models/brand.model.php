<?php 
include_once 'app/controllers/product.controller.php';

class BrandModel{ //modelo tabla marca
    private $db;
    function __construct(){
        $this->db = $this->getConnection();     
    }

    function getConnection(){
        return new PDO('mysql:host=localhost;'
        .'dbname=gimnasio;charset=utf8'
        , 'root', '');
    }
    //listado de todo
    function getAll(){ 

        $query = $this->db -> prepare('SELECT * from marcas');
        $query -> execute();
    
        $marcas = $query -> fetchAll(PDO::FETCH_OBJ);
    
        return $marcas;
    }

    function getNombreMarca($nombreMarca) {
        $query = $this->db->prepare('SELECT ID FROM marcas WHERE Nombre = ?');
        
        $query->execute([$nombreMarca]);
        
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getPaisOrigen($paisOrigen) {
        $query = $this->db->prepare('SELECT ID FROM marcas WHERE Pais_Origen = ?');
        
        $query->execute([$paisOrigen]);
        
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
