<?php

class Database{
    private $DB_SERVER = "localhost";
    private $DB_USERNAME = "root";
    private $DB_PASSWORD = "";
    private $DB_DATABASE = "studfyp_db";

    function getConnection(){
        $conn = new mysqli($this -> DB_SERVER, $this -> DB_USERNAME, $this -> DB_PASSWORD, $this -> DB_DATABASE);

        if($conn -> connect_error){
            echo "Connection failed : " . $conn->connect_error . "<br>";
        }
        else{
            return $conn;
        }
    }
}
    
?>