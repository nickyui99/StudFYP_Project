<?php

class LecturerEvaluator{
    private $evaluator_id;
    private $evaluator_name;
    private $lect_id;
    private $contact_num;
    private $email;
    
    //Constructor
    public function LecturerEvaluator($evaluator_id, $lect_id, $name, $contact_number, $email){
        $this -> evaluator_id = $evaluator_id;
        $this -> lect_id = $lect_id;
        $this -> evaluator_name = $name;
        $this -> contact_num = $contact_number;
        $this -> email = $email;
    }
    
    //Getter and Setter
    public function getEvaluatorID(){
        return $this -> evaluator_id;
    }

    public function setEvaluatorID($id){
        $this -> evaluator_id = $id;
    }

    public function getLecturerID(){
        return $this -> lect_id;
    }

    public function setLecturerID($lect_id){
        $this -> lect_id = $lect_id;
    }

    public function getEvaluatorName(){
        return $this -> evaluator_name;
    }

    public function setEvaluatorName($name){
        $this -> evaluator_name = $name;
    }

    public function getContactNum(){
        return $this -> contact_num;
    }

    public function setContactNum($contact_num){
        $this -> contact_num = $contact_num;
    }

    public function getEmail(){
        return $this -> email;
    }

    public function setEmail($email){
        $this -> email = $email;
    }
}

?>