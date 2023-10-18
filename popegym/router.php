<?php 
require_once 'init.php';
include_once 'app/controllers/product.controller.php';
include_once 'app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

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
            if(isset($params[1])){
                $controller->showPageCrud($params[1]);
                break;
            }else{
                $controller->showPageCrud();
                break;
            }
        }else{
            echo "error";
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
            echo "error";
        }
    case 'agregarMarca':
        $controller = new ProductController();
        $controller->addBrands();
        break;
    case 'eliminarMarca':
        $controller = new ProductController();
        $controller->removeBrand([$params[1]]);
        break;
}