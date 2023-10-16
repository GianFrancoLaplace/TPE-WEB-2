<?php 
include_once 'app/models/product.model.php';
include_once 'app/models/brand.model.php';
include_once 'app/views/product.view.php';

class ProductController{
    private $modelBrand;
    private $modelProduct;
    private $view;

    public function __construct() {
        $this->modelBrand = new BrandModel();
        $this->modelProduct = new ProductModel();
        $this->view = new ProductView();
    }

    public function showHome(){
        $this->view->showHome();
    }

    public function showPageLogin(){
        $this->view->showLogin();
    }

    public function showPageProducts($id = null){
        if($id=="eeuu"){
            $id="Estados Unidos";
        }
        if(isset($id)){
            if($id=="Estados Unidos" || $id == "argentina"){
                $tablaMarcaId = $this->modelBrand->getPaisOrigen($id);
                $resultado = array();
                foreach($tablaMarcaId as $object){
                    $arreglo = $this->modelProduct->getOrigen($object->ID);
                    array_push($resultado, $arreglo);
                }
                $this->view->showPageProducts($resultado);
            }
            if($id=="creatina" || $id=="proteina" || $id=="aminoacidos"){
                $this->view->showPageProducts($this->modelProduct->getCategoria(ucfirst($id)));
            }else{
                $this->view->showPageProducts($this->modelProduct->getMarca(ucfirst($id)));
            }
            
        }else{
            $this->view->showPageProducts($this->modelProduct->getAll());
        }
    }
    //Listado de item por categoria. Las categorias son por marca, 
    public function showByMarca($nombreMarca){
        $products = $this->modelProduct->getMarca($nombreMarca);

        if(!empty($products)){
            $this->view->showProducts($products);
        }else{
            $this->view->showError("No hay productos con esa marca");
        }
    }

    public function showByOrigen(){

    }

    public function showByCategoria(){
        
    }
}
