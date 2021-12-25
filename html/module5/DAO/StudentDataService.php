<?php
    require_once 'Database.php';

    class StudentDataService{

        function getEvaluator(){
            $db = new Database();
            print_r($db);
        }

    }
?>