<?php

class Main extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $this->view->render('main/index');
    }

    function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($user = $this->model->checkCredentials($email, $password)) {
            echo $user;
            $this->saveSession($user);
            header('location:' . URL . 'dashboard');
        } else {
            $this->view->message = 'Incorrect Credentials';
            $this->view->render('main/index');
        }
    }

    private function saveSession($user)
    {
        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['init'] = time();
        $_SESSION['life'] = 600;
    }

    function logout()
    {
        session_destroy();
        $this->view->message = "Logout correctly";
        $this->view->render('main/index');
    }

    function logoutByTime()
    {
        session_destroy();
        $this->view->message = "Your session has expired";
        $this->view->render('main/index');
    }
}
