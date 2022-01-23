<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/html/model/Database.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/html/module5/ClassModel/AssignedEvaluationModel.php';

class ExternalDataService{

    function getAssignedEvaluation($query, $id)
    {

        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT * FROM assigned_industrial_evaluator 
            INNER JOIN industrial_panel ON industrial_panel.ip_id = assigned_industrial_evaluator.ip_id 
            INNER JOIN student ON assigned_lecturer_evaluator.stud_id = student.stud_id 
            INNER JOIN fyp_project ON student.stud_id = fyp_project.stud_id 
            WHERE assigned_industrial_evaluator.ip_id = '$id' AND (
            fyp_project.stud_id LIKE '%$query%' OR 
            fyp_project.fyp_proj_id LIKE '%$query%' OR 
            student.stud_name LIKE '%$query%')";

        //Run SQL Query
        $result = $connection->query($sql_query);

        $assigned_ev_array = array();
        if ($result->num_rows == 0) {
            //Do nothing
        } else {
            $i = 0; 
            while ($row = $result->fetch_assoc()) {
                //Retrieve data
                $assigned_ev = new AssignedEvaluation();
                $assigned_ev->setProjectID($row['fyp_proj_id']);
                $assigned_ev->setStudentID($row['stud_id']);
                $assigned_ev->setStudentName($row['stud_name']);
                $assigned_ev->setFypLevel($row['proj_fyp_stage']);
                $assigned_ev->setFypProgress($row['fyp_proj_progress']);
                $assigned_ev->setEvaluation1($row['document_submission_1']);
                $assigned_ev->setEvaluation2($row['document_submission_2']);
                $assigned_ev->setEvaluation3($row['document_submission_3']);

                //Add to array
                $assigned_ev_array[$i] = $assigned_ev;
                $i++;
            }

            //Check if the submission already done, if done return true, else return false
            $evaluation_status = array();
            foreach ($assigned_ev_array as $assigned_ev) {
                for ($i = 1; $i <= 3; $i++) {
                    $sql_query = "SELECT * FROM evaluation_result 
                    INNER JOIN fyp_project ON evaluation_result.fyp_proj_id = fyp_project.fyp_proj_id 
                    WHERE fyp_project.fyp_proj_id = '" . $assigned_ev->getProjectId() . "' AND evaluation_result.submission_level = '$i';";

                    $result = $connection->query($sql_query);
                    if ($result->num_rows > 0) {
                        $evaluation_status[$i] = true;
                    } else {
                        $evaluation_status[$i] = false;
                    }
                }

                $assigned_ev->setEvaluationStatus($evaluation_status);
            }
        }

         //Close connection
         $connection->close();

         return $assigned_ev_array;
    }
}