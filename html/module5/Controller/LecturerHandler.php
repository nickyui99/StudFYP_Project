<?php

require_once '../DAO/LecturerDataService.php';
require_once '../ClassModel/EvaluateFypModel.php';
require_once '../ClassModel/ProjectlogbookModel.php';

if (isset($_POST['search_assigned_evaluation']) && isset($_POST['lecturer_id'])) {
    viewAssignedFyp($_POST['search_assigned_evaluation'], $_POST['lecturer_id']);
}

if (isset($_POST['search_evaluation_report']) && isset($_POST['lecturer_id'])) {
    printEvaluationReport($_POST['search_evaluation_report'], $_POST['lecturer_id']);
}

if (isset($_POST['delete_er'])) {
    deleteEvaluationReport($_POST['delete_er']);
}

function viewAssignedFyp($query, $lect_id)
{
    $lds = new LecturerDataService();
    $assigned_ev_array = $lds->getAssignedEvaluation($query, $lect_id);
    //Set output
    $output = "";
    foreach ($assigned_ev_array as $assigned_ev) {
        $output = $output . '<tr>' .
        '<td>' . $assigned_ev->getProjectID() . '</td>' .
        '<td>' . $assigned_ev->getStudentID() . '</td>' .
        '<td>' . $assigned_ev->getStudentName() . '</td>' .
        '<td>' . $assigned_ev->getFypLevel() . '</td>' .
        '<td>' . $assigned_ev->getFypProgress() . '</td>' .
            '<td>';

        $evaluation_status = $assigned_ev->getEvaluationStatus();
        for ($i = 1; $i <= 3; $i++) {
            if ($evaluation_status[$i] == true) {
                $output = $output . ' <a href="evaluate_fyp.php?projID=' . $assigned_ev->getProjectID() . '&studID=' . $assigned_ev->getStudentID() . '&submission=' . $i . '" class="btn btn-success btn-sm disabled" role="button" aria-disabled="true">' . $i . '</a>';
            } else {
                $output = $output . ' <a href="evaluate_fyp.php?projID=' . $assigned_ev->getProjectID() . '&studID=' . $assigned_ev->getStudentID() . '&submission=' . $i . '" class="btn btn-light btn-outline-dark btn-sm" role="button" aria-disabled="true">' . $i . '</a>';
            }
        }
        $output = $output . '</td></tr>';
    }
    echo $output;
}

function getEvaluationDetail($proj_id, $stud_id, $submission)
{

    $lds = new LecturerDataService();
    $evaluateFypModel = new EvaluateFyp();
    $evaluateFypModel = $lds->getEvaluationDetails($proj_id, $stud_id, $submission);
    return $evaluateFypModel;
}

function printProjLogbook($proj_id, $submission)
{
    $lds = new LecturerDataService();
    $project_log_array = $lds->getProjectLog($proj_id, $submission);
    $output = "";
    if (count($project_log_array) == 0) {
        $output = "<tr><td>No records</td><td>No records</td></tr>";
    } else {
        foreach ($project_log_array as $project_log) {
            $output = $output .
            "<tr>" .
            "<td>" . $project_log->getDate() . "</td>" .
            "<td>" . $project_log->getActivity() . "</td>" .
            "</tr>";
        }
    }

    echo $output;
}

function getEvaluationRubric($submission, $fyp_level)
{
    $lds = new LecturerDataService();
    $evaluation_rubric_array = $lds->getEvaluationRubric($submission, $fyp_level);
    return $evaluation_rubric_array;
}

function printEvaluationRubric($submission, $fyp_level)
{
    $lds = new LecturerDataService();
    $evaluation_rubric_array = $lds->getEvaluationRubric($submission, $fyp_level);

    $output = "";
    foreach ($evaluation_rubric_array as $ev_rubric_model) {
        $dropdownMark = "";
        for ($i = 0; $i <= $ev_rubric_model->getRubricMark(); $i++) {
            $dropdownMark = $dropdownMark . '<option value="' . $i . '">' . $i . '</option>';
        }

        $output = $output .
        "<tr>" .
        '<td class="small">' . $ev_rubric_model->getRubricNum() . "</td>" .
        '<td class="small">' . $ev_rubric_model->getRubricTitle() . "</td>" .
        '<td class="small" >' . $ev_rubric_model->getRubricDetails() . "</td>" .
        '<td id="w_' . $ev_rubric_model->getRubricId() . '">' . $ev_rubric_model->getRubricWeightage() . "</td>" .
        '<td> <select name="mark" class="form-select" id="' . $ev_rubric_model->getRubricId() . '" onChange="calcActualMark(this);">' . $dropdownMark . '</select> </td>' .
        '<td><input type="text" readonly class="form-control" id="am_' . $ev_rubric_model->getRubricId() . '" name="am_' . $ev_rubric_model->getRubricId() . '" value="0.00"></td>' .
            "</tr>";
    }

    echo $output;
}

function printEvaluationReport($query, $lect_id)
{
    $lds = new LecturerDataService();
    $ev_report_array = $lds->getEvaluationReport($query, $lect_id);

    $output = "";
    foreach ($ev_report_array as $ev_report) {
        $output = $output .
        '<tr>' .
        '<td><input type="checkbox" class="form-check-input" value="' . $ev_report->getResultID() . '" id="cb_' . $ev_report->getResultID() . '"></td>' .
        '<td>' . $ev_report->getResultID() . '</td>' .
        '<td>' . $ev_report->getProjID() . '</td>' .
        '<td>' . $ev_report->getStudID() . '</td>' .
        '<td>' . $ev_report->getProjTitle() . '</td>' .
        '<td>' . $ev_report->getFypStage() . '</td>' .
        '<td>' . $ev_report->getSubmission() . '</td>' .
        '<td>' . number_format($ev_report->getMark(), 2) . '</td>' .
        '<td>' . $ev_report->getEvaluationDate() . '</td>' .
            '</tr>';
    }

    echo $output;
}

function getEvaluationReport($lect_id)
{
    $lds = new LecturerDataService();
    $ev_report_array = $lds->getEvaluationReport("", $lect_id);
    return $ev_report_array;
}

function getEvaluationMarkArray($er_id_array){
    $lds = new LecturerDataService();
    $ev_mark_array = array();
    foreach($er_id_array as $er_id){
        
    }
}

function getUpdateEvaluationReportList($er_id_array)
{
    $lds = new LecturerDataService();
    $ev_report_array = $lds->getEvaluationReportFromERID($er_id_array);
    return $ev_report_array;
}

function deleteEvaluationReport($er_id_array)
{
    $lds = new LecturerDataService();
    foreach ($er_id_array as $er_id) {
        $lds->deleteEvaluationReport($er_id);
    }
}


