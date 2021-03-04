<?php

class Controller
{
    function __construct()
    {
        $this->view = new View();
    }

    function loadModel($name)
    {
        $url = 'models/' . $name . 'Model.php';
        if (file_exists($url)) {
            require $url;
            $modelName = $name . 'Model';
            $this->model = new $modelName();
        }
    }
}
