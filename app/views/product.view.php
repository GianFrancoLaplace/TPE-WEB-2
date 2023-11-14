<?php 
include_once 'app/controllers/product.controller.php';
include_once 'router.php';

class ProductView{

    function showDetail($product) {
        require 'templates/product.phtml';
    }

    function showError($msg){
        echo "<h1> ERROR </h1>";
        echo "<h3> $msg </h3>";
    }

    function showHome(){
        include_once 'templates/home.phtml';
    }

    function showProducts($products, $brands){
        require 'templates/products.phtml';
    }

    function showCrud($products, $msg=null){
        require 'templates/crud.phtml';
    }

    function showBrands($marcas, $msg=null){
        include_once './templates/formCategoria.phtml';
    }
    
}
