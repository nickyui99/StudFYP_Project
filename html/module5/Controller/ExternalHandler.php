<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/html/module5/DAO/ExternalDataService.php';

if (isset($_POST['search_assigned_evaluation']) && isset($_POST['ip_id'])) {
    viewAssignedFyp($_POST['search_assigned_evaluation'], $_POST['ip_id']);
}

function viewAssignedFyp($query, $ip_id)
{
    $eds = new ExternalDataService();
    $assigned_ev_array = $eds->getAssignedEvaluation($query, $ip_id);

    //Set output
    $output = "";

    if (count($assigned_ev_array) == 0) {
        //Do nothing
    } else {
        foreach ($assigned_ev_array as $assigned_ev) {
            $output = $output . '<tr>' .
                '<td>' . $assigned_ev->getProjectID() . '</td>' .
                '<td>' . $assigned_ev->getStudentID() . '</td>' .
                '<td>' . $assigned_ev->getStudentName() . '</td>' .
                '<td>' . $assigned_ev->getFypLevel() . '</td>' .
                '<td>' . $assigned_ev->getFypProgress() . '</td>' .
                '<td>';

            $evaluation_status = $assigned_ev->getEvaluationStatus();
            for ($i = 1; $i <= 3; $i++) {
                if ($evaluation_status[$i] == true) {
                    $output = $output . ' <a href="evaluate_fyp.php?projID=' . $assigned_ev->getProjectID() . '&studID=' . $assigned_ev->getStudentID() . '&submission=' . $i . '" class="btn btn-success btn-sm disabled" role="button" aria-disabled="true">' . $i . '</a>';
                } else {
                    $output = $output . ' <a href="evaluate_fyp.php?projID=' . $assigned_ev->getProjectID() . '&studID=' . $assigned_ev->getStudentID() . '&submission=' . $i . '" class="btn btn-light btn-outline-dark btn-sm" role="button" aria-disabled="true">' . $i . '</a>';
                }
            }
            $output = $output . '</td></tr>';
        }
    }

    echo $output;
}