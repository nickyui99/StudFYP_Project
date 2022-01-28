<?php

/**
 * Name: Nicholas Ooi Zhee Chen
 * Matric Id: CB19080
 */

class EvaluationReport{
    private $result_id;
    private $stud_id;
    private $proj_id;
    private $proj_title;
    private $fyp_stage;
    private $submission;
    private $evaluation_date;
    private $mark;
    private $feedback;

    function EvaluationReport($result_id, $stud_id, $proj_id, $proj_title, $fyp_stage, $submission,  $evaluation_date, $mark, $feedback){
        $this->result_id = $result_id;
        $this->stud_id = $stud_id;
        $this->proj_id = $proj_id;
        $this->proj_title = $proj_title;
        $this->fyp_stage = $fyp_stage;
        $this->submission = $submission;
        $this->$evaluation_date = $evaluation_date;
        $this->mark = $mark; 
        $this->feedback = $feedback;
    }

    function getResultId(){
        return $this->result_id;
    }

    function setResultId($result_id){
        $this->result_id = $result_id;
    }

    function getStudID(){
        return $this->stud_id;
    }

    function setStudID($stud_id){
        $this->stud_id = $stud_id;
    }

    function getProjID(){
        return $this->proj_id;
    }

    function setProjID($proj_id){
        $this->proj_id = $proj_id;
    }
    
    function getProjTitle(){
        return $this->proj_title;
    }

    function setProjTitle($proj_title){
        $this->proj_title = $proj_title;
    }

    function getFypStage(){
        return $this->fyp_stage;
    }

    function setFypStage($fyp_stage){
        $this->fyp_stage = $fyp_stage;
    }

    function getSubmission(){
        return $this->submission;
    }

    function setSubmission($submission){
        $this->submission = $submission;
    }

    function setEvaluationDate($evaluation_date){
        $this->evaluation_date = $evaluation_date;
    }

    function getEvaluationDate(){
        return $this->evaluation_date;
    }

    function getMark(){
        return $this->mark;
    }

    function setMark($mark){
        $this->mark = $mark;
    }


    function getEvaluationFeedback(){
        return $this->feedback;
    }

    function setEvaluationFeedback($feedback){
        $this->feedback = $feedback;
    }

}