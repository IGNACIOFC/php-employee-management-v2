<?php 

class Dashboard extends Controller {
    function __construct() {
        parent::__construct();
    }

    function render() {
        $this->view->render('dashboard/index');
    }

    function getAllEmployees() {
        header('Content-Type: application/json');
        echo json_encode($this->model->get());
    }

    function employee() {
        $this->view->render('dashboard/employee');
    }
}