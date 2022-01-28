<?php

/**
 * Name: Nicholas Ooi Zhee Chen
 * Matric Id: CB19080
 */

class EvaluationMarkDetails{
    private $ev_mark_id;
    private $result_id;
    private $evaluation_rubric_id;
    private $actual_mark;

    function EvaluationMarkDetails($ev_mark_id, $result_id, $evaluation_rubric_id, $actual_mark){
        $this->ev_mark_id = $ev_mark_id;
        $this->result_id = $result_id;
        $this->evaluation_rubric_id = $evaluation_rubric_id;
        $this->actual_mark = $actual_mark;
    }

    function getEvMarkId(){
        return $this->ev_mark_id;
    }

    function setEvMarkId($ev_mark_id){
        $this->ev_mark_id = $ev_mark_id;
    }

    function getResultId(){
        return $this->result_id;
    }

    function setResultId($result_id){
        $this->result_id = $result_id;
    }

    function getEvaluationRubricId(){
        return $this->evaluation_rubric_id;
    }

    function setEvaluationRubricId($evaluation_rubric_id){
        $this->evaluation_rubric_id = $evaluation_rubric_id;
    }

    function getActualMark(){
        return $this->actual_mark;
    }

    function setActualMark($actual_mark){
        $this->actual_mark = $actual_mark;
    }
}