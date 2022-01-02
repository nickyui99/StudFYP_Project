<?php
require_once 'LecturerDataService.php';

if(isset($_GET['projID'])){
    $lds = new LecturerDataService();
    $lds->getProjectQr($_GET['projID']);
}
