<?php
include_once 'config.php';
include_once './app/helpers/auth.helper.php';

include_once './app/models/brand.model.php';
include_once './app/models/product.model.php';
include_once './app/models/users.model.php';

AuthHelper::createDontExist(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!isset($artistaModel)) {
    $artistaModel = new BrandModel();
}
if (!isset($cancionModel)) {
    $cancionModel = new ProductModel();
}
if (!isset($sesionModel)) {
    $sesionModel = new UsersModel();
}