<?php

class Repository {

    protected $conn;

    function __construct() {

        require __DIR__ . '/../config/dbconfig.php';

        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                
            // set the PDO error mode to exception


            //TODO : resolve db connection problem here
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected Succesfully";
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }       
}
?>