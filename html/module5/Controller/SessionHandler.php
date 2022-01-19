<?php
require_once 'LecturerHandler.php';

session_start();

if (isset($_POST['update_er'])) {

    //Unset previous session data
    if(isset($_SESSION['update_er_array'])){
        unset($_SESSION['update_er_array']);
    }
    if(isset($_SESSION['er_report_array'])){
        unset($_SESSION['er_report_array']);
    }
    
    $_SESSION['update_er_array'] = $_POST['update_er'];
    $_SESSION['is_updated'] = false;
}

if (isset($_POST['m_result_id']) && 
    isset($_POST['m_rubric_id_array']) && 
    isset($_POST['m_rubric_mark_array']) && 
    isset($_POST['m_feedback']) && 
    isset($_SESSION['update_er_array'])) 
    {
    $er_id_update = $_POST['m_result_id'];
    $rubric_id_array = $_POST['m_rubric_id_array'];
    $rubric_mark_array = $_POST['m_rubric_mark_array'];
    $feedback = $_POST['m_feedback'];

    $er_report_array = array();

    if(isset($_SESSION['er_report_array'])){
        $er_report_array = $_SESSION['er_report_array'];
    }else{
        $er_report_array = getUpdateEvaluationReportList($_SESSION['update_er_array']);
    }

    foreach ($er_report_array as $er_report){
        if($er_report->getResultId() == $er_id_update){
            $er_report->setEvaluationFeedback($feedback);

            $i = 0; 
            foreach ($er_report->getMark() as $ev_mark) {
                $ev_mark->setActualMark($rubric_mark_array[$i]);
                $i++;
            }
        }
    }

    $_SESSION['er_report_array'] = $er_report_array;
}
