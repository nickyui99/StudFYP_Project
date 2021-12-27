<?php

class IndustrialEvaluator{
    private $evaluator_id;
    private $evaluator_name;
    private $ip_id;
    private $contactNum;
    private $email;
    private $company;
    
    //Constructor
    public function IndustrialEvaluator($evaluator_id, $ip_id, $name, $contact_number, $email, $company){
        $this -> evaluator_id = $evaluator_id;
        $this -> ip_id = $ip_id;
        $this -> evaluator_name = $name;
        $this -> contact_num = $contact_number;
        $this -> email = $email;
        $this -> company = $company;
    }
    
    //Getter and Setter
    public function getEvaluatorID(){
        return $this -> evaluator_id;
    }

    public function setEvaluatorID($id){
        $this -> evaluator_id = $id;
    }

    public function getIPID(){
        return $this -> ip_id;
    }

    public function setIPID($ip_id){
        $this -> ip_id = $ip_id;
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

    public function getCompany(){
        return $this -> company;
    }

    public function setCompany($company_name){
        $this -> company = $company_name;
    }
}

?>