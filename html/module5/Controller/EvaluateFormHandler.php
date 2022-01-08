<?php
require_once '../DAO/LecturerDataService.php';
require_once '../ClassModel/EvaluationResultModel.php';
session_start();

if (isset($_POST['inputProjId']) && isset($_POST['inputStudId']) && isset($_POST['inputFypStage']) && isset($_POST['inputProjTitle']) && isset($_POST['total_mark']) && isset($_POST['submission']) && isset($_POST['inputProjFeedback'])) {
    $lds = new LecturerDataService();
    $ev_result = new EvaluationResult();
    $ev_result->setProjID($_POST['inputProjId']);
    $ev_result->setSubmission($_POST['submission']);
    $ev_result->setEvaluationMark($_POST['total_mark']);
    $ev_result->setProjectFeedback($_POST['inputProjFeedback']);
    $ev_result->setEvaluationDate(date("Y-m-d"));
    $assigned_id = $lds->getAssignedLectId($_SESSION['lect_id']);
    $lds->insertEvaluationResult($ev_result, $assigned_id);
} else {
    echo "error";
}

exit();
