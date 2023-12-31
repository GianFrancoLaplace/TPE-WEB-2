<?php

class AuthHelper{

    public static function init(){
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function login($user) {
        AuthHelper::init();
        $_SESSION['USER_ID'] = $user->ID;
        $_SESSION['USERNAME'] = $user->User;
    }

    public static function logout(){
        AuthHelper::init();
        session_destroy();
    }

    public static function verify(){
        AuthHelper::init();
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . BASE_URL . '/login');
            die();
        }
    }

    public static function createDontExist($host, $username, $password, $databaseName)
    {
        $pdo = new PDO("mysql:host=$host", $username, $password);
        $query = "CREATE DATABASE IF NOT EXISTS $databaseName";
        $pdo->exec($query);
    }
}