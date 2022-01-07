<?php

class EvaluationReport{
    private $result_id;
    private $proj_id;
    private $proj_title;
    private $submission;
    private $feedback;
    private $mark;
    private $stud_id;

    function EvaluationReport($result_id, $proj_id, $proj_title, $submission, $feedback, $mark, $stud_id){
        $this->result_id = $result_id;
        $this->proj_id = $proj_id;
        $this->proj_title = $proj_title;
        $this->submission = $submission;
        $this->feedback = $feedback;
        $this->mark = $mark;
        $this->stud_id = $stud_id;
    }

    function getResultId(){
        return $this->result_id;
    }

    function setResultId($result_id){
        $this->result_id = $result_id;
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

    function getSubmission(){
        return $this->submission;
    }

    function setSubmission($submission){
        $this->submission = $submission;
    }

    function getFeedback(){
        return $this->feedback;
    }

    function setFeedback($feedback){
        $this->feedback = $feedback;
    }

    function getMark(){
        return $this->mark;
    }

    function setMark($mark){
        $this->mark = $mark;
    }

    function getStudID(){
        return $this->stud_id;
    }

    function setStudID($stud_id){
        $this->stud_id = $stud_id;
    }

}