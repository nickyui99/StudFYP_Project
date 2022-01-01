<?php

class EvaluateFyp
{
    private $proj_id;
    private $stud_id;
    private $fyp_level;
    private $project_title;
    private $project_mark;
    private $project_feedback;
    private $project_QR;

    function EvaluateFyp($proj_id, $stud_id, $fyp_level, $project_title, $project_mark, $project_feedback, $project_QR)
    {
        $this->proj_id = $proj_id;
        $this->stud_id = $stud_id;
        $this->fyp_level = $fyp_level;
        $this->project_title = $project_title;
        $this->project_mark = $project_mark;
        $this->project_feedback = $project_feedback;
        $this->project_QR = $project_QR;
    }

    function getProjID()
    {
        return $this->proj_id;
    }

    function setProjID($proj_id)
    {
        $this->proj_id = $proj_id;
    }

    function getStudID()
    {
        return $this->stud_id;
    }

    function setStudID($stud_id)
    {
        $this->stud_id = $stud_id;
    }

    function getFypLevel()
    {
        return $this->fyp_level;
    }

    function setFypLevel($fyp_level)
    {
        $this->fyp_level = $fyp_level;
    }

    function getProjTitle()
    {
        return $this->project_title;
    }

    function setProjTitle($project_title)
    {
        $this->project_title = $project_title;
    }
    function getProjMark()
    {
        return $this->project_mark;
    }

    function setProjMark($project_mark)
    {
        $this->project_mark = $project_mark;
    }

    function getProjFeedback()
    {
        return $this->project_feedback;
    }

    function setProjFeedback($project_feedback)
    {
        $this->project_feedback = $project_feedback;
    }

    function getProjQR()
    {
        return $this->project_QR;
    }

    function setProjQR($project_QR)
    {
        $this->project_QR = $project_QR;
    }
}
