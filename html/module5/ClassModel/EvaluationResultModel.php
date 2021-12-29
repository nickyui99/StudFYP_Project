<?php

class EvaluationResult{
    private $submission;
    private $evaluator_id;
    private $evaluator_name;
    private $project_feedback;
    private $evaluation_mark;

    //Constructor
    public function EvaluationResult($submission, $evaluator_id, $evaluator_name, $project_feedback, $evaluation_mark){
        $this->submission = $submission;
        $this->evaluator_id = $evaluator_id;
        $this->evaluator_name = $evaluator_name;
        $this->project_feedback = $project_feedback;
        $this->evaluation_mark = $evaluation_mark;
    }

    // Getter and Setter
    public function getSubmission(){
        return $this->submission;
    }

    public function setSubmission($submission){
        $this->submission = $submission;
    }

    public function getEvaluatorID(){
        return $this->evaluator_id;
    }

    public function setEvaluatorID($evaluator_id){
        $this->evaluator_id = $evaluator_id;
    }

    public function getEvaluatorName(){
        return $this->evaluator_name;
    }

    public function setEvaluatorName($evaluator_name){
        $this->evaluator_name = $evaluator_name;
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
}