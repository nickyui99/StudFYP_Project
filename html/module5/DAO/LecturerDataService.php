<?php
require_once 'Database.php';

class LecturerDataService{
    
    function getAssignedEvaluation($query, $id){

        $db = new Database();

        //Create connection
        $connection = $db->getConnection();

        $sql_query = "SELECT * FROM assigned_lecturer_evaluator " . 
            "INNER JOIN fyp_project " . 
            "ON assigned_lecturer_evaluator.stud_id = fyp_project.stud_id " . 
            "WHERE assigned_lecturer_evaluator.lect_id = '". $id ."' AND " . 
            "fyp_project.stud_id LIKE '%". $query ."%'";

        //Run SQL Query
        $result = $connection->query($sql_query);

        if ($result->num_rows == 0) {
            return null;
        } else {
            $i = 0;
            $assigned_ev_array = array();
            while ($row = $result->fetch_assoc()) {

                //Retrieve data
                
                
            }
        }
    }
}