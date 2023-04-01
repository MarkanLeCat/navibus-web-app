<?php

class JoinTasksModel extends Model {

  private $taskid;
  private $title;
  private $description;
  private $shipid;
  private $ship;
  private $lapseid;
  private $lapse;
  private $categoryid;
  private $category;
  private $statusid;
  private $status;
  private $priority;
  private $userid;
  private $userfirstname;
  private $userlastname;
  private $hoursid;
  private $hours;
  private $usercreatedid;
  private $usercreatedname;
  private $usercreatedlastname;
  private $createdat;
  private $updatedat;

  public function __construct(){

    parent::__construct();
  }

  public function getAllTasksByUserId($userid){
    $items = [];

    try{
      $query = $this->prepare("CALL SP_getAllTasksByUserId( :userid, :actualdate )");
      $query->execute([
        "userid" => $userid,
        "actualdate" => date("Y-m-d")
      ]);

      while($p = $query->fetch(PDO::FETCH_ASSOC)){
        $item = new JoinTasksModel();
        $item->from($p);

        array_push($items, $item);
      }

      return $items;
    }catch(PDOException $e){
      echo $e;
    }
  }

  public function from($array){
    $this->taskid = $array['id'];
    $this->title = $array['title'];
    $this->description = $array['description'];
    $this->shipid = $array['shipid'];
    $this->ship = $array['ship'];
    $this->lapseid = $array['lapseid'];
    $this->lapse = $array['lapse'];
    $this->categoryid = $array['categoryid'];
    $this->category = $array['category'];
    $this->statusid = $array['statusid'];
    $this->status = $array['status'];
    $this->priority = $array['priority'];
    $this->userid = $array['userid'];
    $this->userfirstname = $array['userfirstname'];
    $this->userlastname = $array['userlastname'];
    $this->userposition = $array['position'];
    $this->hoursid = $array['hoursid'];
    $this->hours = $array['hours'];
    $this->usercreatedid = $array['createdid'];
    $this->usercreatedname = $array['createdname'];
    $this->usercreatedlastname = $array['createdlastname'];
    $this->createdat = $array['createdat'];
    $this->updatedat = $array['updatedat'];
  }

  public function toArray(){
    $array = [];
    $array['id'] = $this->taskid;
    $array['title'] = $this->title;
    $array['description'] = $this->description;
    $array['shipid'] = $this->shipid;
    $array['ship'] = $this->ship;
    $array['lapseid'] = $this->lapseid;
    $array['lapse'] = $this->lapse;
    $array['categoryid'] = $this->categoryid;
    $array['category'] = $this->category;
    $array['statusid'] = $this->statusid;
    $array['status'] = $this->status;
    $array['priority'] = $this->priority;
    $array['userid'] = $this->userid;
    $array['userfirstname'] = $this->userfirstname;
    $array['userlastname'] = $this->userlastname;
    $array['position'] = $this->userposition;
    $array['hoursid'] = $this->hoursid;
    $array['hours'] = $this->hours;
    $array['createdid'] = $this->usercreatedid;
    $array['createdname'] = $this->usercreatedname;
    $array['createdlastname'] = $this->usercreatedlastname;
    $array['createdat'] = $this->createdat;
    $array['updatedat'] = $this->updatedat;

    return $array;
  }

  public function getTaskId(){return $this->taskid;}
  public function getTitle(){return $this->title;}
  public function getDescription(){return $this->description;}
  public function getShipId(){return $this->shipid;}
  public function getShip(){return $this->ship;}
  public function getLapseId(){return $this->lapseid;}
  public function getLapse(){return $this->lapse;}
  public function getCategoryId(){return $this->categoryid;}
  public function getCategory(){return $this->category;}
  public function getStatusId(){return $this->statusid;}
  public function getStatus(){return $this->status;}
  public function getPriority(){return $this->priority;}
  public function getUserId(){return $this->userid;}
  public function getUserFirstName(){return $this->userfirstname;}
  public function getUserLastName(){return $this->userlastname;}
  public function getUserPosition(){return $this->userposition;}
  public function getHoursId(){return $this->hoursid;}
  public function getHours(){return $this->hours;}
  public function getUserCreatedId(){return $this->usercreatedid;}
  public function getUserCreatedName(){return $this->usercreatedname;}
  public function getUserCreatedLastName(){return $this->usercreatedlastname;}
  public function getCreatedAt(){return $this->createdat;}
  public function getUpdatedAt(){return $this->updatedat;}
}

?>