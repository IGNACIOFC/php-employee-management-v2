<?php

class App
{
    protected $url;
    protected $controller;
    protected $method;
    protected $params;


    public function __construct()
    {
        $this->setUrl();
        $this->setController();
        $this->setMethod();
        $this->setParams();
    }

    function routing()
    {
        $controllerRoute = 'controllers/' . $this->controller . 'Controller.php';
        if (file_exists($controllerRoute)) {
            require_once $controllerRoute;
            $controller = new $this->controller;
            $controller->loadModel($this->controller);
            if ($this->params) {
                $controller->{$this->method}($this->params);
            } else if ($this->method) {
                $controller->{$this->method}();
            } else {
                $controller->render();
            }
        } else {
            $this->errorPage();
        }
    }

    function errorPage()
    {
        $controllerRoute = 'controllers/erroresController.php';
        require_once($controllerRoute);
        new Errores();
    }

    function getUrl()
    {
        return $this->url;
    }

    function getController()
    {
        return $this->controller;
    }
    function getMethod()
    {
        return $this->method;
    }
    function getParams()
    {
        return $this->params;
    }


    function arrayParams($url)
    {
        $param = [];
        for ($i = 2; $i < sizeof($url); $i++) {
            array_push($param, $url[$i]);
        }
        return $param;
    }

    function setUrl()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        $this->url = $url;
    }

    function setController()
    {
        $this->controller = !(empty($this->url[0])) ? $this->url[0] : "main";
    }

    function setMethod()
    {
        $this->method = !(empty($this->url[1])) ? $this->url[1] : null;
    }

    function setParams()
    {
        $this->params = sizeof($this->url) > 2 ? $this->arrayParams($this->url) : null;
    }
}

