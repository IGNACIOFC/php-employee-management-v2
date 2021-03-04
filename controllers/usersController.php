<?php

class Users extends Controller
{
  function __construct()
  {
    parent::__construct();
  }

  function render()
  {
    $this->view->render('users/index');
  }

  function getAllUsers()
  {
    header('Content-Type: application/json');
    echo json_encode($this->model->get());
  }

  function newUser()
  {
    $this->view->render('users/user');
  }

  function getUser($param)
  {
    $this->view->user = $this->model->getById($param[0]);
    $this->view->render('users/user');
  }

  function deleteUser()
  {
    $query = $this->getQueryStringParameters();
    if ($query['id'] == 1) {
      $this->view->message = 'Can´t eliminate principal admin';
      $this->view->render('users/index');
    } else {
      $this->view->message = $this->model->delete($query['id']);
      $this->view->render('users/index');
    }
  }

  function updateUser($param)
  {
    if ($param[0] == 1) {
      $this->view->message = 'Can´t update principal admin';
      $this->view->render('users/index');
    } else {
      $data = $_POST;
      $this->view->message = $this->model->update($param[0], $data);
      $this->view->render('users/index');
    }
  }

  function createUser()
  {
    $data = $_POST;
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    $this->view->message = $this->model->create($data);
    $this->view->render('users/index');
  }

  function getQueryStringParameters(): array
  {
    parse_str(file_get_contents("php://input"), $query);
    return $query;
  }
}
