<?php
    require_once 'Database.php';

    class StudentDataService{

        function getEvaluator(){
            $db = new Database();
            
            $sql_query = "SELECT * FROM assigned_lecturer_evaluator"; 

            $connection = $db->getConnection();

            $result = $connection->query($sql_query);

            if($result->num_rows == 0){
                return null;
            }
            else{
                while($row = $result->fetch_assoc()) {
                    
                }
            }
        }

    }
?>