<?php
require_once 'StudentDataService.php';

if(isset($_POST['search_evaluator'])) {
    $sds = new StudentDataService();
    $lecturer_evaluator = $sds->getLectEvaluator($_POST['search_evaluator']);
    $industrial_evaluator = $sds->getIndustrialEvaluator($_POST['search_evaluator']);
    $result = $lecturer_evaluator . $industrial_evaluator;
    echo $result;
}

function displayFyp1Result($student_id){
    $student_id = "CA18016";
    $sds = new StudentDataService();
    $output = $sds->getFyp1Result("CA18016");
    echo $output;
}

function displayFyp2Result($student_id){
    $student_id = "CA18016";
    $sds = new StudentDataService();
    $output = $sds->getFyp2Result("CA18016");
    echo $output;
}

?>