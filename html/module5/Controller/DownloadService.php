<?php

/**
 * Name: Nicholas Ooi Zhee Chen
 * Matric Id: CB19080
 */

session_start();
if (isset($_SESSION['lect_id'])) {
    require_once '../DAO/LecturerDataService.php';

    if (isset($_GET['projQr'])) {
        $lds = new LecturerDataService();
        $lds->getProjectQr($_GET['projQr']);
        exit();
    }

    if (isset($_GET['projDoc']) && isset($_GET['submission'])) {
        $lds = new LecturerDataService();
        $lds->getProjectDoc($_GET['projDoc'], $_GET['submission']);
        exit();
    }
}


if (isset($_SESSION['ip_id'])) {
    require_once '../DAO/ExternalDataService.php';

    if (isset($_GET['projQr'])) {
        $eds = new ExternalDataService();
        $eds->getProjectQr($_GET['projQr']);
        exit();
    }

    if (isset($_GET['projDoc']) && isset($_GET['submission'])) {
        $eds = new ExternalDataService();
        $eds->getProjectDoc($_GET['projDoc'], $_GET['submission']);
        exit();
    }
}
