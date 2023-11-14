<?php 
include_once 'app/models/product.model.php';
include_once 'app/models/brand.model.php';
include_once 'app/views/product.view.php';
require_once 'config.php';

class ProductController{
    private $modelBrand;
    private $modelProduct;
    private $view;

    public function __construct() {
        $this->modelBrand = new BrandModel();
        $this->modelProduct = new ProductModel();
        $this->view = new ProductView();
    }

    public function showPageHome(){
        $this->view->showHome();
    }

    public function showPageProducts($id = null){
        if(is_numeric($id)){
            $this->view->showProducts($this->modelProduct->getMarca($id), $this->getMarcas());
            return;
        }

        if($id=="creatina" || $id=="proteina" || $id=="aminoacidos"){
            $this->view->showProducts($this->modelProduct->getCategoria(ucfirst($id)), $this->getMarcas());
            return;
        }

        if($id=="eeuu" || $id == "argentina"){
            if($id=="eeuu")
                $id="Estados Unidos";
        
            $this->view->showProducts($this->modelProduct->getPaisOrigen(ucfirst($id)), $this->getMarcas());
            return;
        }
        $this->view->showProducts($this->modelProduct->getAll(), $this->getMarcas());
    }

    function showProductDetails($id){
        $this->view->showDetail($this->modelProduct->get($id));
        
    }

    function showPageCrud($field = null, $id=null){
        if(isset($field)){
            if($field == 'agregar')
                $this->addProducto();
            if($id == 'eliminar')
                $this->removeProducto($id);
            if($id == 'editar')
                $this->updateProduct($id);
        }else{
            $this->view->showCrud($this->modelProduct->getAll(), null);
        }
    }

    function addProducto() {
        // TODO: validacion de datos
    
        // obtengo los datos del usuario
        $name = $_POST['Nombre'];
        $des = $_POST['Descripcion'];
        $price = $_POST['Precio'];
        $weight = $_POST['Peso'];
        $category = $_POST['Categoria'];
        $brand = $_POST['Marca'];
        $img = $_POST['Img'];

        // inserto en la DB
        $id = $this->modelProduct->insert($name, $des, $price, $weight, $category, $brand, $img);
        if ($id) {
            // redirigo la usuario a la pantalla principal
            $this->view->showCrud($this->modelProduct->getAll(), "Producto= $id ingresado con exito");
        } else {
            $this->view->showError("Error al insertar el producto");
        }
    }

    function removeProducto($id) {
        $this->modelProduct->remove($id);
        $this->view->showCrud($this->modelProduct->getAll(), "Producto= $id eliminado con exito");
    }
    function updateProduct($id){
        $name = $_POST['Nombre'];
        $price = $_POST['Precio'];
        $weight = $_POST['Peso'];
        $category = $_POST['Categoria'];
        $field= "";

        if($name){
            $field="Nombre";
            $this->modelProduct->update($field, $name, $id);
            $this->view->showCrud($this->modelProduct->getAll(), "El nombre del producto= $id modificado con exito");
            return;
        }

        if($price){
            $field="Precio";
            $this->modelProduct->update($field, $price, $id);
            $this->view->showCrud($this->modelProduct->getAll(), "El precio del producto= $id modificado con exito");
            return;
        }

        if($weight){
            $field="Peso";
            $this->modelProduct->update($field, $weight, $id);
            $this->view->showCrud($this->modelProduct->getAll(), "El peso del producto= $id modificado con exito");
            return;
        }

        if($category){
            $field="Categoria";
            $this->modelProduct->update($field, $name, $id);
            $this->view->showCrud($this->modelProduct->getAll(), "La categoria del producto= $id modificada con exito");
            return;
        }
    }
    
    //BRANDS
    public function getMarcas(){
        return $this->modelBrand->getIdNombres();
    }

    public function showBrands(){
        $this->view->showBrands($this->modelBrand->getAll(), null);
    }

    public function addBrands()
    {
        $name = $_POST['Nombre_categoria'];
        $des = $_POST['Descripcion_categoria'];
        $pais = $_POST['Pais_origen'];

        if (!isset($name) || !isset($des) || !isset($pais)){
            $this->view->showError("Faltan ingresar campos");
            return;
        }

        $id = $this->modelBrand->insert($name, $des, $pais);

        if (!$id) {
            $this->view->showError("Error al insertar la marca");
            return;
        }

        $this->view->showBrands($this->modelBrand->getAll(), "Marca= $id agregada con exito");
    }

    public function removeBrand($id){
        $marca = $this->modelBrand->getById($id);
        if (!empty($marca)) {
            $this->modelBrand->remove($id);
            $this->view->showBrands($this->modelBrand->getAll(), "Marca= $id eliminada con exito");
        } else {
            $this->view->showError("Faltan ingresar campos");
        }
    }

    public function editBrand($id){
        $name = $_POST["Nombre_categoria"];
        $des = $_POST["Descripcion_categoria"];
        $pais = $_POST["Pais_origen"];

        if (!isset($name) || !isset($des) || !isset($pais)){
            $this->view->showError("Faltan ingresar campos");
            return;
        }

        $id = $this->modelBrand->update($id, $name, $des, $pais);
        $this->view->showBrands($this->modelBrand->getAll(), "Marca= $id modificada con exito");
    }
}
