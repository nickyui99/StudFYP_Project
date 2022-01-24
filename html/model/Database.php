<?php

class Database{
    private $DB_SERVER = "us-cdbr-east-05.cleardb.net";
    private $DB_USERNAME = "b211c0deb15c87";
    private $DB_PASSWORD = "93a873ef";
    private $DB_DATABASE = "heroku_063bb470aa341a8";

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