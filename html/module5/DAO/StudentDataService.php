<?php
require_once 'Database.php';
require_once '../Model/LecturerEvaluatorModel.php';
require_once '../Model/IndustrialEvaluatorModel.php';

class StudentDataService
{
    function getLectEvaluator($search)
    {
        $db = new Database();

        $connection = $db->getConnection();

        $sql_query = "SELECT assigned_lecturer_evaluator.assigned_lect_id, assigned_lecturer_evaluator.lect_id, assigned_lecturer_evaluator.evaluator_name, lecturer.lect_contact_num, lecturer.lect_email " .
            "FROM assigned_lecturer_evaluator " . 
            "INNER JOIN lecturer ON assigned_lecturer_evaluator.lect_id = lecturer.lect_id ".
            "WHERE assigned_lect_id LIKE '%". $search ."%' OR ". 
            "evaluator_name LIKE '%". $search ."%'";

        $result = $connection->query($sql_query);

        if ($result->num_rows == 0) {
            return null;
        } else {
            $i = 0;
            $lect_evaluator_array = array();
            while ($row = $result->fetch_assoc()) {

                $lecturer_evaluator = new LecturerEvaluator();
                $lecturer_evaluator->setEvaluatorID($row['assigned_lect_id']);
                $lecturer_evaluator->setLecturerID($row['lect_id']);
                $lecturer_evaluator->setEvaluatorName($row['evaluator_name']);
                $lecturer_evaluator->setContactNum($row['lect_contact_num']);
                $lecturer_evaluator->setEmail($row['lect_email']);
                //Add to array
                $lect_evaluator_array[$i] = $lecturer_evaluator;
                $i++;
            }

            $connection->close();

            $output = "";
            foreach ($lect_evaluator_array as $evaluator) {
                $output = $output . "<tr><td>" . $evaluator->getEvaluatorID() . 
                "</td><td>Lecturer</td><td>" . $evaluator->getEvaluatorName() . 
                "</td><td>" . $evaluator->getContactNum() . 
                "</td><td>" . $evaluator->getEmail() . 
                "</td><td> - </td></tr>";
            }
            return $output;
        }
    }


    function getIndustrialEvaluator($search)
    {
        $db = new Database();

        $sql_query = "SELECT * FROM assigned_industrial_evaluator " . 
            "INNER JOIN industrial_panel ON assigned_industrial_evaluator.ip_id = industrial_panel.ip_id " . 
            "WHERE assigned_ip_id LIKE '%" . $search . "%' OR ".
            "evaluator_name LIKE '%" . $search . "%'";

        $connection = $db->getConnection();

        $result = $connection->query($sql_query);

        if ($result->num_rows == 0) {
            return null;
        } else {
            $i = 0;
            $industrial_evaluator_array = array();
            while ($row = $result->fetch_assoc()) {

                $industrial_evaluator = new IndustrialEvaluator();
                $industrial_evaluator->setEvaluatorID($row['assigned_ip_id']);
                $industrial_evaluator->setIPID($row['ip_id']);
                $industrial_evaluator->setEvaluatorName($row['evaluator_name']);
                $industrial_evaluator->setContactNum($row['ip_contact_num']);
                $industrial_evaluator->setEmail($row['ip_email']);
                $industrial_evaluator->setCompany($row['ip_company']);

                //Add to array
                $industrial_evaluator_array[$i] = $industrial_evaluator;
                $i++;
            }

            $connection->close();
            $output = "";
            foreach ($industrial_evaluator_array as $evaluator) {
                $output = $output . "<tr><td>" . $evaluator->getEvaluatorID() . 
                "</td><td>Industrial Panel</td><td>" . 
                $evaluator->getEvaluatorName() . 
                "</td><td>" . $evaluator->getContactNum() . 
                "</td><td>" . $evaluator->getEmail() . 
                "</td><td>" . $evaluator->getCompany() . 
                "</td></tr>";
            }

            return $output;
        }
    }
}
