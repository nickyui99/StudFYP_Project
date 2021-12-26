<?php

class IndustrialEvaluator{
    private $evaluatorID;
    private $evaluatorName;
    private $ip_id;
    private $contactNum;
    private $email;
    private $company;
    
    //Constructor
    public function IndustrialEvaluator($evaluator_id, $ip_id, $name, $contactNumber, $email, $company){
        $this -> evaluatorID = $evaluator_id;
        $this -> ip_id = $ip_id;
        $this -> evaluatorName = $name;
        $this -> contactNum = $contactNumber;
        $this -> email = $email;
        $this -> company = $company;
    }
    
    //Getter and Setter
    public function getEvaluatorID(){
        return $this -> evaluatorID;
    }

    public function setEvaluatorID($id){
        $this -> evaluatorID = $id;
    }

    public function getIPID(){
        return $this -> ip_id;
    }

    public function setIPID($ip_id){
        $this -> ip_id = $ip_id;
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

    public function getCompany(){
        return $this -> email;
    }

    public function setCompany($company_name){
        $this -> company = $company_name;
    }
}

?>