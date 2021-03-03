<?php


class Database {

    private $host;
    private $database;
    private $user;
    private $password;
    private $charset;


    function __construct() {
        $this->host = HOST;
        $this->database = DATABASE;
        $this->user = USER;
        $this->password = PASSWORD;
        $this->charset = CHARSET;
    }

    function connect()
    {
      try {
        $connection = "mysql:host=" . $this->host . ";dbname=" . $this->database . ";charset=" . $this->charset;
        $options = [
          PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($connection, $this->user, $this->password, $options);
        return $pdo;
      } catch (PDOException $e) {
        print_r('Error connection: ' . $e->getMessage());
      }
    }
}