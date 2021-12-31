<?php
require_once 'Database.php';
require_once '../ClassModel/AssignedEvaluationModel.php';

class LecturerDataService
{

    function getAssignedEvaluation($query, $id)
    {

        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT * FROM assigned_lecturer_evaluator " .
            "INNER JOIN fyp_project " .
            "ON assigned_lecturer_evaluator.stud_id = fyp_project.stud_id " .
            "WHERE assigned_lecturer_evaluator.lect_id = '" . $id . "' AND " .
            "fyp_project.stud_id LIKE '%" . $query . "%'";

        //Run SQL Query
        $result = $connection->query($sql_query);

        if ($result->num_rows == 0) {
            return null;
        } else {
            $i = 0;
            $assigned_ev_array = array();
            while ($row = $result->fetch_assoc()) {

                //Retrieve data
                $assigned_ev = new AssignedEvaluation();
                $assigned_ev->setProjectID($row['fyp_proj_id']);
                $assigned_ev->setStudentID($row['stud_id']);
                $assigned_ev->setStudentName($row['evaluator_name']);
                $assigned_ev->setFypLevel($row['proj_fyp_stage']);
                $assigned_ev->setFypProgress($row['fyp_proj_progress']);
                $assigned_ev->setEvaluation1($row['document_submission_1']);
                $assigned_ev->setEvaluation2($row['document_submission_2']);
                $assigned_ev->setEvaluation3($row['document_submission_3']);

                //Add to array
                $assigned_ev_array[$i] = $assigned_ev;
                $i++;
            }

            //Close connection
            $connection->close();

            //Set output
            $output = "";
            foreach($assigned_ev_array as $assigned_ev){
                $output = '<tr>'.
                    '<td>'. $assigned_ev->getProjectID() . '</td>'.
                    '<td>'.$assigned_ev->getStudentID() .'</td>'.
                    '<td>'.$assigned_ev->getStudentName() .'</td>'.
                    '<td>'.$assigned_ev->getFypLevel() .'</td>'.
                    '<td>'.$assigned_ev->getFypProgress() .'</td>'.
                    '<td><button type="button" class="btn btn-light btn-outline-dark btn-sm">1</button> '.
                        '<button type="button" class="btn btn-light btn-outline-dark btn-sm">2</button>'.
                        ' <button type="button" class="btn btn-light btn-outline-dark btn-sm">3</button></td>'.
                    '</tr>';
            }
            return $output;
        }
    }
}
