<?php

class AssignedEvaluation{

    private $project_id;
    private $student_id;
    private $student_name;
    private $fyp_level;
    private $fyp_progress;
    private $evaluation_1;
    private $evaluation_2;
    private $evaluation_3;

    function AssignedEvaluation($project_id, $student_id, $student_name, $fyp_level, $fyp_progress, $evaluation_1, $evaluation_2, $evaluation_3){
        $this->project_id = $project_id;
        $this->student_id = $student_id;
        $this->student_name = $student_name;
        $this->fyp_level = $fyp_level;
        $this->fyp_progress = $fyp_progress;
        $this->evaluation_1 = $evaluation_1;
        $this->evaluation_2 = $evaluation_2;
        $this->evaluation_3 =$evaluation_3;
    }

    
}