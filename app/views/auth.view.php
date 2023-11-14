<?php
class AuthView{
    function showLogin($error = null) {
        require_once 'templates/login.phtml';
    }
}
?>