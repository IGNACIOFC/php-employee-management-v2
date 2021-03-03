<?php

class MainModel extends Model {
    function __construct() {
        parent::__construct();
    }

    function checkCredentials($email, $password) {
        $conn = $this->database->connect()->prepare("SELECT * FROM users WHERE email = :email");
        try {
            $conn->execute(['email'=>$email]);
            $user = $conn->fetch();
            if(password_verify($password, $user['password'])) {
                return $user;
            } else {
                return null;
            }
        } catch (PDOException $e){
            return $e;
        }
    }
}
