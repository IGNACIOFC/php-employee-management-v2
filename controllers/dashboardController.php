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

    function getEmployee($param) {
        $this->view->employee = $this->model->getById($param[0]);
        $this->view->render('dashboard/employee');
    }

    function updateEmployee($param) {
        $data = $_POST;
        $this->view->message = $this->model->update($param[0], $data);
        $this->view->render('dashboard/index');
    }

    function createEmployee() {
        $data = $_POST;
        $this->view->message = $this->model->create($data);
        $this->view->render('dashboard/index');
    }
}