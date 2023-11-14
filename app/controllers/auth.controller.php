<?php
    require_once 'app/views/auth.view.php';
    require_once 'app/models/users.model.php';
    require_once 'app/helpers/auth.helper.php';
    require_once 'config.php';
    class AuthController{
        private $model;
        private $view;
    

        function __construct() {
            $this->model = new UsersModel();
            $this->view = new AuthView();
        }

        function showLogin() {
            $this->view->showLogin();
        }

        public function auth() {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (empty($username) || empty($password)) {
                $this->view->showLogin('Faltan completar datos');
                return;
            }

            if ($username!= USER) {
                $this->view->showLogin('User incorrecto');
                return;
            }
            

            // busco el usuario
            $user = $this->model->getByUsername($username);
            $password_db = $user->Password;

            if ($user && password_verify($password, $password_db)) {
                // ACA LO AUTENTIQUE
                AuthHelper::login($user);
                header('Location: ' . BASE_URL);
            } else {
                $this->view->showLogin('Contrasenia incorrecta');
            }
        }

        public function logout() {
            AuthHelper::logout();
            header('Location: ' . BASE_URL);    
        }
    }

?>