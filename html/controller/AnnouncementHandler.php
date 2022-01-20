<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . '/StudFYP_Project/html/model/AnouncementDataService.php';

function printAnnouncementBoardList(){
    $ads = new AnnouncementDataService();
    $announcement_array = $ads->getAllAnnouncement();

    $output = "";
    foreach($announcement_array as $announcement){
        $output = $output .
            '<li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">' .$announcement->getAnnouncementTitle(). '</div>
                    ' .$announcement->getAnnouncementDescription(). '
                </div>
            </li>';
    }

    echo $output;
}
