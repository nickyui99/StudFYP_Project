<?php
require_once '../DAO/LecturerDataService.php';
require_once '../ClassModel/EvaluationResultModel.php';
require_once '../ClassModel/EvaluationMarkDetailsModel.php';
require_once 'LecturerHandler.php';

session_start();

if (isset($_POST['inputProjId']) && isset($_POST['inputStudId']) && isset($_POST['inputFypStage']) && isset($_POST['inputProjTitle']) && isset($_POST['total_mark']) && isset($_POST['submission']) && isset($_POST['inputProjFeedback'])) {
    $lds = new LecturerDataService();

    //Get assigned lecturer id
    $assigned_id = $lds->getAssignedLectId($_SESSION['lect_id']);

    $ev_rubric_array = $lds->getEvaluationRubric($_POST['submission'], $_POST['inputFypStage']);

    $i = 0;
    $ev_mark_array = array();
    foreach ($ev_rubric_array as $ev_rubric) {
        $ev_mark = new EvaluationMarkDetails();
        $ev_mark->setEvaluationRubricId($ev_rubric->getRubricId());
        $ev_mark->setActualMark($_POST['am_' . $ev_rubric->getRubricId()]);

        $ev_mark_array[$i] = $ev_mark;
        $i++;
    }

    $ev_result = new EvaluationResult();
    $ev_result->setProjID($_POST['inputProjId']);
    $ev_result->setSubmission($_POST['submission']);
    $ev_result->setProjectFeedback($_POST['inputProjFeedback']);
    $ev_result->setEvaluationDate(date("Y-m-d"));
    $ev_result->setEvMarkDetails($ev_mark_array);

    $status = submitEvaluationForm($ev_result, $assigned_id, $_POST['inputStudId']);
    if($status == true){
        header("Location: ../lecturer/view_assigned_fyp.php");
    }else{
        echo "ERROR INSERTING EVALUATION";
    }
}

if (isset($_SESSION['er_report_array']) && isset($_SESSION['is_updated'])) {
    $ev_report_array = $_SESSION['er_report_array'];

    if ($_SESSION['is_updated'] == false) {

        $status = updateEvaluationResult($ev_report_array);
        
    }else{

        //Invalid update submission because is_updated is true
        unset($_SESSION['is_updated']);
        unset($_SESSION['er_report_array']);
        header("Location: ../lecturer/evaluate_report.php");
    }
}
