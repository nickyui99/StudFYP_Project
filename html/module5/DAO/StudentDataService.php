<?php
require_once 'Database.php';
require_once '../Model/LecturerEvaluatorModel.php';
require_once '../Model/IndustrialEvaluatorModel.php';
require_once '../Model/EvaluationResultModel.php';

class StudentDataService
{
    function getLectEvaluator($search)
    {
        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT assigned_lecturer_evaluator.assigned_lect_id, assigned_lecturer_evaluator.lect_id, assigned_lecturer_evaluator.evaluator_name, lecturer.lect_contact_num, lecturer.lect_email " .
            "FROM assigned_lecturer_evaluator " . 
            "INNER JOIN lecturer ON assigned_lecturer_evaluator.lect_id = lecturer.lect_id ".
            "WHERE assigned_lect_id LIKE '%". $search ."%' OR ". 
            "evaluator_name LIKE '%". $search ."%'";

        //Run SQL Query
        $result = $connection->query($sql_query);

        if ($result->num_rows == 0) {
            return null;
        } else {
            $i = 0;
            $lect_evaluator_array = array();
            while ($row = $result->fetch_assoc()) {

                //Retrieve data
                $lecturer_evaluator = new LecturerEvaluator();
                $lecturer_evaluator->setEvaluatorID($row['assigned_lect_id']);
                $lecturer_evaluator->setLecturerID($row['lect_id']);
                $lecturer_evaluator->setEvaluatorName($row['evaluator_name']);
                $lecturer_evaluator->setContactNum($row['lect_contact_num']);
                $lecturer_evaluator->setEmail($row['lect_email']);

                //Add to array
                $lect_evaluator_array[$i] = $lecturer_evaluator;
                $i++;
            }

            //Close connection
            $connection->close();

            //Set output
            $output = "";
            foreach ($lect_evaluator_array as $evaluator) {
                $output = $output . "<tr><td>" . $evaluator->getEvaluatorID() . 
                "</td><td>Lecturer</td><td>" . $evaluator->getEvaluatorName() . 
                "</td><td>" . $evaluator->getContactNum() . 
                "</td><td>" . $evaluator->getEmail() . 
                "</td><td> - </td></tr>";
            }
            return $output;
        }
    }


    function getIndustrialEvaluator($search)
    {
        $db = new Database();

        $sql_query = "SELECT assigned_industrial_evaluator.assigned_ip_id, assigned_industrial_evaluator.ip_id, assigned_industrial_evaluator.evaluator_name, industrial_panel.ip_contact_num, industrial_panel.ip_email, industrial_panel.ip_company " . 
            "FROM assigned_industrial_evaluator " . 
            "INNER JOIN industrial_panel ON assigned_industrial_evaluator.ip_id = industrial_panel.ip_id " . 
            "WHERE assigned_ip_id LIKE '%" . $search . "%' OR ".
            "evaluator_name LIKE '%" . $search . "%'";

        //Connect database
        $connection = $db->getConnection();

        //Run SQL query
        $result = $connection->query($sql_query);

        if ($result->num_rows == 0) {
            return null;
        } else {
            $i = 0;
            $industrial_evaluator_array = array();
            while ($row = $result->fetch_assoc()) {

                //Retrieve data
                $industrial_evaluator = new IndustrialEvaluator();
                $industrial_evaluator->setEvaluatorID($row['assigned_ip_id']);
                $industrial_evaluator->setIPID($row['ip_id']);
                $industrial_evaluator->setEvaluatorName($row['evaluator_name']);
                $industrial_evaluator->setContactNum($row['ip_contact_num']);
                $industrial_evaluator->setEmail($row['ip_email']);
                $industrial_evaluator->setCompany($row['ip_company']);

                //Add to array
                $industrial_evaluator_array[$i] = $industrial_evaluator;
                $i++;
            }

            //Close connection
            $connection->close();

            //Set output
            $output = "";
            foreach ($industrial_evaluator_array as $evaluator) {
                $output = $output . "<tr><td>" . $evaluator->getEvaluatorID() . 
                "</td><td>Industrial Panel</td><td>" . 
                $evaluator->getEvaluatorName() . 
                "</td><td>" . $evaluator->getContactNum() . 
                "</td><td>" . $evaluator->getEmail() . 
                "</td><td>" . $evaluator->getCompany() . 
                "</td></tr>";
            }

            return $output;
        }
    }

    function getFyp1Result($student_id){

        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT evaluation_result.submission_level, evaluation_result.assigned_lect_id, assigned_lecturer_evaluator.evaluator_name, evaluation_result.evaluation_feedback, evaluation_result.evaluation_mark, evaluation_result.fyp_proj_id, fyp_project.stud_id " . 
            "FROM ((evaluation_result " . 
            "INNER JOIN assigned_lecturer_evaluator ON evaluation_result.assigned_lect_id = assigned_lecturer_evaluator.assigned_lect_id) " . 
            "INNER JOIN fyp_project ON evaluation_result.fyp_proj_id = fyp_project.fyp_proj_id )" .
            "WHERE evaluation_result.assigned_lect_id IS NOT NULL AND " . 
            "fyp_project.proj_fyp_stage = 'PSM1' AND " . 
            "fyp_project.stud_id = '" . $student_id . "'";     
            
        //Run SQL query
        $result = $connection->query($sql_query);

        if ($result->num_rows == 0) {
            return null;
        } else {
            $i = 0;
            $result_array = array();
            //Retrieve data
            while ($row = $result->fetch_assoc()) {
                $evaluation_result = new EvaluationResult();
                $evaluation_result->EvaluationResult($row['submission_level'], $row['assigned_lect_id'], $row['evaluator_name'], $row['evaluation_feedback'], $row['evaluation_mark']);

                //Add to array
                $result_array[$i] = $evaluation_result;
                $i++;
            }

            //Close connection
            $connection->close();

            //Set output
            $output = "";
            $counter = 0;
            foreach ($result_array as $result){
                $output = $output . 
                    "<tr>" . 
                    "<td>". $result->getSubmission() . "</td>" . 
                    "<td>". $result->getEvaluatorID() . "</td>" . 
                    "<td>". $result->getEvaluatorName() ."</td>" .
                    "<td>". $result->getProjectFeedback() ."</td>" .
                    "<td>". $result->getEvaluationMark() ."</td>" .
                    "</tr>";
                $counter++;
            }

            if($counter<3){
                for($i=$counter+1; $i<=3; $i++){
                    $output = $output . "<tr> <td>" . $i . "</td>  <td> - </td> <td> - </td> <td> - </td> <td> - </td> </tr>";
                }
            }

            return $output;
        }
    }
}
