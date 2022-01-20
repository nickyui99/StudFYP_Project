<?php

require_once "Database.php";
require_once "AnnouncementModel.php";

class AnnouncementDataService{

    function getAllAnnouncement(){

        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT * FROM announcement ORDER BY announcement_id DESC";

        //Run SQL Query
        $result = $connection->query($sql_query);

        //Initialize array
        $announcement_array = array();

        if ($result->num_rows == 0) {
            //Do nothing
        } else{
            while ($row = $result->fetch_assoc()) {
                $announcement = new Announcement();
                $announcement->setAnnouncementId($row['announcement_id']);
                $announcement->setAnnouncementTitle($row['announcement_title']);
                $announcement->setAnnouncementDescription($row['announcement_description']);

                array_push($announcement_array, $announcement);
            }
        }

        $connection->close();

        return $announcement_array;
    }
}