<?php
require_once 'StudentDataService.php';

if(isset($_POST['search'])) {
    $sds = new StudentDataService();
    $result = $sds->getLectEvaluator($_POST['search']);
    echo $result;
}
?>