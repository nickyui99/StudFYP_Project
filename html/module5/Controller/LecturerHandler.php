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

function viewAssignedFyp($query, $lect_id)
{
    $lds = new LecturerDataService();
    $output = $lds->getAssignedEvaluation($query, $lect_id);
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
    foreach($project_log_array as $project_log){
        $output = $output . 
            "<tr>" . 
                "<td>". $project_log->getDate() ."</td>" . 
                "<td>". $project_log->getActivity() ."</td>" . 
            "</tr>";
    }
    echo $output;
}

function getEvaluationRubric($submission, $fyp_level){
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
        for($i=0; $i<=$ev_rubric_model->getRubricMark(); $i++){
            $dropdownMark = $dropdownMark . '<option value="'. $i .'">'.$i.'</option>';
        }

        $output = $output .
            "<tr>" .
            '<td class="small">' . $ev_rubric_model->getRubricNum() . "</td>" .
            '<td class="small">' . $ev_rubric_model->getRubricTitle() . "</td>" .
            '<td class="small" >' . $ev_rubric_model->getRubricDetails() . "</td>" .
            '<td id="w_' . $ev_rubric_model->getRubricId() . '">' . $ev_rubric_model->getRubricWeightage() . "</td>" .
            '<td> <select name="mark" class="form-select" id="'.$ev_rubric_model->getRubricId().'" onChange="calcActualMark(this);">' . $dropdownMark .'</select> </td>'.
            '<td id="am_' .$ev_rubric_model->getRubricId(). '"> 0.00 </td>'.
            "</tr>";
    }

    echo $output;
}

function printEvaluationReport($query, $lect_id){
    $lds = new LecturerDataService();
    $ev_report_array = $lds->getEvaluationReport($query, $lect_id);

    $output = "";
    foreach($ev_report_array as $ev_report){
        $output = $output . 
        '<tr>'.
            '<td><input type="checkbox" class="form-check-input" value="'. $ev_report->getResultID() .'" id="cb_' . $ev_report->getResultID() . '"></td>'.
            '<td>' . $ev_report->getProjID() . '</td>'.
            '<td>' . $ev_report->getStudID() . '</td>'.
            '<td>' . $ev_report->getProjTitle() . '</td>'.
            '<td>' . $ev_report->getSubmission() . '</td>'.
            '<td>' . $ev_report->getSubmission() . '</td>'.
            '<td>' . $ev_report->getMark() . '</td>'.
            '<td>' . $ev_report->getEvaluationDate() . '</td>'.
        '</tr>';
    }

    echo $output;
}

function getEvaluationReport($lect_id){
    $lds = new LecturerDataService();
    $ev_report_array = $lds->getEvaluationReport("", $lect_id);
    return $ev_report_array;
}


