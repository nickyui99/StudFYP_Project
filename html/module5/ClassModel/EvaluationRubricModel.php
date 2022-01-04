<?php

class EvaluationRubric
{
    private $rubric_id;
    private $rubric_num;
    private $rubric_title;
    private $rubric_details;
    private $rubric_mark;
    private $rubric_weightage;

    //Constructor
    public function EvaluationRubric($rubric_id, $rubric_num, $rubric_title, $rubric_details, $rubric_mark, $rubric_weightage)
    {
        $this->rubric_id = $rubric_id;
        $this->rubric_num = $rubric_num;
        $this->rubric_title = $rubric_title;
        $this->rubric_details = $rubric_details;
        $this->rubric_mark = $rubric_mark;
        $this->rubric_weightage = $rubric_weightage;
    }

    //Getter and Setter
    public function getRubricId()
    {
        return $this->rubric_id;
    }

    public function setRubricId($rubric_id)
    {
        $this->rubric_id = $rubric_id;
    }

    public function getRubricNum()
    {
        return $this->rubric_num;
    }

    public function setRubricNum($rubric_num)
    {
        $this->rubric_num = $rubric_num;
    }

    public function getRubricTitle()
    {
        return $this->rubric_title;
    }

    public function setRubricTitle($rubric_title)
    {
        $this->rubric_title = $rubric_title;
    }
    public function getRubricDetails()
    {
        return $this->rubric_details;
    }

    public function setRubricDetails($rubric_details)
    {
        $this->rubric_details = $rubric_details;
    }

    public function getRubricMark()
    {
        return $this->rubric_mark;
    }

    public function setRubricMark($rubric_mark)
    {
        $this->rubric_mark = $rubric_mark;
    }

    public function getRubricWeightage()
    {
        return $this->rubric_weightage;
    }

    public function setRubricWeightage($rubric_weightage)
    {
        $this->rubric_weightage = $rubric_weightage;
    }
}
