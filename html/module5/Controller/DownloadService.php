<?php
require_once '../Controller/LecturerDataService.php';

if(isset($_GET['projQr'])){
    $lds = new LecturerDataService();
    $lds->getProjectQr($_GET['projQr']);
}

if(isset($_GET['projDoc']) && isset($_GET['submission'])){
    $lds = new LecturerDataService();
    $lds->getProjectDoc($_GET['projDoc'], $_GET['submission']);
}
