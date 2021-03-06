
<?php

require_once "Database.php";
require_once "ActivityModel.php";

class ActivityDataService
{

    function getActivity()
    {

        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT * FROM activity";

        //Run SQL Query
        $result = $connection->query($sql_query);

        //Initialize array
        $activity_array = array();

        if ($result->num_rows == 0) {
            //Do nothing
        } else {
            while ($row = $result->fetch_assoc()) {
                $activity = new Activity();
                $activity->setActivityId($row['activity_id']);
                $activity->setActivityName($row['activity_name']);
                $activity->setActivitySubmission($row['activity_sub_type']);
                $activity->setActivityFyp($row['activity_fyp_level']);
                $activity->setActivityStartDate($row['activity_start_date']);
                $activity->setActivityEndDate($row['activity_close_date']);

                array_push($activity_array, $activity);
            }
        }

        //Close connection
        $connection->close();

        return $activity_array;
    }

    function updateActivityDate($activity)
    {
        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "UPDATE activity 
            SET activity_start_date = '" . $activity->getActivityStartDate() . "',
            activity_close_date = '" . $activity->getActivityEndDate() . "'
            WHERE activity_sub_type = '" . $activity->getActivitySubmission() ."' AND 
            activity_fyp_level = '" . $activity->getActivityFyp() ."'";
        
        echo $sql_query;

        if ($connection->query($sql_query) == true) {
            echo "</br>Submission date updated successfully";
        } else {
            echo "</br>Error updating submission date: " . $connection->error;
        }

        //Close connection
        $connection->close();
    }
}
