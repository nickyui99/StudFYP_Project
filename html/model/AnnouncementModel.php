<?php

class Announcement {
    private $announcement_id;
    private $announcement_title;
    private $announcement_description;

    public function Announcement($announcement_id, $announcement_title, $announcement_description){
        $this->announcement_id = $announcement_id;
        $this->announcement_title = $announcement_title;
        $this->announcement_description = $announcement_description;
    }

    public function getAnnouncementId(){
        return $this->announcement_id;
    }

    public function setAnnouncementId($announcement_id){
        $this->announcement_id = $announcement_id;
    }

    public function getAnnouncementTitle(){
        return $this->announcement_title;
    }

    public function setAnnouncementTitle($announcement_title){
        $this->announcement_title = $announcement_title;
    }

    public function getAnnouncementDescription(){
        return $this->announcement_description;
    }

    public function setAnnouncementDescription($announcement_description){
        $this->announcement_description = $announcement_description;
    }
}