<?php
    require_once 'Database.php';
    require_once '../Model/LecturerEvaluatorModel.php';

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
                $i = 0;
                $lect_evaluator_array = array();
                while($row = $result->fetch_assoc()) {

                    $lecturer_evaluator = new LecturerEvaluator();
                    $lecturer_evaluator->setEvaluatorID($row['assigned_lect_id']);
                    $lecturer_evaluator -> setEvaluatorName($row['evaluator_name']);
                    $lect_evaluator_array[$i] = $lecturer_evaluator;
                    $i++;
                }

                foreach($lect_evaluator_array as $evaluator){
                    echo $evaluator->getEvaluatorID();
                    echo $evaluator->getEvaluatorName();
                }
            }
        }

    }
?>