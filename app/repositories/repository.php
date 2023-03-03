<?php

class Repository {

    protected $conn;

    function __construct() {

        require __DIR__ . '/../config/dbconfig.php';

        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }       
}
?>