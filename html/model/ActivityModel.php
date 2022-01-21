<?php 

class Activity{
    private $activity_id;
    private $activity_name;
    private $activity_sub_type;
    private $activity_fyp_level;
    private $activity_start_date;
    private $activity_end_date;

    public function Activity($activity_id, $activity_name, $activity_sub_type, $activity_fyp_level, $activity_start_date, $activity_end_date){
        $this->activity_id = $activity_id;
        $this->activity_name = $activity_name;
        $this->activity_sub_type = $activity_sub_type;
        $this->activity_fyp_level = $activity_fyp_level;
        $this->activity_start_date = $activity_start_date;
        $this->activity_end_date = $activity_end_date;
    }

    public function getActivityId(){
        return $this->activity_id;
    }

    public function setActivityId($activity_id){
        $this->activity_id = $activity_id;
    }

    public function getActivityName(){
        return $this->activity_name;
    }

    public function setActivityName($activity_name){
        $this->activity_name = $activity_name;
    }

    public function getActivitySubmission(){
        return $this->activity_sub_type;
    }

    public function setActivitySubmission($activity_sub_type){
        $this->activity_sub_type = $activity_sub_type;
    }

    public function getActivityFyp(){
        return $this->activity_fyp_level;
    }

    public function setActivityFyp($activity_fyp_level){
        $this->activity_fyp_level = $activity_fyp_level;
    }

    public function getActivityStartDate(){
        return $this->activity_start_date;
    }

    public function setActivityStartDate($activity_start_date){
        $this->activity_start_date = $activity_start_date;
    }

    public function getActivityEndDate(){
        return $this->activity_end_date;
    }

    public function setActivityEndDate($activity_end_date){
        $this->activity_end_date = $activity_end_date;
    }
}
?>