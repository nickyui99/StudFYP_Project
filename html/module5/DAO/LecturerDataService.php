<?php
require_once 'Database.php';
require_once '../ClassModel/AssignedEvaluationModel.php';
require_once '../ClassModel/ProjectlogbookModel.php';
require_once '../ClassModel/EvaluationRubricModel.php';
require_once '../ClassModel/EvaluationReportModel.php';
require_once '../ClassModel/EvaluationResultModel.php';

class LecturerDataService
{

    function getAssignedEvaluation($query, $id)
    {

        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT * FROM assigned_lecturer_evaluator 
            INNER JOIN fyp_project
            ON assigned_lecturer_evaluator.stud_id = fyp_project.stud_id 
            INNER JOIN lecturer ON lecturer.lect_id = assigned_lecturer_evaluator.lect_id 
            INNER JOIN student ON assigned_lecturer_evaluator.stud_id = student.stud_id 
            WHERE assigned_lecturer_evaluator.lect_id = '$id' AND 
            fyp_project.stud_id LIKE '%$query%'";

        //Run SQL Query
        $result = $connection->query($sql_query);

        if ($result->num_rows == 0) {
            return null;
        } else {
            $i = 0;
            $assigned_ev_array = array();
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

            //Close connection
            $connection->close();

            return $assigned_ev_array;
        }
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

    function getProjectQr($project_id)
    {
        echo $project_id;
        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT fyp_proj_id, fyp_qrcode FROM fyp_project WHERE fyp_proj_id = '" . $project_id . "'";

        //Run SQL Query
        $result = $connection->query($sql_query);

        if ($result->num_rows == 0) {
            //Do nothing
            echo "Download error";
        } else {
            while ($row = $result->fetch_assoc()) {
                $image = $row['fyp_qrcode'];
            }

            header('Expires: 0');
            header('Pragma: no-cache');
            header('Content-Disposition: attachment; filename=ProjectQR_' . $project_id . '.png');
            header('Content-length: ' . strlen($image));
            header('Content-type: image/png');
            ob_clean();
            flush();
            echo $image;
        }

        //Close connection
        $connection->close();
    }

    function getProjectDoc($project_id, $submission)
    {
        $db = new Database();

        //Create connection
        $connection = $db->getConnection();


        $sql_query = "SELECT fyp_proj_id, document_submission_" . $submission . " FROM fyp_project WHERE fyp_proj_id = '" . $project_id . "'";

        //Run SQL Query
        $result = $connection->query($sql_query);

        if ($result->num_rows == 0) {
            //Do nothing
            echo "Download error";
        } else {
            while ($row = $result->fetch_assoc()) {
                $stud_id = $row['stud_id'];
                $document = $row['document_submission_' . $submission];
            }

            header('Expires: 0');
            header('Pragma: no-cache');
            header('Content-Disposition: attachment; filename=' . $stud_id . '_Submission' . $submission . '.pdf');
            header('Content-length: ' . strlen($document));
            header('Content-type: application/pdf');
            ob_clean();
            flush();
            echo $document;
        }

        //Close connection
        $connection->close();
    }

    function getProjectLog($proj_id, $submission)
    {
        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT * FROM project_logbook " .
            "WHERE fyp_proj_id ='" . $proj_id . "' AND " .
            "submission = '" . $submission . "'";

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

    function getEvaluationRubric($submission, $fyp_level)
    {
        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT * FROM evaluation_rubric " .
            "WHERE rubric_submission ='" . $submission . "' AND " .
            "rubric_fyp = '" . $fyp_level . "' " .
            "ORDER BY `evaluation_rubric`.`rubric_num` ASC";

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

    function getEvaluationReport($query, $id)
    {
        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT evaluation_result.result_id, evaluation_result.fyp_proj_id, evaluation_result.assigned_lect_id, fyp_project.proj_title, evaluation_result.submission_level, 
            evaluation_result.evaluation_feedback, assigned_lecturer_evaluator.lect_id, fyp_project.proj_fyp_stage, fyp_project.stud_id, evaluation_result.evaluation_date
            FROM evaluation_result INNER JOIN assigned_lecturer_evaluator 
            ON assigned_lecturer_evaluator.assigned_lect_id = evaluation_result.assigned_lect_id 
            INNER JOIN fyp_project 
            ON evaluation_result.fyp_proj_id = fyp_project.fyp_proj_id
            WHERE assigned_lecturer_evaluator.lect_id = '$id' AND 
            (evaluation_result.fyp_proj_id LIKE '%$query%' OR 
            fyp_project.proj_title LIKE '%$query%' OR 
            assigned_lecturer_evaluator.stud_id LIKE '%$query%')
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
                $sql_query = "SELECT actual_mark FROM ev_mark_details WHERE result_id = '" . $ev_report->getResultId() . "'";

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

    function getEvaluationReportFromERID($er_id_array)
    {
        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $evaluation_report_array = array();
        $i = 0;

        foreach ($er_id_array as $er_id) {
            $sql_query = "SELECT evaluation_result.result_id, evaluation_result.fyp_proj_id, evaluation_result.assigned_lect_id, fyp_project.proj_title, evaluation_result.submission_level, 
            evaluation_result.evaluation_feedback, assigned_lecturer_evaluator.lect_id, fyp_project.proj_fyp_stage, fyp_project.stud_id, evaluation_result.evaluation_date
            FROM evaluation_result INNER JOIN assigned_lecturer_evaluator 
            ON assigned_lecturer_evaluator.assigned_lect_id = evaluation_result.assigned_lect_id 
            INNER JOIN fyp_project 
            ON evaluation_result.fyp_proj_id = fyp_project.fyp_proj_id
            WHERE evaluation_result.result_id = '$er_id'";

            //Run SQL Query
            $result = $connection->query($sql_query);

            if ($result->num_rows == 0) {
                //Do nothing
            } else {

                while ($row = $result->fetch_assoc()) {
                    $ev_report = new EvaluationReport();

                    $ev_report->setResultId($row['result_id']);
                    $ev_report->setProjID($row['fyp_proj_id']);
                    $ev_report->setFypStage($row['proj_fyp_stage']);
                    $ev_report->setSubmission($row['submission_level']);
                    $ev_report->setProjTitle($row['proj_title']);
                    $ev_report->setEvaluationDate($row['evaluation_date']);
                    $ev_report->setStudID($row['stud_id']);
                    $ev_report->setEvaluationFeeaback($row['evaluation_feedback']);

                    //Add to array
                    $evaluation_report_array[$i] = $ev_report;
                    $i++;
                }
            }
        }
        //Close connection
        $connection->close();

        return $evaluation_report_array;
    }

    function getAssignedLectId($lect_id)
    {

        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT * FROM assigned_lecturer_evaluator WHERE lect_id = '$lect_id'";

        //Run SQL Query
        $result = $connection->query($sql_query);

        if ($result->num_rows == 0) {
            return null;
        } else {
            $row = $result->fetch_assoc();
            return $row['assigned_lect_id'];
        }
    }

    function insertEvaluationResult($ev_result, $ev_id, $stud_id)
    {
        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT * FROM evaluation_result " .
            "ORDER BY `result_id` DESC";

        //Run SQL Query
        $result = $connection->query($sql_query);

        $new_result_id = null;

        if ($result->num_rows == 0) {
            //If no result in the database set ID from ER001
            $new_result_id = "ER001";
        } else {
            //If there is id in it check the last id in the record and increment it by one
            $row = $result->fetch_assoc();
            $last_id = $row['result_id'];

            //check last id number
            $result_num = preg_replace('/[^0-9]/', '', $last_id);

            $new_result_num = (int)($result_num) + 1;
            $new_result_id = "ER" . sprintf("%03d", $new_result_num);
        }

        $sql_query = "INSERT INTO evaluation_result 
        VALUES ('" . $new_result_id . "', '" . $ev_result->getProjID() . "', '" . $ev_id . "', 
        'NULL', '" . $ev_result->getSubmission() . "', '" . $ev_result->getProjectFeedback() . "', 
        '" . $ev_result->getEvaluationDate() . "')";

        if ($connection->query($sql_query) === TRUE) {
            $ev_mark_arrray = $ev_result->getEvMarkDetails();
            echo "Data inserted <br>";

            foreach ($ev_mark_arrray as $ev_mark) {
                $sql_query = "INSERT INTO ev_mark_details
                VALUES ('0', '$new_result_id','" . $ev_mark->getEvaluationRubricId() . "', '" . $ev_mark->getActualMark() . "')";
                if ($connection->query($sql_query) === TRUE) {
                    echo $ev_mark->getEvaluationRubricId() . " mark inserted<br>";
                } else {
                    echo $ev_mark->getEvaluationRubricId() . " insert failed";
                }
            }
        } else {
            echo "Error: " . $sql_query . "<br>" . $connection->error;
        }

        $connection->close();
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

        $connection->close();
    }

    function getEvaluationMarkDetails($er_id)
    {
        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT * FROM ev_mark_details WHERE result_id = '$er_id'";

        //Run SQL Query
        $result = $connection->query($sql_query);

        $ev_mark_array = array();
        if ($result->num_rows == 0) {
            //Do nothing
        } else {
            $i = 0;

            while ($row = $result->fetch_assoc()) {
                $ev_mark_det = new EvaluationMarkDetails();
                $ev_mark_det->setEvMarkId($row['ev_mark_id']);
                $ev_mark_det->setEvaluationRubricId($row['evaluation_rubric_id']);
                $ev_mark_det->setActualMark($row['actual_mark']);

                //Add to array
                $ev_mark_array[$i] = $ev_mark_det;
                $i++;
            }

            return $ev_mark_array;
        }
    }
}
