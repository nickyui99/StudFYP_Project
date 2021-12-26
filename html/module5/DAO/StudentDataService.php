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
                    $lecturer_evaluator -> setLecturerID($row['lect_id']);
                    $lecturer_evaluator -> setEvaluatorName($row['evaluator_name']);
                    
                    //Add to array
                    $lect_evaluator_array[$i] = $lecturer_evaluator;
                    $i++;
                }

                $connection->close();

                foreach($lect_evaluator_array as $i){
                    $sds = new StudentDataService();
                    $evaluator = $sds -> getLectEvaluatorDetails($i);
                    echo "<tr>";
                    echo "<td>" . $evaluator->getEvaluatorID() . "</td>";
                    echo "<td>Lecturer</td>";
                    echo "<td>" . $evaluator->getEvaluatorName() . "</td>";
                    echo "<td>" . $evaluator->getContactNum() . "</td>";
                    echo "<td>" . $evaluator->getEmail() . "</td>";
                    echo "<td> - </td>";
                    echo "</tr>";
                }
            }
        }

        function getLectEvaluatorDetails($lect_evaluator){
            $db = new Database();
            
            $sql_query = "SELECT * FROM lecturer WHERE lect_id = '" . $lect_evaluator->getLecturerID() . "'"; 

            $connection = $db->getConnection();

            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            $result = $connection->query($sql_query);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $lect_evaluator->setContactNum($row['lect_contact_num']);
                    $lect_evaluator->setEmail($row['lect_email']);
                }
            }
            
            $connection->close();
            return $lect_evaluator;
        }

    }
?>