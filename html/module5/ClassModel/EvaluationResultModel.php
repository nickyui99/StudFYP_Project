<?php

class EvaluationResult{
    private $evaluator_id;
    private $proj_id;
    private $submission;
    private $evaluator_name;
    private $project_title;
    private $project_feedback;
    private $evaluation_mark;
    private $evaluation_date;

    //Constructor
    public function EvaluationResult($submission, $proj_id, $evaluator_id, $evaluator_name, $project_title, $project_feedback, $evaluation_mark){
        $this->submission = $submission;
        $this->$proj_id = $proj_id;
        $this->evaluator_id = $evaluator_id;
        $this->evaluator_name = $evaluator_name;
        $this->project_title = $project_title;
        $this->project_feedback = $project_feedback;
        $this->evaluation_mark = $evaluation_mark;
    }

    // Getter and Setter
    public function getProjID(){
        return $this->proj_id;
    }

    public function setProjID($proj_id){
        $this->proj_id = $proj_id;
    }

    public function getEvaluatorID(){
        return $this->evaluator_id;
    }

    public function setEvaluatorID($evaluator_id){
        $this->evaluator_id = $evaluator_id;
    }

    public function getSubmission(){
        return $this->submission;
    }

    public function setSubmission($submission){
        $this->submission = $submission;
    }

    public function getEvaluatorName(){
        return $this->evaluator_name;
    }

    public function setEvaluatorName($evaluator_name){
        $this->evaluator_name = $evaluator_name;
    }

    public function getProjectTitle(){
        return $this->project_title;
    }

    public function setProjectTitle($project_title){
        $this->project_title = $project_title;
    }

    public function getProjectFeedback(){
        return $this->project_feedback;
    }

    public function setProjectFeedback($project_feedback){
        $this->project_feedback = $project_feedback;
    }

    public function getEvaluationMark(){
        return $this->evaluation_mark;
    }

    public function setEvaluationMark($evaluation_mark){
        $this->evaluation_mark = $evaluation_mark;
    }

    public function getEvaluationDate(){
        return $this->evaluation_date;
    }

    public function setEvaluationDate($evaluation_date){
        $this->evaluation_date = $evaluation_date;
    }
}