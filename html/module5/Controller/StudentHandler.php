<?php
require_once '../DAO/StudentDataService.php';

if(isset($_POST['search_evaluator']) && isset($_POST['stud_id'])) {
    $sds = new StudentDataService();
    $lecturer_evaluator = $sds->getLectEvaluator($_POST['search_evaluator'], $_POST['stud_id']);
    $industrial_evaluator = $sds->getIndustrialEvaluator($_POST['search_evaluator'], $_POST['stud_id']);
    $result = $lecturer_evaluator . $industrial_evaluator;
    echo $result;
}

function displayFyp1Result($student_id){
    $sds = new StudentDataService();
    $evaluationResultArray = $sds->getFyp1Result($student_id);
    $output="";
    if($evaluationResultArray == null){
         for($i=1; $i<=3; $i++){
                $output = $output . '<tr> <td>' . $i . '</td>  <td> - </td> <td> - </td> <td> - </td> <td  style="text-align: right;"> - </td> </tr>';
            }
            $output = $output . '<tr><td style="text-align: right; font-weight: bold; padding: 10px;" colspan="4">Total: </td> <td style="text-align: right;"> 0 </td></tr>';
    }else{
        //Set output
        $counter = 0;
        $total_mark = 0;
        foreach ($evaluationResultArray as $result){
            $output = $output . 
                "<tr>" . 
                "<td>". $result->getSubmission() . "</td>" . 
                "<td>". $result->getEvaluatorID() . "</td>" . 
                "<td>". $result->getEvaluatorName() ."</td>" .
                "<td>". $result->getProjectFeedback() ."</td>" .
                '<td style="text-align: right;">'. $result->getEvaluationMark() ."</td>" .
                "</tr>";
            $counter++;
            $total_mark = $total_mark + $result->getEvaluationMark();
            if($counter<3){
                for($i=$counter+1; $i<=3; $i++){
                    $output = $output . '<tr> <td>' . $i . '</td>  <td> - </td> <td> - </td> <td> - </td> <td style="text-align: right;"> - </td> </tr>';
                }
            }
            $output = $output . '<tr><td style="text-align: right; font-weight: bold; padding: 10px;" colspan="4">Total: </td> <td style="text-align: right;"> '. $total_mark.' </td></tr>';
        }
    }
            
    echo $output;

}

function displayFyp2Result($student_id){
    $sds = new StudentDataService();
    $evaluationResultArray = $sds->getFyp2Result($student_id);
    $output="";
    if($evaluationResultArray == null){
         for($i=1; $i<=3; $i++){
                $output = $output . '<tr> <td>' . $i . '</td>  <td> - </td> <td> - </td> <td> - </td> <td  style="text-align: right;"> - </td> </tr>';
            }
            $output = $output . '<tr><td style="text-align: right; font-weight: bold; padding: 10px;" colspan="4">Total: </td> <td style="text-align: right;"> 0 </td></tr>';
    }else{
        //Set output
        $counter = 0;
        $total_mark = 0;
        foreach ($evaluationResultArray as $result){
            $output = $output . 
                "<tr>" . 
                "<td>". $result->getSubmission() . "</td>" . 
                "<td>". $result->getEvaluatorID() . "</td>" . 
                "<td>". $result->getEvaluatorName() ."</td>" .
                "<td>". $result->getProjectFeedback() ."</td>" .
                '<td style="text-align: right;">'. $result->getEvaluationMark() ."</td>" .
                "</tr>";
            $counter++;
            $total_mark = $total_mark + $result->getEvaluationMark();
            if($counter<3){
                for($i=$counter+1; $i<=3; $i++){
                    $output = $output . '<tr> <td>' . $i . '</td>  <td> - </td> <td> - </td> <td> - </td> <td style="text-align: right;"> - </td> </tr>';
                }
            }
            $output = $output . '<tr><td style="text-align: right; font-weight: bold; padding: 10px;" colspan="4">Total: </td> <td style="text-align: right;"> '. $total_mark.' </td></tr>';
        }
    }

    echo $output;
}

function getProjectDetails($stud_id){
    $sds = new StudentDataService();
    $projectDetails = $sds->getFypProjectDetails($stud_id);
    return $projectDetails;
}
