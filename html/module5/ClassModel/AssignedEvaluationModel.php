<?php

/**
 * Name: Nicholas Ooi Zhee Chen
 * Matric Id: CB19080
 */

class AssignedEvaluation
{
    private $project_id;
    private $student_id;
    private $student_name;
    private $fyp_level;
    private $fyp_progress;
    private $evaluation_1;
    private $evaluation_2;
    private $evaluation_3;
    private $evaluation_status;

    //Constructor
    function AssignedEvaluation($project_id, $student_id, $student_name, $fyp_level, $fyp_progress, $evaluation_1, $evaluation_2, $evaluation_3, $evaluation_status)
    {
        $this->project_id = $project_id;
        $this->student_id = $student_id;
        $this->student_name = $student_name;
        $this->fyp_level = $fyp_level;
        $this->fyp_progress = $fyp_progress;
        $this->evaluation_1 = $evaluation_1;
        $this->evaluation_2 = $evaluation_2;
        $this->evaluation_3 = $evaluation_3;
        $this->evaluation_status = $evaluation_status;
    }

    //Getter and Setter
    function getProjectID()
    {
        return $this->project_id;
    }

    function setProjectID($project_id)
    {
        $this->project_id = $project_id;
    }

    function getStudentID()
    {
        return $this->student_id;
    }

    function setStudentID($student_id)
    {
        $this->student_id = $student_id;
    }

    function getStudentName()
    {
        return $this->student_name;
    }

    function setStudentName($student_name)
    {
        $this->student_name = $student_name;
    }

    function getFypLevel()
    {
        return $this->fyp_level;
    }

    function setFypLevel($fyp_level)
    {
        $this->fyp_level = $fyp_level;
    }

    function getFypProgress()
    {
        return $this->fyp_progress;
    }

    function setFypProgress($fyp_progress)
    {
        $this->fyp_progress = $fyp_progress;
    }

    function getEvaluation1()
    {
        return $this->evaluation_1;
    }

    function setEvaluation1($evaluation_1)
    {
        $this->evaluation_1 = $evaluation_1;
    }

    function getEvaluation2()
    {
        return $this->evaluation_2;
    }

    function setEvaluation2($evaluation_2)
    {
        $this->evaluation_2 = $evaluation_2;
    }

    function getEvaluation3()
    {
        return $this->evaluation_3;
    }

    function setEvaluation3($evaluation_3)
    {
        $this->evaluation_3 = $evaluation_3;
    }

    function getEvaluationStatus()
    {
        return $this->evaluation_status;
    }

    function setEvaluationStatus($evaluation_status)
    {
        $this->evaluation_status = $evaluation_status;
    }
}
