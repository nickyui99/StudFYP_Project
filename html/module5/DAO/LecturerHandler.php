<?php

require_once 'LecturerDataService.php';
require_once '../ClassModel/EvaluateFypModel.php';

if (isset($_POST['search_assigned_evaluation']) && isset($_POST['lecturer_id'])) {
    viewAssignedFyp($_POST['search_assigned_evaluation'], $_POST['lecturer_id']);
}



function downloadProjQr($proj_id){
    $lds = new LecturerDataService();
    $lds->getProjectQr($proj_id);
}

function viewAssignedFyp($query, $lect_id){
    $lds = new LecturerDataService();
    $output = $lds->getAssignedEvaluation($query, $lect_id);
    echo $output;
}

function getEvaluationDetail($proj_id, $stud_id, $submission){

    $lds = new LecturerDataService();
    $evaluateFypModel = new EvaluateFyp();
    $evaluateFypModel = $lds->getEvaluationDetails($proj_id, $stud_id, $submission);
    return $evaluateFypModel;
}