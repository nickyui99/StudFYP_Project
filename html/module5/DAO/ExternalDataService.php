<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/html/model/Database.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/html/module5/ClassModel/AssignedEvaluationModel.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/html/module5/ClassModel/ProjectLogbookModel.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/html/module5/ClassModel/EvaluationRubricModel.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/html/module5/ClassModel/EvaluationReportModel.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/html/module5/ClassModel/EvaluationResultModel.php';

class ExternalDataService
{

    function getAssignedEvaluation($query, $id)
    {

        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT * FROM assigned_industrial_evaluator 
            INNER JOIN industrial_panel ON industrial_panel.ip_id = assigned_industrial_evaluator.ip_id 
            INNER JOIN student ON assigned_industrial_evaluator.stud_id = student.stud_id 
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

            foreach ($assigned_ev_array as $assigned_ev) {
                $sql_query = "SELECT * FROM evaluation_result 
                    INNER JOIN fyp_project ON evaluation_result.fyp_proj_id = fyp_project.fyp_proj_id 
                    INNER JOIN assigned_industrial_evaluator ON evaluation_result.assigned_ip_id = assigned_industrial_evaluator.assigned_ip_id
                    WHERE fyp_project.fyp_proj_id = '" . $assigned_ev->getProjectId() . "'
                    AND assigned_industrial_evaluator.ip_id = '$id'";

                $result = $connection->query($sql_query);

                $evaluation_status = false; //Initialize

                if ($result->num_rows > 0) {
                    $evaluation_status = true;
                } else {
                    $evaluation_status = false;
                }
                $assigned_ev->setEvaluationStatus($evaluation_status);
            }
        }

        //Close connection
        $connection->close();

        return $assigned_ev_array;
    }

    function getEvaluationDetails($proj_id, $stud_id, $submission)
    {

        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT * FROM fyp_project " .
            "WHERE fyp_proj_id = '" . $proj_id . "' AND " .
            "stud_id = '" . $stud_id . "'";

        //Run SQL Query
        $result = $connection->query($sql_query);

        $evaluateFypModel = new EvaluateFyp();
        if ($result->num_rows == 0) {
            //Do nothing
        } else {
            $row = $result->fetch_assoc();

            $evaluateFypModel->setFypLevel($row['proj_fyp_stage']);
            $evaluateFypModel->setProjTitle($row['proj_title']);
            $evaluateFypModel->setProjMark('');
            $evaluateFypModel->setProjFeedback('');
            $evaluateFypModel->setProjQR(base64_encode($row['fyp_qrcode']));
        }

        //Close connection
        $connection->close();

        return $evaluateFypModel;
    }


    function getIpEvaluationRubric($submission, $fyp_level)
    {
        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT * FROM evaluation_rubric 
            WHERE rubric_submission ='$submission' AND 
            rubric_num = 'PSM/PTA'
            ORDER BY `evaluation_rubric`.`rubric_num` ASC";

        //Run SQL Query
        $result = $connection->query($sql_query);

        $evaluation_rubric_array = array();

        if ($result->num_rows == 0) {
            //Do nothing
        } else {
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $ev_rubric_model = new EvaluationRubric();
                $ev_rubric_model->setRubricId($row['evaluation_rubric_id']);
                $ev_rubric_model->setRubricNum($row['rubric_num']);
                $ev_rubric_model->setRubricTitle($row['rubric_title']);
                $ev_rubric_model->setRubricDetails($row['rubric_details']);
                $ev_rubric_model->setRubricMark($row['rubric_mark']);
                $ev_rubric_model->setRubricWeightage($row['rubric_weightage']);

                //Add to array
                $evaluation_rubric_array[$i] = $ev_rubric_model;
                $i++;
            }
        }
        //Close connection
        $connection->close();

        return $evaluation_rubric_array;
    }

    function getProjectLog($proj_id, $submission)
    {
        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT * FROM project_logbook 
        WHERE fyp_proj_id ='$proj_id' AND 
        submission = '$submission'";

        //Run SQL Query
        $result = $connection->query($sql_query);

        $project_log_array = array();

        if ($result->num_rows == 0) {
            //Do nothing
        } else {
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $project_log_model = new ProjectLogbook();
                $project_log_model->setDate($row['logbook_date']);
                $project_log_model->setActivity($row['logbook_details']);

                //Add to array
                $project_log_array[$i] = $project_log_model;
                $i++;
            }
        }

        //Close connection
        $connection->close();

        return $project_log_array;
    }

    function getAssignedIPId($ip_id)
    {

        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT * FROM assigned_industrial_evaluator WHERE ip_id = '$ip_id'";

        //Run SQL Query
        $result = $connection->query($sql_query);

        if ($result->num_rows == 0) {
            $assigned_ip_id = null;
        } else {
            $row = $result->fetch_assoc();
            $assigned_ip_id = $row['assigned_ip_id'];
        }

        //Close connection
        $connection->close();

        return $assigned_ip_id;
    }

    function insertIPEvaluationResult($ev_result, $ev_id, $stud_id)
    {
        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT * FROM evaluation_result ORDER BY result_id DESC";

        //Run SQL Query
        $result = $connection->query($sql_query);

        $new_result_id = "";
        $insert_status = true;

        if ($result->num_rows == 0) {
            //If no result in the database set ID from ER001
            $new_result_id = "ER001";
        } else {
            //If there is id in it check the last id in the record and increment it by one
            $row = $result->fetch_assoc();
            $last_id = $row['result_id'];
            echo $last_id;

            //check last id number
            $result_num = preg_replace('/[^0-9]/', '', $last_id);

            $new_result_num = (int)($result_num) + 1;
            $new_result_id = "ER" . sprintf("%03d", $new_result_num);
        }

        echo $new_result_id;

        $sql_query = "INSERT INTO evaluation_result 
        VALUES ('" . $new_result_id . "', '" . $ev_result->getProjID() . "', 'NULL', '" . $ev_id . "', 
        '" . $ev_result->getSubmission() . "', '" . $ev_result->getProjectFeedback() . "', 
        '" . $ev_result->getEvaluationDate() . "')";

        echo $sql_query;

        if ($connection->query($sql_query) == TRUE) {
            $ev_mark_arrray = $ev_result->getEvMarkDetails();
            echo "Data inserted <br>";

            foreach ($ev_mark_arrray as $ev_mark) {
                $sql_query = "INSERT INTO ev_mark_details
                VALUES ('0', '$new_result_id','" . $ev_mark->getEvaluationRubricId() . "', '" . $ev_mark->getActualMark() . "')";
                if ($connection->query($sql_query) == TRUE) {
                    echo $ev_mark->getEvaluationRubricId() . " mark inserted<br>";
                    $insert_status = true;
                } else {
                    echo $ev_mark->getEvaluationRubricId() . " insert failed";
                    //Set insert status as false and break for loop
                    $insert_status = false;
                    break;
                }
            }
        } else {
            echo "Error: " . $sql_query . "<br>" . $connection->error;
            $insert_status = false;
        }

        //Close connection
        $connection->close();

        //Return SQL insert status
        return $insert_status;
    }

    function getEvaluationReport($query, $id)
    {
        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT evaluation_result.result_id, evaluation_result.fyp_proj_id, evaluation_result.assigned_ip_id,
            fyp_project.proj_title, evaluation_result.submission_level, evaluation_result.evaluation_feedback, 
            assigned_industrial_evaluator.ip_id, fyp_project.proj_fyp_stage, fyp_project.stud_id,
            evaluation_result.evaluation_date FROM evaluation_result 
            INNER JOIN assigned_industrial_evaluator 
            ON assigned_industrial_evaluator.assigned_ip_id = evaluation_result.assigned_ip_id 
            INNER JOIN fyp_project ON evaluation_result.fyp_proj_id = fyp_project.fyp_proj_id 
            WHERE assigned_industrial_evaluator.ip_id = '$id' AND 
            (evaluation_result.fyp_proj_id LIKE '%$query%' OR 
            fyp_project.proj_title LIKE '%$query%' OR 
            assigned_industrial_evaluator.stud_id LIKE '%$query%')
            ORDER BY evaluation_result.result_id ASC";

        //Run SQL Query
        $result = $connection->query($sql_query);

        $evaluation_report_array = array();

        if ($result->num_rows == 0) {
            //Do nothing
        } else {
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $ev_report = new EvaluationReport();

                $ev_report->setResultId($row['result_id']);
                $ev_report->setProjID($row['fyp_proj_id']);
                $ev_report->setFypStage($row['proj_fyp_stage']);
                $ev_report->setSubmission($row['submission_level']);
                $ev_report->setProjTitle($row['proj_title']);
                $ev_report->setEvaluationDate($row['evaluation_date']);
                $ev_report->setStudID($row['stud_id']);

                //Add to array
                $evaluation_report_array[$i] = $ev_report;
                $i++;
            }

            foreach ($evaluation_report_array as $ev_report) {

                //get total marks
                $sql_query = "SELECT actual_mark FROM ev_mark_details 
                    WHERE result_id = '" . $ev_report->getResultId() . "'";

                //Run SQL Query
                $result = $connection->query($sql_query);

                if ($result->num_rows == 0) {
                    $ev_report->setMark(0);
                } else {
                    $total_actual_mark = 0;
                    while ($row = $result->fetch_assoc()) {
                        $total_actual_mark = $total_actual_mark + $row['actual_mark'];
                    }

                    $ev_report->setMark($total_actual_mark);
                }
            }
        }
        //Close connection
        $connection->close();

        return $evaluation_report_array;
    }


    function deleteEvaluationReport($er_id)
    {
        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "DELETE FROM ev_mark_details WHERE result_id = '$er_id'";

        if ($connection->query($sql_query) == TRUE) {
            echo "Evaluation mark data deleted successfully";

            //Delete Data from Evaluation Result
            $sql_query = "DELETE FROM evaluation_result WHERE result_id = '$er_id'";
            if ($connection->query($sql_query) == TRUE) {
                echo "Evaluation mark data deleted successfully";
            } else {
                echo "Error deleting evaluation report data: " . $connection->error;
            }
        } else {
            echo "Error deleting evaluation mark data: " . $connection->error;
        }

        //Close connection
        $connection->close();
    }

    function getEvaluationReportFromERID($er_id_array)
    {
        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        //Initiate array
        $evaluation_report_array = array();
        $i = 0;

        foreach ($er_id_array as $er_id) {
            $sql_query = "SELECT evaluation_result.result_id, evaluation_result.fyp_proj_id, evaluation_result.assigned_ip_id, fyp_project.proj_title, evaluation_result.submission_level, 
            evaluation_result.evaluation_feedback, assigned_industrial_evaluator.ip_id, fyp_project.proj_fyp_stage, fyp_project.stud_id, evaluation_result.evaluation_date
            FROM evaluation_result INNER JOIN assigned_industrial_evaluator 
            ON assigned_industrial_evaluator.assigned_ip_id = evaluation_result.assigned_ip_id 
            INNER JOIN fyp_project 
            ON evaluation_result.fyp_proj_id = fyp_project.fyp_proj_id
            WHERE evaluation_result.result_id = '$er_id'";

            //Run SQL Query
            $result = $connection->query($sql_query);

            if ($result->num_rows == 0) {
                //Do nothing
            } else {

                $row = $result->fetch_assoc();

                $ev_report = new EvaluationReport();
                $ev_report->setResultId($row['result_id']);
                $ev_report->setProjID($row['fyp_proj_id']);
                $ev_report->setFypStage($row['proj_fyp_stage']);
                $ev_report->setSubmission($row['submission_level']);
                $ev_report->setProjTitle($row['proj_title']);
                $ev_report->setEvaluationDate($row['evaluation_date']);
                $ev_report->setStudID($row['stud_id']);
                $ev_report->setEvaluationFeedback($row['evaluation_feedback']);

                //get total marks
                $sql_query = "SELECT * FROM ev_mark_details WHERE result_id = '" . $ev_report->getResultId() . "'";

                //Run SQL Query
                $result = $connection->query($sql_query);

                if ($result->num_rows == 0) {
                    //Do nothing
                } else {

                    $ev_mark_array = array();
                    while ($row = $result->fetch_assoc()) {
                        $ev_mark_det = new EvaluationMarkDetails();
                        $ev_mark_det->setEvMarkId($row['ev_mark_id']);
                        $ev_mark_det->setResultId($row['result_id']);
                        $ev_mark_det->setEvaluationRubricId($row['evaluation_rubric_id']);
                        $ev_mark_det->setActualMark($row['actual_mark']);

                        //Push evaluation mark details into ev_mark_array
                        array_push($ev_mark_array, $ev_mark_det);
                    }

                    //Set evaluation mark array into evaluation report
                    $ev_report->setMark($ev_mark_array);
                }


                //Add to array
                $evaluation_report_array[$i] = $ev_report;
                $i++;
            }
        }
        //Close connection
        $connection->close();

        return $evaluation_report_array;
    }

    function updateEvaluationResult($ev_report)
    {
        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "UPDATE evaluation_result
            SET evaluation_feedback = '" . $ev_report->getEvaluationFeedback() . "',
            evaluation_date = '" . date("Y-m-d") . "'
            WHERE result_id = '" . $ev_report->getResultId() . "'";

        $is_update_success = "";
        if ($connection->query($sql_query) == TRUE) {
            echo "</br>Record " . $ev_report->getResultId() . " updated successfully";
            $is_update_success = true;
        } else {
            echo "</br>Error updating record: " . $connection->error;
            $is_update_success = false;
        }

        //Close conection
        $connection->close();

        //Return update status
        return $is_update_success;
    }


    function updateEvaluationMark($ev_mark_array)
    {
        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        foreach ($ev_mark_array as $ev_mark) {
            $sql_query = "UPDATE ev_mark_details
                SET actual_mark = '" . $ev_mark->getActualMark() . "'
                WHERE result_id = '" . $ev_mark->getResultId() . "'
                AND ev_mark_id = '" . $ev_mark->getEvMarkId() . "'";

            $is_update_success = true;
            if ($connection->query($sql_query) == true) {
                echo "</br>Record " . $ev_mark->getEvMarkId() . " updated successfully";
                $is_update_success = true;
            } else {
                echo "</br>Error updating record: " . $connection->error;
                $is_update_success = false;
                break;
            }
        }

        //Close conection
        $connection->close();

        // return $is_update_success;
        return $is_update_success;
    }

    
}
