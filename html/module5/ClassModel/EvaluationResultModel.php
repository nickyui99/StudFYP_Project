<?php

require_once 'EvaluationMarkDetailsModel.php';

class EvaluationResult{
    private $result_id;
    private $proj_id;
    private $evaluator_id;
    private $evaluator_name;
    private $project_title;
    private $submission;
    private $project_feedback;
    private $evaluation_date;
    private $ev_mark_details;

    //Constructor
    public function EvaluationResult($result_id, $proj_id, $evaluator_id, $evaluator_name, $project_title, $submission, $project_feedback, $evaluation_date, $ev_mark_details){
        $this->result_id= $result_id;
        $this->$proj_id = $proj_id;
        $this->evaluator_id = $evaluator_id;
        $this->evaluator_name = $evaluator_name;
        $this->project_title = $project_title;
        $this->project_feedback = $project_feedback;
        $this->submission = $submission;
        $this->evaluation_date = $evaluation_date;
        $this->ev_mark_details = $ev_mark_details;
    }

    // Getter and Setter

    public function getResultID(){
        return $this->result_id;
    }

    public function setResultID($result_id){
        $this->result_id = $result_id;
    }

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

    public function getEvaluationDate(){
        return $this->evaluation_date;
    }

    public function setEvaluationDate($evaluation_date){
        $this->evaluation_date = $evaluation_date;
    }

    public function getEvMarkDetails(){
        return $this->ev_mark_details;
    }

    public function setEvMarkDetails($ev_mark_details){
        $this->ev_mark_details = $ev_mark_details;
    }
}