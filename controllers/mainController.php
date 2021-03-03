<?php

class Main extends Controller {
    function __construct() {
        parent::__construct();

    }

    function render() {
        $this->view->render('main/index');
    }

    function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($this->model->checkCredentials($email, $password)) {

            session_start();
            $_SESSION['time'] = time();
            $_SESSION['lifetime'] = 600;
            header('location:'. URL .'dashboard');
        } else {
            $this->view->message = 'Incorrect Credentials';
            $this->view->render('main/index');
        }
    }
}