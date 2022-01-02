<?php

class ProjectLogbook{
    private $date;
    private $activity;

    function ProjectLogbook($date, $activity){
        $this->date = $date;
        $this->activity = $activity;
    }

    function getDate(){
        return $this->date;
    }

    function setDate($date){
        $this->date = $date;
    }

    function getActivity(){
        return $this->activity;
    }

    function setActivity($activity){
        $this->activity = $activity;
    }
}
    

