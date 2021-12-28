<?php

require_once 'LecturerDataService.php';

if(isset($_POST['search_assigned_evaluation']) && isset($_POST['lecturer_id'])) {
    $lds = new LecturerDataService();
    $output = $lds->getAssignedEvaluation($_POST['search_assigned_evaluation'], $_POST['lecturer_id']);
    echo $output;
}