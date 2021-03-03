<?php

class Dashboard extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $this->view->render('dashboard/index');
    }

    function getAllEmployees()
    {
        header('Content-Type: application/json');
        echo json_encode($this->model->get());
    }

    function employee()
    {
        $this->view->result = $this->model->uifacesRequest();
        $this->view->render('dashboard/employee');
    }

    function getEmployee($param)
    {
        $this->view->employee = $this->model->getById($param[0]);
        $gender = $this->view->employee['gender'] == 'man' ? 'male' : ($this->view->employee['gender'] == "woman" ? "female" : "");
        if (isset($this->view->employee['avatar'])) {
            $this->view->result = $this->model->uifacesRequest($this->view->employee['age'], $gender, 7);
            array_push($this->view->result, array("photo" => $this->view->employee['avatar']));
        } else {
            $this->view->result = $this->model->uifacesRequest($this->view->employee['age'], $gender);
        }
        $this->view->render('dashboard/employee');
    }

    function updateEmployee($param)
    {
        $data = isset($_POST['name']) ? $_POST : $this->getQueryStringParameters();
        $this->view->message = $this->model->update($param[0], $data);
        $this->view->render('dashboard/index');
    }

    function createEmployee()
    {
        $data = $_POST;
        $this->view->message = $this->model->create($data);
        if (isset($data['id'])) {
            $this->view->render('dashboard/employee');
        } else {
            header('Content-Type: application/json');
            echo json_encode($this->model->getIdByEmail($data['email']));
        }
    }

    function deleteEmployee()
    {
        $query = $this->getQueryStringParameters();
        $this->view->message = $this->model->delete($query['id']);
        $this->view->render('dashboard/index');
    }

    function getQueryStringParameters(): array
    {
        parse_str(file_get_contents("php://input"), $query);
        return $query;
    }
}
