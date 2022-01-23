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
                '<td> 
                    <a href="evaluate_fyp.php?projID=' . $assigned_ev->getProjectID() . '&studID=' . $assigned_ev->getStudentID() . '&submission=3" class="btn btn-light btn-outline-dark btn-sm" role="button" aria-disabled="true">Evaluate</a>
                </td></tr>';
        }
    }

    echo $output;
}

function getEvaluationDetail($proj_id, $stud_id, $submission)
{

    $eds = new ExternalDataService();
    $evaluateFypModel = new EvaluateFyp();
    $evaluateFypModel = $eds->getEvaluationDetails($proj_id, $stud_id, $submission);
    return $evaluateFypModel;
}

function getEvaluationRubric($submission, $fyp_level)
{
    $eds = new ExternalDataService();
    $evaluation_rubric_array = $eds->getEvaluationRubric($submission, $fyp_level);
    return $evaluation_rubric_array;
}

function printProjLogbook($proj_id, $submission)
{
    $eds = new ExternalDataService();
    $project_log_array = $eds->getProjectLog($proj_id, $submission);
    $output = "";
    if (count($project_log_array) == 0) {
        $output = "<tr><td>No records</td><td>No records</td></tr>";
    } else {
        foreach ($project_log_array as $project_log) {
            $output = $output .
                "<tr>" .
                "<td>" . $project_log->getDate() . "</td>" .
                "<td>" . $project_log->getActivity() . "</td>" .
                "</tr>";
        }
    }

    echo $output;
}

function printEvaluationRubric($submission, $fyp_level)
{
    $eds = new ExternalDataService();
    $evaluation_rubric_array = $eds->getEvaluationRubric($submission, $fyp_level);

    $output = "";
    foreach ($evaluation_rubric_array as $ev_rubric_model) {
        $dropdownMark = "";
        for ($i = 0; $i <= $ev_rubric_model->getRubricMark(); $i++) {
            $dropdownMark = $dropdownMark . '<option value="' . $i . '">' . $i . '</option>';
        }

        $output = $output .
            "<tr>" .
            '<td class="small">' . $ev_rubric_model->getRubricNum() . "</td>" .
            '<td class="small">' . $ev_rubric_model->getRubricTitle() . "</td>" .
            '<td class="small" >' . $ev_rubric_model->getRubricDetails() . "</td>" .
            '<td id="w_' . $ev_rubric_model->getRubricId() . '">' . $ev_rubric_model->getRubricWeightage() . "</td>" .
            '<td> <select name="mark" class="form-select" id="' . $ev_rubric_model->getRubricId() . '" onChange="calcActualMark(this);">' . $dropdownMark . '</select> </td>' .
            '<td><input type="text" readonly class="form-control" id="am_' . $ev_rubric_model->getRubricId() . '" name="am_' . $ev_rubric_model->getRubricId() . '" value="0.00"></td>' .
            "</tr>";
    }

    echo $output;
}


function submitEvaluationForm($ev_result, $assigned_id, $stud_id)
{
    $eds = new ExternalDataService();
    //Insert evaluation result data
    $status = $eds->insertEvaluationResult($ev_result, $assigned_id, $stud_id);
    return $status;
}
