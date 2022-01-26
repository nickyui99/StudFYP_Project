<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/html/module5/DAO/StudentDataService.php';

if (isset($_POST['search_evaluator']) && isset($_POST['stud_id'])) {
    $sds = new StudentDataService();
    $lecturer_evaluator = $sds->getLectEvaluator($_POST['search_evaluator'], $_POST['stud_id']);
    $industrial_evaluator = $sds->getIndustrialEvaluator($_POST['search_evaluator'], $_POST['stud_id']);
    $result = $lecturer_evaluator . $industrial_evaluator;
    echo $result;
}

function displayFyp1Result($student_id)
{
    $sds = new StudentDataService();
    $evaluationResultArray = $sds->getFyp1Result($student_id);
    printResultTable($evaluationResultArray);
}

function displayFyp2Result($student_id)
{
    $sds = new StudentDataService();
    $evaluationResultArray = $sds->getFyp2Result($student_id);
    printResultTable($evaluationResultArray);
}

function printResultTable($evaluationResultArray)
{
    $output = "";
    if ($evaluationResultArray == null) {
        //Print three empty rows
        for ($i = 1; $i <= 3; $i++) {
            $output = $output .
                '<tr> 
                    <td>' . $i . '</td>  
                    <td> - </td> 
                    <td> - </td> 
                    <td> - </td> 
                    <td  style="text-align: right;"> - </td> 
                </tr>';
        }
        //Print total mark rows
        $output = $output . '<tr><td style="text-align: right; font-weight: bold; padding: 10px;" colspan="4">Total: </td> <td style="text-align: right;"> 0 </td></tr>';
    } else {

        //Initialize data
        $total_mark = 0;
        $submission_counter = 1;

        for ($i = 0; $i < count($evaluationResultArray); $i++) {
            //Evaluation mark array
            $ev_mark_array = $evaluationResultArray[$i]->getEvMarkDetails();
            $sub_total_mark = 0;

            //Calculate the subtotal of actual mark for each submission
            foreach ($ev_mark_array as $ev_mark_details) {
                $sub_total_mark += $ev_mark_details->getActualMark();
            }

            //If the current array evaluation result larger than submission counter,
            //Print one empty row before the current array row
            while ($evaluationResultArray[$i]->getSubmission() > $submission_counter) {
                $output = $output .
                    '<tr> 
                    <td>' . $submission_counter . '</td>  
                    <td> - </td> 
                    <td> - </td> 
                    <td> - </td> 
                    <td  style="text-align: right;"> - </td> 
                </tr>';
                //Submission counter increment by 1
                $submission_counter += 1;
            }

            $output = $output .
                "<tr>" .
                "<td>" . $evaluationResultArray[$i]->getSubmission() . "</td>" .
                "<td>" . $evaluationResultArray[$i]->getEvaluatorID() . "</td>" .
                "<td>" . $evaluationResultArray[$i]->getEvaluatorName() . "</td>" .
                "<td>" . $evaluationResultArray[$i]->getProjectFeedback() . "</td>" .
                '<td style="text-align: right;">' . $sub_total_mark . "</td>" .
                "</tr>";

            $submission_counter++;
            $total_mark += $sub_total_mark;
        }

        //Print empty row after empty submission array
        for ($i = $submission_counter; $i <= 3; $i++) {
            $output = $output .
                '<tr> 
                    <td>' . $i . '</td>  
                    <td> - </td> 
                    <td> - </td> 
                    <td> - </td> 
                    <td  style="text-align: right;"> - </td> 
                </tr>';
        }

        $output = $output . '<tr><td style="text-align: right; font-weight: bold; padding: 10px;" colspan="4">Total: </td> <td style="text-align: right;"> ' . $total_mark . ' </td></tr>';
    }
    echo $output;
}

function getProjectDetails($stud_id)
{
    $sds = new StudentDataService();
    $projectDetails = $sds->getFypProjectDetails($stud_id);
    return $projectDetails;
}
