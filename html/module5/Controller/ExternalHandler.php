<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/html/module5/DAO/ExternalDataService.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/html/module5/ClassModel/EvaluateFypModel.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/html/module5/ClassModel/ProjectLogbookModel.php';

if (isset($_POST['search_assigned_evaluation']) && isset($_POST['ip_id'])) {
    viewAssignedFyp($_POST['search_assigned_evaluation'], $_POST['ip_id']);
}

if (isset($_POST['search_evaluation_report']) && isset($_POST['ip_id'])) {
    printEvaluationReport($_POST['search_evaluation_report'], $_POST['ip_id']);
}

if (isset($_POST['delete_er'])) {
    deleteEvaluationReport($_POST['delete_er']);
}

function viewAssignedFyp($query, $ip_id)
{
    $eds = new ExternalDataService();
    $assigned_ev_array = $eds->getAssignedEvaluation($query, $ip_id);

    //Set output
    $output = "";

    if (count($assigned_ev_array) == 0) {
        //Do nothing
    } else {
        foreach ($assigned_ev_array as $assigned_ev) {
            $output = $output . '<tr>' .
                '<td>' . $assigned_ev->getProjectID() . '</td>' .
                '<td>' . $assigned_ev->getStudentID() . '</td>' .
                '<td>' . $assigned_ev->getStudentName() . '</td>' .
                '<td>' . $assigned_ev->getFypLevel() . '</td>' .
                '<td>' . $assigned_ev->getFypProgress() . '</td>' .
                '<td>';

            //Set disabled button if the evaluation is done, else set a clickable button
            $evaluation_status = $assigned_ev->getEvaluationStatus();
            if ($evaluation_status == true) {
                $output = $output . '<a href="#" class="btn btn-success btn-sm disabled" role="button" aria-disabled="true">Evaluated</a>';
            } else {
                $output = $output . '<a href="evaluate_fyp.php?projID=' . $assigned_ev->getProjectID() . '&studID=' . $assigned_ev->getStudentID() . '&submission=3" class="btn btn-light btn-outline-dark btn-sm" role="button" aria-disabled="true">Evaluate</a>';
            }

            $output = $output . '</td></tr>';
        }
    }

    echo $output;
}

function getEvaluationDetail($proj_id, $stud_id, $submission)
{

    $eds = new ExternalDataService();
    $evaluateFypModel = new EvaluateFyp();
    $evaluateFypModel = $eds->getEvaluationDetails($proj_id, $stud_id, $submission);
    return $evaluateFypModel;
}

function getEvaluationRubric($submission, $fyp_level)
{
    $eds = new ExternalDataService();
    $evaluation_rubric_array = $eds->getIpEvaluationRubric($submission, $fyp_level);
    return $evaluation_rubric_array;
}

function printProjLogbook($proj_id, $submission)
{
    $eds = new ExternalDataService();
    $project_log_array = $eds->getProjectLog($proj_id, $submission);
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

function printEvaluationRubric($submission, $fyp_level)
{
    $eds = new ExternalDataService();
    $evaluation_rubric_array = $eds->getIpEvaluationRubric($submission, $fyp_level);

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


function submitIpEvaluationForm($ev_result, $assigned_id, $stud_id)
{
    $eds = new ExternalDataService();
    $status = $eds->insertIPEvaluationResult($ev_result, $assigned_id, $stud_id);
    return true;
}

function printEvaluationReport($query, $lect_id)
{
    $eds = new ExternalDataService();
    $ev_report_array = $eds->getEvaluationReport($query, $lect_id);

    $output = "";
    if (count($ev_report_array) == 0) {
        //Do nothing
    } else {
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
    }

    echo $output;
}

function getEvaluationReport($ip_id)
{
    $eds = new ExternalDataService();
    $ev_report_array = $eds->getEvaluationReport("", $ip_id);
    return $ev_report_array;
}

function deleteEvaluationReport($er_id_array)
{
    $eds = new ExternalDataService();
    foreach ($er_id_array as $er_id) {
        $eds->deleteEvaluationReport($er_id);
    }
}

function getUpdateEvaluationReportList($er_id_array)
{
    $eds = new ExternalDataService();
    $ev_report_array = $eds->getEvaluationReportFromERID($er_id_array);
    return $ev_report_array;
}

function updateEvaluationResult($ev_report_array)
{
    $eds = new ExternalDataService();

    $status = true;
    echo count($ev_report_array);
    foreach ($ev_report_array as $ev_report) {
        $status = $eds->updateEvaluationResult($ev_report);

        if ($status == true) {
            $status = $eds->updateEvaluationMark($ev_report->getMark());
        }
    }

    return $status;
}
