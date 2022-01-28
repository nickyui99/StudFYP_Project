<?php

/**
 * Name: Nicholas Ooi Zhee Chen
 * Matric Id: CB19080
 */

class EvaluateFyp
{
    private $fyp_level;
    private $project_title;
    private $project_mark;
    private $project_feedback;
    private $project_QR;

    function EvaluateFyp($fyp_level, $project_title, $project_mark, $project_feedback, $project_QR)
    {
        $this->fyp_level = $fyp_level;
        $this->project_title = $project_title;
        $this->project_mark = $project_mark;
        $this->project_feedback = $project_feedback;
        $this->project_QR = $project_QR;
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
