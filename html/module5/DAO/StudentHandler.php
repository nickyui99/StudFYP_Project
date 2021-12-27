<?php
require_once 'StudentDataService.php';

if(isset($_POST['search_evaluator'])) {
    $sds = new StudentDataService();
    $lecturer_evaluator = $sds->getLectEvaluator($_POST['search_evaluator']);
    $industrial_evaluator = $sds->getIndustrialEvaluator($_POST['search_evaluator']);
    $result = $lecturer_evaluator . $industrial_evaluator;
    echo $result;
}
?>