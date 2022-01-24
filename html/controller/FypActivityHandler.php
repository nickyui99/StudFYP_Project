<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/html/model/ActivityDataService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/html/model/ActivityModel.php";

if(isset($_POST['fyp_level']) && isset($_POST['submission']) && isset($_POST['start_date']) && isset($_POST['end_date'])){

    $activity = new Activity();
    $activity->setActivityFyp($_POST['fyp_level']);
    $activity->setActivitySubmission($_POST['submission']);
    $activity->setActivityStartDate($_POST['start_date']);
    $activity->setActivityEndDate($_POST['end_date']);

    updateActivity($activity);
}

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

function updateActivity($activity){
    $ads = new ActivityDataService();
    $ads->updateActivityDate($activity);
    
}