<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/StudFYP_Project/html/model/ActivityDataService.php";

function getAllActivity(){

    $ads = new ActivityDataService();

    $activity_array = $ads->getActivity();

    $output = "";

    foreach($activity_array as $activity){
        $output = $output . 
            "{
                title: '" . $activity->getActivityName() . "',  
                start: '" . $activity->getActivityStartDate() . "' , 
                end: '" . $activity->getActivityEndDate() . "'
            },";
    }

    echo $output;

}