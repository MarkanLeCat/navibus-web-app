<?php

class LapsesModel extends Model{

  private $id;
  private $title;
  private $amount;
  private $categoryid;
  private $date;
  private $userid;

  public function setId($id){ $this->id = $id; }
  public function setTitle($title){ $this->title = $title; }
  public function setAmount($amount){ $this->amount = $amount; }
  public function setCategoryId($categoryid){ $this->categoryid = $categoryid; }
  public function setDate($date){ $this->date = $date; }
  public function setUserId($userid){ $this->userid = $userid; }

  public function getId(){ return $this->id;}
  public function getTitle(){ return $this->title; }
  public function getAmount(){ return $this->amount; }
  public function getCategoryId(){ return $this->categoryid; }
  public function getDate(){ return $this->date; }
  public function getUserId(){ return $this->userid; }

  public function __construct(){
    parent::__construct();
  }
}

?>