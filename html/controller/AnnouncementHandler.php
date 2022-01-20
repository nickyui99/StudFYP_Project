<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/StudFYP_Project/html/model/AnouncementDataService.php';

function printAnnouncementBoardList()
{
    $ads = new AnnouncementDataService();
    $announcement_array = $ads->getAllAnnouncement();

    $output = "";
    foreach ($announcement_array as $announcement) {
        $output = $output .
            '<li class="list-group-item list-group-item-warning d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">' . $announcement->getAnnouncementTitle() . '</div>
                    ' . $announcement->getAnnouncementDescription() . '
                </div>
            </li>';
    }

    echo $output;
}

function printNotificationList()
{
    
    $ads = new AnnouncementDataService();

    //Get announcement from the database
    $announcement_array = $ads->getAllAnnouncement();

    //Initialize data
    $output = "";
    $notification_counter = 0;

    foreach ($announcement_array as $announcement) {
        //Set notification limit to 5
        if ($notification_counter == 5) {
            break;
        } else {
            $output = $output .
                '<li class="dropdown-item">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">' . $announcement->getAnnouncementTitle() . '</div>
                    ' . $announcement->getAnnouncementDescription() . '
                </div>
            </li>';
        }

        $notification_counter++;
    }

    echo $output;
}
