<?php

// this is for reviewID, comments, date added
// restID fk, userID fk ( get them from session restaurant id and user id)
class Reviews {
    private $id;
    private $comments;
    private $score;
    private $date;
    private $restID;
    private $userID;

    public function __construct() {
        $this->id = 0;
        $this->comments = '';
        $this->score ='';
        $this->date = date("Y-m-d");
        $this->restID = 0;
        $this->userID = 0;
        
        
    }
    
    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

     public function getComments() {
        return $this->comments;
    }

    public function setComments($value) {
        $this->comments = $value;
    }
     public function getScore() {
        return $this->score;
    }

    public function setScore($value) {
        $this->score = $value;
    }
       public function getDate() {
        return $this->date;
    }

    public function setDate($value) {
        $this->date = date_format($value,"Y-m-d");
    }
     public function getRestID() {
        
        return $this->restID;
    }

    public function setRestID($value) {
        $this->restID = $value;
    }
    
       public function getUserID() {
        
        return $this->userID;
    }

    public function setUserID($value) {
        $this->userID = $value;
    }
    
    
}


?>