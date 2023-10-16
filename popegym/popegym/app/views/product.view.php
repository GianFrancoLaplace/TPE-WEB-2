<?php 
include_once 'app/controllers/product.controller.php';
include_once 'router.php';

class ProductView{
    private $smarty;
    function __construct(){
        $this->smarty = 1;
    }

    function showProducts($products){
        foreach ($products as $product) {
            echo "<div class='target-product'>
                <img class='target-img' src='$product->Img' alt='Imagen Producto'>
                <h5 class='target-name'>$product->Nombre</h5>
                <p>$$product->Precio</p>
            </div>";
        }
    }

    function showError($msg){
        echo "<h1> ERROR </h1>";
        echo "<h3> $msg </h3>";
    }

    function showHome(){?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="<?php echo(BASE_URL)?>">
            <link rel="stylesheet" href="index.css">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Home</title>
        </head>
        <body>
            <?php include_once 'templates/header.phtml';?>
            <img id="img-suplements" src="https://www.demusculos.com/shop/c/10-category_default/suplementos.jpg" alt="" srcset="">
            <h2>Creatinas</h2>
                <p>Previenen la fatiga muscular, aumentan el rendimiento. Ideales para todo tipo de deportes, hombres y mujeres que buscan más rendimiento a la hora de entrenar y menos fatiga.</p>
            <h2>Aminoácidos</h2>
                <p>Potencian la recuperación del músculo, permiten alcanzar tus objetivos más rápidamente.</p>
            <h2>Proteínas</h2>
                <p>Las proteínas o Whey Protein son excelentes recuperadores y aumentadores de masa muscular. Mejoran el rendimiento y son apta para todo tipo de deportes. Las proteínas están dentro de los suplementos naturales más utilizados en el deporte.</p>

            <?php include_once 'templates/footer.phtml';
    }

    function showPageProducts($products){?>
    <!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="<?php echo(BASE_URL)?>">
            <link rel="stylesheet" href="index.css">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Productos</title>
        </head>
        <body>
            <?php include_once 'templates/header.phtml';?>
                <h1>Productos</h1>
                <div class="container-product">
                    <div class="sidebar">
                        <ul class="list-categories">
                            <li class="list-item">Marca</li>
                                <ul class="list-show">
                                    <li class="list-inside"><a class="categories-link" href="productos/1">Generation Fit</a></li>
                                    <li class="list-inside"><a class="categories-link" href="productos/2">Gentech</a></li>
                                    <li class="list-inside"><a class="categories-link" href="productos/3">Optimum Nutrition</a></li>
                                    <li class="list-inside"><a class="categories-link" href="productos/4">Star Nutrition</a></li>
                                    <li class="list-inside"><a class="categories-link" href="productos/5">HTN</a></li>
                                </ul>
                                
                            <li class="list-item ">Origen</li>
                                <ul class="list-show">
                                    <li class="list-inside"><a class="categories-link" href="productos/argentina">Argentina</a></li>
                                    <li class="list-inside"><a class="categories-link" href="productos/eeuu">Estados Unidos</a></li>
                                </ul>
                            <li class="list-item" >Categoria</li>
                                <ul class="list-show">
                                    <li class="list-inside"><a class="categories-link" href="productos/creatina">Creatina</a></li>
                                    <li class="list-inside"><a class="categories-link" href="productos/proteina">Proteina</a></li>
                                    <li class="list-inside"><a class="categories-link" href="productos/aminoacidos">Aminoacidos</a></li>
                                </ul>
                        </ul>
                    </div>
                    <div class="show-products">
                        <?php $this->showProducts($products)?>
                    </div>
                </div>
        <?php include 'templates/footer.phtml';
    }

    function showLogin(){?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="<?php echo(BASE_URL)?>">
            <link rel="stylesheet" href="index.css">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login</title>
        </head>
        <body>
            <?php include 'templates/header.phtml';?>
            <div class="container-login">
                <form class="login-form">
                    <h1>Iniciar Sesión</h1>
                    <div class="form-group">
                        <label for="username">Usuario:</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit">Iniciar Sesión</button>
                </form>
            </div>
            <?php include_once 'templates/footer.phtml';
    }
}
?>