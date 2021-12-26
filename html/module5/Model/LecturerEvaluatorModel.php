<?php

class LecturerEvaluator{
    private $evaluatorID;
    private $evaluatorName;
    private $lect_id;
    private $contactNum;
    private $email;
    
    //Constructor
    public function LecturerEvaluator($evaluator_id, $lect_id, $name, $contactNumber, $email){
        $this -> evaluatorID = $evaluator_id;
        $this -> lect_id = $lect_id;
        $this -> evaluatorName = $name;
        $this -> contactNum = $contactNumber;
        $this -> email = $email;
    }
    
    //Getter and Setter
    public function getEvaluatorID(){
        return $this -> evaluatorID;
    }

    public function setEvaluatorID($id){
        $this -> evaluatorID = $id;
    }

    public function getLecturerID(){
        return $this -> lect_id;
    }

    public function setLecturerID($lect_id){
        $this -> lect_id = $lect_id;
    }

    public function getEvaluatorName(){
        return $this -> evaluatorName;
    }

    public function setEvaluatorName($name){
        $this -> evaluatorName = $name;
    }

    public function getContactNum(){
        return $this -> contactNum;
    }

    public function setContactNum($contactNum){
        $this -> contactNum = $contactNum;
    }

    public function getEmail(){
        return $this -> email;
    }

    public function setEmail($email){
        $this -> email = $email;
    }
}

?>