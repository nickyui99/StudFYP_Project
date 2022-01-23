<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/html/module5/DAO/ExternalDataService.php';

if (isset($_POST['search_assigned_evaluation']) && isset($_POST['ip_id'])) {
    viewAssignedFyp($_POST['search_assigned_evaluation'], $_POST['ip_id']);
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
                '<td> 
                    <a href="evaluate_fyp.php?projID=' . $assigned_ev->getProjectID() . '&studID=' . $assigned_ev->getStudentID() . '&submission=3" class="btn btn-light btn-outline-dark btn-sm" role="button" aria-disabled="true">Evaluate</a>
                </td></tr>';
        }
    }

    echo $output;
}

function getEvaluationDetail($proj_id, $stud_id, $submission)
{

    $lds = new ExternalDataService();
    $evaluateFypModel = new EvaluateFyp();
    $evaluateFypModel = $lds->getEvaluationDetails($proj_id, $stud_id, $submission);
    return $evaluateFypModel;
}

function getEvaluationRubric($submission, $fyp_level)
{
    $lds = new ExternalDataService();
    $evaluation_rubric_array = $lds->getEvaluationRubric($submission, $fyp_level);
    return $evaluation_rubric_array;
}
