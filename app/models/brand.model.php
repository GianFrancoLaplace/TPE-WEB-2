<?php 
include_once 'app/controllers/product.controller.php';
include_once 'config.php';

class BrandModel{ //modelo tabla marca
    private $db;
    function __construct(){
        $this->db = $this->getConnection();
        $this->_deploy();
    }

    function _deploy()
{
    $query = $this->db->query('SHOW TABLES LIKE "marcas"');
    $tables = $query->fetchAll();
    if (count($tables) == 0) {
        $sql = <<<END
    CREATE TABLE `marcas` (
        `ID` int(11) NOT NULL AUTO_INCREMENT,
        `Nombre` varchar(100) NOT NULL,
        `Descripcion` text NOT NULL,
        `Pais_Origen` varchar(45) NOT NULL,
        PRIMARY KEY (`ID`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
END;
        $this->db->query($sql);
    }
}

    function getConnection(){
        return new PDO("mysql:host=" . DB_HOST .";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
    }
    //listado de todo
    function getAll(){ 

        $query = $this->db -> prepare('SELECT * from marcas');
        $query -> execute();
    
        $marcas = $query -> fetchAll(PDO::FETCH_OBJ);
    
        return $marcas;
    }

    function getById($id){
        $query = $this->db->prepare('SELECT * FROM  marcas WHERE ID = ?');
        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getNombreMarca($nombreMarca) {
        $query = $this->db->prepare('SELECT ID, Nombre FROM marcas WHERE Nombre = ?');
        
        $query->execute([$nombreMarca]);
        
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getPaisOrigen($paisOrigen) {
        $query = $this->db->prepare('SELECT ID FROM marcas WHERE Pais_Origen = ?');
        
        $query->execute([$paisOrigen]);
        
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getIdNombres(){
        $query = $this->db->prepare('SELECT ID, Nombre FROM marcas');
        
        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function insert($name, $des, $pais)
    {
        $query = $this->db->prepare('INSERT INTO marcas (ID, Nombre, Descripcion, Pais_Origen) VALUES (?,?,?,?)');
        $query->execute([null, $name, $des, $pais]);

        return $this->db->lastInsertId();
    }

    function remove($id){
        $query = $this->db->prepare('DELETE FROM  marcas WHERE ID = ?');
        $query->execute([$id]);

        return $id;
    }

    function update($id, $name, $des, $pais){
        $query = $this->db->prepare('UPDATE marcas SET Nombre = ?, Descripcion = ?, Pais_Origen = ? WHERE ID = ?');
        $query->execute([$name, $des, $pais, $id]);
    }


}
