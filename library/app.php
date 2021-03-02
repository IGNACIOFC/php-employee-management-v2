<?php

class App
{
    function __construct()
    {
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        if (empty($url[0])) {
            require_once 'controllers/mainController.php';
            $controller = new Main();
            $controller->render();
        } else {
            $archivoController = 'controllers/' . $url[0] . 'Controller.php';

            if (file_exists($archivoController)) {
                require_once $archivoController;

                $controller = new $url[0];
                $controller->loadModel($url[0]);

                $nparam = sizeof($url);

                if ($nparam > 2) {
                    $param = [];
                    for ($i = 2; $i < $nparam; $i++) {
                        array_push($param, $url[$i]);
                    }
                    $controller->{$url[1]}($param);
                } else if ($nparam > 1) {
                    $controller->{$url[1]}();
                } else {
                    $controller->render();
                }
            } else {
                require_once 'controllers/erroresController.php';
                $controller = new Errores();
            }
        }
    }
}
