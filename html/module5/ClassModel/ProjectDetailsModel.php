<?php 

/**
 * Name: Nicholas Ooi Zhee Chen
 * Matric Id: CB19080
 */

class ProjectDetails{
    private $proj_id;
    private $proj_title;
    private $stud_id;
    private $stud_name;
    
    function ProjectDetails($proj_id, $proj_title, $stud_id, $stud_name){
        $this->proj_id = $proj_id;
        $this->proj_title = $proj_title;
        $this->stud_id = $stud_id;
        $this->stud_name = $stud_name;
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

    function getStudID(){
        return $this->stud_id;
    }

    function setStudID($stud_id){
        $this->stud_id = $stud_id;
    }

    function getStudName(){
        return $this->stud_name;
    }

    function setStudName($stud_name){
        $this->stud_name = $stud_name;
    }
}