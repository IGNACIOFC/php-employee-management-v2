<?php

class UsersModel extends Model
{
  function __construct()
  {
    parent::__construct();
  }

  function get()
  {
    $conn = $this->database->connect()->prepare("SELECT * FROM users");
    try {
      $conn->execute();
      return $conn->fetchAll();
    } catch (PDOException $e) {
      return $e;
    }
  }

  function getById($id)
  {
    $conn = $this->database->connect()->prepare("SELECT * FROM users WHERE id = :id");
    try {
      $conn->execute(['id' => $id]);
      $user = $conn->fetch();
      return $user;
    } catch (PDOException $e) {
      return $e;
    }
  }

  function delete($id)
  {
    $conn = $this->database->connect()->prepare("DELETE FROM users WHERE id = :id");
    try {
      $conn->execute(['id' => $id]);
      return 'User deleted correctly!';
    } catch (PDOException $e) {
      return $e;
    }
  }

  function update($id, $data)
  {
    $conn = $this->database->connect()->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
    try {
      $conn->execute(['id' => $id, 'name' => $data['name'], 'email' => $data['email']]);
      return 'User updated correctly!';
    } catch (PDOException $e) {
      return $e;
    }
  }

  function create($data)
  {
    $conn = $this->database->connect()->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    try {
      $conn->execute(['name' => $data['name'], 'email' => $data['email'], 'password' => $data['password']]);
      return 'User created correctly!';
    } catch (PDOException $e) {
      return $e;
    }
  }
}
