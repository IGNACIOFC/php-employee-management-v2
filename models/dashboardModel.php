<?php

class DashboardModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get()
    {
        $conn = $this->database->connect()->prepare("SELECT * FROM employees");
        try {
            $conn->execute();
            return $conn->fetchAll();
        } catch (PDOException $e) {
            return $e;
        }
    }

    function getById($id)
    {
        $conn = $this->database->connect()->prepare("SELECT * FROM employees WHERE id = :id");
        try {
            $conn->execute(['id' => $id]);
            $user = $conn->fetch();
            return $user;
        } catch (PDOException $e) {
            return $e;
        }
    }

    function update($id, $data)
    {
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
            phoneNumber = :phoneNumber,
            avatar = :avatar
        WHERE id = :id");
        try {
            $conn->execute(['id' => $id, 'name' => $data['name'], 'lastName' => $data['lastName'], 'email' => $data['email'], 'gender' => $data['gender'], 'city' => $data['city'], 'streetAddress' => $data['streetAddress'], 'state' => $data['state'], 'age' => $data['age'], 'postalCode' => $data['postalCode'], 'phoneNumber' => $data['phoneNumber'], 'avatar' => $data['avatar']]);
            return 'User updated correctly!';
        } catch (PDOException $e) {
            return $e;
        }
    }

    function create($data)
    {
        if (!isset($data['lastName'])) {
            $data['lastName'] = null;
            $data['gender'] = null;
        }
        $conn = $this->database->connect()->prepare("INSERT INTO employees (name, lastName, email, gender, city, streetAddress, state, age,postalCode, phoneNumber, avatar)
        VALUES (:name, :lastName, :email, :gender, :city, :streetAddress, :state, :age, :postalCode, :phoneNumber, :avatar)");
        try {
            $conn->execute(['name' => $data['name'], 'lastName' => $data['lastName'], 'email' => $data['email'], 'gender' => $data['gender'], 'city' => $data['city'], 'streetAddress' => $data['streetAddress'], 'state' => $data['state'], 'age' => $data['age'], 'postalCode' => $data['postalCode'], 'phoneNumber' => $data['phoneNumber'], 'avatar' => $data['avatar']]);
            return 'User created correctly!';
        } catch (PDOException $e) {
            return $e;
        }
    }

    function getIdByEmail($email)
    {
        $conn = $this->database->connect()->prepare("SELECT id FROM employees WHERE email = :email");
        try {
            $conn->execute(['email' => $email]);
            $response = $conn->fetch();
            return $response['id'];
        } catch (PDOException $e) {
            return $e;
        }
    }

    function delete($id)
    {
        $conn = $this->database->connect()->prepare("DELETE FROM employees WHERE id = :id");
        try {
            $conn->execute(['id' => $id]);
            return 'User deleted correctly!';
        } catch (PDOException $e) {
            return $e;
        }
    }

    function uifacesRequest($age = false, $gender = false, $limit = 8)
    {
        $partial_url = $gender ? "&gender[]=$gender&from_age=" . ($age - 5) . "&to_age=" . ($age + 10) : "";
        $url = "https://uifaces.co/api?limit=$limit$partial_url";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            ('X-API-KEY: ' . APIKEY)
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result, true);
    }
}
