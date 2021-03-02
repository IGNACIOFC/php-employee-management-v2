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
}


?>