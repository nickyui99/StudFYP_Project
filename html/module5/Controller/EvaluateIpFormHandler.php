<?php

/**
 * Name: Nicholas Ooi Zhee Chen
 * Matric Id: CB19080
 */

require_once  $_SERVER['DOCUMENT_ROOT'] . '/html/module5/DAO/ExternalDataService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/html/module5/ClassModel/EvaluationResultModel.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/html/module5/ClassModel/EvaluationMarkDetailsModel.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/html/module5/Controller/ExternalHandler.php';

session_start();

if (isset($_SESSION['ip_id'])) {

    if (isset($_POST['inputProjId']) && isset($_POST['inputStudId']) && isset($_POST['inputFypStage']) && isset($_POST['inputProjTitle']) && isset($_POST['total_mark']) && isset($_POST['submission']) && isset($_POST['inputProjFeedback'])) {
        $eds = new ExternalDataService();

        //Get assigned lecturer id
        $assigned_id = $eds->getAssignedIpId($_SESSION['ip_id']);

        //Get rubric array
        $ev_rubric_array = $eds->getIpEvaluationRubric($_POST['submission'], $_POST['inputFypStage']);

        //Set marks into object
        $i = 0;
        $ev_mark_array = array();
        foreach ($ev_rubric_array as $ev_rubric) {
            $ev_mark = new EvaluationMarkDetails();
            $ev_mark->setEvaluationRubricId($ev_rubric->getRubricId());
            $ev_mark->setActualMark($_POST['am_' . $ev_rubric->getRubricId()]);
            echo $ev_mark->getEvaluationRubricId();
            echo $ev_mark->getActualMark();
            $ev_mark_array[$i] = $ev_mark;
            $i++;
        }

        $ev_result = new EvaluationResult();
        $ev_result->setProjID($_POST['inputProjId']);
        $ev_result->setSubmission($_POST['submission']);
        $ev_result->setProjectFeedback($_POST['inputProjFeedback']);
        $ev_result->setEvaluationDate(date("Y-m-d"));
        $ev_result->setEvMarkDetails($ev_mark_array);

        echo $ev_result->getProjID() . $assigned_id . $_POST['inputStudId'];
        $status = submitIpEvaluationForm($ev_result, $assigned_id, $_POST['inputStudId']);
        echo $status;
        if ($status == true) {
            header("Location: ../external/view_assigned_fyp.php");
        } else {
            echo "ERROR INSERTING EVALUATION";
        }
    }
    else if (isset($_SESSION['er_report_array']) && isset($_SESSION['is_updated'])) {
        $ev_report_array = $_SESSION['er_report_array'];

        if ($_SESSION['is_updated'] == false) {
            $status = updateEvaluationResult($ev_report_array);
        } else {
            //Invalid update submission because is_updated is true
            unset($_SESSION['is_updated']);
            unset($_SESSION['er_report_array']);
        }
    }
}
