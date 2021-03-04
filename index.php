<?php
require_once 'config/config.php';
require_once 'library/database.php';
require_once 'library/controller.php';
require_once 'library/view.php';
require_once 'library/model.php';
require_once 'library/app.php';

$app = new App();

session_start();
if (isset($_SESSION['life'])) {
    if ((time() - $_SESSION['init'] > $_SESSION['life']) && !($app->getController() == "main" && $app->getMethod() == "logoutByTime")) {
        header("Location: " . URL . "main/logoutByTime");
        die;
    } else if ($app->getController() == 'main' && !($app->getMethod())) {
        header("Location: " . URL . "dashboard");
        die;
    }
} else if (!($app->getController() == "main" || ($app->getController() == "main" && $app->getMethod() == "login"))) {
    header("Location: " . URL);
    die;
}

$app->routing();
