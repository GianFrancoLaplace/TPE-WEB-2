<?php 
/*<base href="<?php echo(BASE_URL)?>">*/
include_once 'app/controllers/product.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if(!empty($_GET['action'])){
    $action = $_GET['action'];
} else{
    $action = 'productos';
}

//parsear la accion action/1 = ['action' , 1]
$params = explode('/', $action);
switch ($params[0]) {
    case 'home':
        $controller = new ProductController();
        $controller->showHome();
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
        $controller = new ProductController();
        $controller->showPageLogin();
        
//     case $action>0 && $action<1000:
//         showFiltro($action);
//         break;
}