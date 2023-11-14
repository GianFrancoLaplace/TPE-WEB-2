<?php 
require_once 'init.php';
include_once 'app/controllers/product.controller.php';
include_once 'app/controllers/auth.controller.php';
require_once 'config.php';

if(!empty($_GET['action'])){
    $action = $_GET['action'];
} else{
    $action = 'home';
}

$params = explode('/', $action);
switch ($params[0]) {
    case 'home':
        $controller = new ProductController();
        $controller->showPageHome();
        break;
    case 'productos':
        $controller = new ProductController();
        if(isset($params[1])){
            $controller->showPageProducts($params[1]);
            break;
        }else{
            $controller->showPageProducts();
            break;
        }
        
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'auth':
        $controller = new AuthController();
        $controller->auth();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'crud':
        error_reporting(0);
        session_start();
        if($_SESSION['USERNAME'] != null){
            $controller = new ProductController();
            $controller->showPageCrud($params[1], $params[2]);
        }else{
            $controller = new ProductController();
            header("Location: ".BASE_URL."login");
        }
    case 'agregar':
        $controller = new ProductController();
        $controller->addProducto();
        break;
    case 'eliminar':
        $controller = new ProductController();
        $controller->removeProducto($params[1]);
        break;
    case 'actualizar':
        $controller = new ProductController();
        $controller->updateProduct($params[1]);
        break;  
    case 'product':
        $controller = new ProductController();
        $controller->showProductDetails($params[1]);
        break;
    case 'crudMarca':
        error_reporting(0);
        session_start();
        if ($_SESSION['USERNAME'] != null) {
            $controller = new ProductController();
            $controller->showBrands();
            break;
        } else {
            $controller = new ProductController();
            header("Location: ".BASE_URL."login");
        }
    case 'agregarMarca':
        $controller = new ProductController();
        $controller->addBrands();
        break;
    case 'eliminarMarca':
        $controller = new ProductController();
        $controller->removeBrand($params[1]);
        break;
    case 'editarMarca':
        $controller = new ProductController();
        $controller->editBrand($params[1]);
        break;
        
}