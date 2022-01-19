<?php
require_once 'Database.php';
require_once '../ClassModel/LecturerEvaluatorModel.php';
require_once '../ClassModel/IndustrialEvaluatorModel.php';
require_once '../ClassModel/EvaluationResultModel.php';
require_once '../ClassModel/ProjectDetailsModel.php';
require_once '../ClassModel/EvaluationMarkDetailsModel.php';

class StudentDataService
{
    function getLectEvaluator($search, $id)
    {
        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT * FROM assigned_lecturer_evaluator " .
            "INNER JOIN lecturer ON assigned_lecturer_evaluator.lect_id = lecturer.lect_id " .
            "WHERE stud_id = '" . $id . "' AND " .
            "(assigned_lect_id LIKE '%" . $search . "%' OR " .
            "lect_name LIKE '%" . $search . "%')";

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
                $lecturer_evaluator->setEvaluatorName($row['lect_name']);
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


    function getIndustrialEvaluator($search, $id)
    {
        $db = new Database();

        $sql_query = "SELECT * FROM assigned_industrial_evaluator " .
            "INNER JOIN industrial_panel ON assigned_industrial_evaluator.ip_id = industrial_panel.ip_id " .
            "WHERE stud_id = '" . $id . "' AND " .
            "(assigned_ip_id LIKE '%" . $search . "%' OR " .
            "ip_name LIKE '%" . $search . "%')";

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
                $industrial_evaluator->setEvaluatorName($row['ip_name']);
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

    function getFyp1Result($student_id)
    {

        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT * FROM (((evaluation_result 
            INNER JOIN assigned_lecturer_evaluator ON evaluation_result.assigned_lect_id = assigned_lecturer_evaluator.assigned_lect_id) 
            INNER JOIN fyp_project ON evaluation_result.fyp_proj_id = fyp_project.fyp_proj_id) 
            INNER JOIN lecturer ON lecturer.lect_id = assigned_lecturer_evaluator.lect_id) 
            WHERE evaluation_result.assigned_lect_id IS NOT NULL AND 
            fyp_project.proj_fyp_stage = 'PSM1' AND  
            fyp_project.stud_id = '$student_id'";

        //Run SQL query
        $result = $connection->query($sql_query);

        $evaluationResultArray = array();

        if ($result->num_rows == 0) {
            //Do nothing
        } else {
            $i = 0;

            //Retrieve evaluation result data
            while ($row = $result->fetch_assoc()) {
                $evaluation_result = new EvaluationResult();

                $evaluation_result->setResultID($row['result_id']);
                $evaluation_result->setSubmission($row['submission_level']);
                $evaluation_result->setEvaluatorID($row['assigned_lect_id']);
                $evaluation_result->setEvaluatorName($row['lect_name']);
                $evaluation_result->setProjectTitle($row['proj_title']);
                $evaluation_result->setProjectFeedback($row['evaluation_feedback']);

                //Add to array
                $evaluationResultArray[$i] = $evaluation_result;

                $i++;
            }

            foreach ($evaluationResultArray as $evaluation_result) {
                $sql_query = "SELECT * FROM ev_mark_details WHERE result_id = '" . $evaluation_result->getResultId() . "'";

                //Run SQL query
                $result = $connection->query($sql_query);
                
                $j = 0;
                $ev_mark_array = array();

                //Retrieve evaluation mark details
                while ($row = $result->fetch_assoc()) {
                    $ev_mark_details = new EvaluationMarkDetails();

                    $ev_mark_details->setEvMarkId($row['ev_mark_id']);
                    $ev_mark_details->setEvaluationRubricId($row['evaluation_rubric_id']);
                    $ev_mark_details->setActualMark($row['actual_mark']);

                    //Add to array
                    $ev_mark_array[$j] = $ev_mark_details;
                    $j++;
                }

                //Set evaluation_mark details array to evaluation_result object
                $evaluation_result->setEvMarkDetails($ev_mark_array);
            }

            //Close connection
            $connection->close();

            return $evaluationResultArray;
        }
    }

    function getFyp2Result($student_id)
    {

        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT * FROM (((evaluation_result 
            INNER JOIN assigned_lecturer_evaluator ON evaluation_result.assigned_lect_id = assigned_lecturer_evaluator.assigned_lect_id) 
            INNER JOIN fyp_project ON evaluation_result.fyp_proj_id = fyp_project.fyp_proj_id) 
            INNER JOIN lecturer ON lecturer.lect_id = assigned_lecturer_evaluator.lect_id) 
            WHERE evaluation_result.assigned_lect_id IS NOT NULL AND 
            fyp_project.proj_fyp_stage = 'PSM2' AND  
            fyp_project.stud_id = '$student_id'";

        //Run SQL query
        $result = $connection->query($sql_query);

        $evaluationResultArray = array();

        if ($result->num_rows == 0) {
            //Do nothing
        } else {
            $i = 0;

            //Retrieve evaluation result data
            while ($row = $result->fetch_assoc()) {
                $evaluation_result = new EvaluationResult();

                $evaluation_result->setResultID($row['result_id']);
                $evaluation_result->setSubmission($row['submission_level']);
                $evaluation_result->setEvaluatorID($row['assigned_lect_id']);
                $evaluation_result->setEvaluatorName($row['lect_name']);
                $evaluation_result->setProjectTitle($row['proj_title']);
                $evaluation_result->setProjectFeedback($row['evaluation_feedback']);

                //Add to array
                $evaluationResultArray[$i] = $evaluation_result;

                $i++;
            }

            foreach ($evaluationResultArray as $evaluation_result) {
                $sql_query = "SELECT * FROM ev_mark_details WHERE result_id = '" . $evaluation_result->getResultId() . "'";

                //Run SQL query
                $result = $connection->query($sql_query);
                
                $j = 0;
                $ev_mark_array = array();

                //Retrieve evaluation mark details
                while ($row = $result->fetch_assoc()) {
                    $ev_mark_details = new EvaluationMarkDetails();

                    $ev_mark_details->setEvMarkId($row['ev_mark_id']);
                    $ev_mark_details->setEvaluationRubricId($row['evaluation_rubric_id']);
                    $ev_mark_details->setActualMark($row['actual_mark']);

                    //Add to array
                    $ev_mark_array[$j] = $ev_mark_details;
                    $j++;
                }

                //Set evaluation_mark details array to evaluation_result object
                $evaluation_result->setEvMarkDetails($ev_mark_array);
            }

            //Close connection
            $connection->close();

            return $evaluationResultArray;
        }
    }

    function getFypProjectDetails($student_id)
    {

        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT * FROM fyp_project INNER JOIN student ON fyp_project.stud_id = student.stud_id 
                WHERE student.stud_id = '$student_id'";

        //Run SQL query
        $result = $connection->query($sql_query);
        if ($result->num_rows == 0) {
            return null;
        } else {
            $projectDetailsModel = new ProjectDetails();
            //Retrieve data
            while ($row = $result->fetch_assoc()) {
                $projectDetailsModel->ProjectDetails($row['fyp_proj_id'], $row['proj_title'], $row['stud_id'], $row['stud_name']);
            }
            return $projectDetailsModel;
        }
    }
}
