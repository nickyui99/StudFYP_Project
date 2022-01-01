<?php

require_once 'LecturerDataService.php';

if (isset($_POST['search_assigned_evaluation']) && isset($_POST['lecturer_id'])) {
    viewAssignedFyp($_POST['search_assigned_evaluation'], $_POST['lecturer_id']);
}

function viewAssignedFyp($query, $lect_id){
    $lds = new LecturerDataService();
    $output = $lds->getAssignedEvaluation($query, $lect_id);
    echo $output;
}