<?php
require_once 'StudentDataService.php';

if(isset($_POST['search'])) {
    $sds = new StudentDataService();
    $lecturer_evaluator = $sds->getLectEvaluator($_POST['search']);
    $industrial_evaluator = $sds->getIndustrialEvaluator($_POST['search']);
    $result = $lecturer_evaluator . $industrial_evaluator;
    echo $result;
}
?>