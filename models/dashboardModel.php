<?php

class DashboardModel extends Model {
    function __construct() {
        parent::__construct();
    }

    function get() {
        $conn = $this->database->connect()->prepare("SELECT * FROM employees");
        try {
            $conn->execute();
            return $conn->fetchAll();
        } catch (PDOException $e){
            return null;
        }
    }

    function getById($id) {
        $conn = $this->database->connect()->prepare("SELECT * FROM employees WHERE id = :id");
        try {
            $conn->execute(['id'=>$id]);
            $user = $conn->fetch();
            return $user;
        } catch (PDOException $e){
            return $e;
        }
    }

    function update($id, $data) {
        $conn = $this->database->connect()->prepare("UPDATE employees
        SET name = :name,
            lastName = :lastName,
            email = :email,
            gender = :gender,
            city = :city,
            streetAddress = :streetAddress,
            state = :state,
            age = :age,
            postalCode = :postalCode,
            phoneNumber = :phoneNumber
        WHERE id = :id");
        try {
            $conn->execute(['id'=>$id, 'name'=>$data['name'], 'lastName'=>$data['lastName'], 'email'=>$data['email'], 'gender'=>$data['gender'], 'city'=>$data['city'], 'streetAddress'=>$data['streetAddress'], 'state'=>$data['state'], 'age'=>$data['age'], 'postalCode'=>$data['postalCode'], 'phoneNumber'=>$data['phoneNumber']]);
            return 'User updated correctly!';
        } catch (PDOException $e){
            return $e;
        }
    }

    function create($data) {
        $conn = $this->database->connect()->prepare("INSERT INTO employees (name, lastName, email, gender, city, streetAddress, state, age,postalCode, phoneNumber)
        VALUES (:name, :lastName, :email, :gender, :city, :streetAddress, :state, :age, :postalCode, :phoneNumber)");
        try {
            $conn->execute(['name'=>$data['name'], 'lastName'=>$data['lastName'], 'email'=>$data['email'], 'gender'=>$data['gender'], 'city'=>$data['city'], 'streetAddress'=>$data['streetAddress'], 'state'=>$data['state'], 'age'=>$data['age'], 'postalCode'=>$data['postalCode'], 'phoneNumber'=>$data['phoneNumber']]);
            return 'User created correctly!';
        } catch (PDOException $e){
            return $e;
        }
    }
}


?>