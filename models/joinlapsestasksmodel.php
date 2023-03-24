<?php

class JoinLapsesTasksModel extends Model {

  private $lapseid;
  private $lapsename;
  private $shipid;
  private $ship;
  private $categoryid;
  private $category;
  private $initial;
  private $end;
  private $userid;
  private $userfirstname;
  private $userlastname;
  private $createdat;
  private $updatedat;

  private $taskid;
  private $tasktitle;
  private $taskdescription;
  private $taskshipid;
  private $taskship;
  private $tasklapseid;
  private $tasklapse;
  private $taskcategoryid;
  private $taskcategory;
  private $statusid;
  private $status;
  private $taskuserid;
  private $taskuserfirstname;
  private $taskuserlastname;
  private $taskhoursid;
  private $taskhours;
  private $taskusercreatedid;
  private $taskusercreatedname;
  private $taskusercreatedlastname;
  private $taskcreatedat;
  private $taskupdatedat;

  public function __construct(){

    parent::__construct();
  }

  public function getAllLapses(){
    $items = [];

    try{
      $query = $this->prepare("CALL SP_getAllLapses( :actualdate )");
      $query->execute(["actualdate" => date("Y-m-d")]);

      while($p = $query->fetch(PDO::FETCH_ASSOC)){
        $item = new JoinLapsesTasksModel();
        $item->from($p);

        array_push($items, $item);
      }

      return $items;
    }catch(PDOException $e){
      echo $e;
    }
  }

  public function getAllTasksByLapseId($lapseid){
    $items = [];

    try{
      $query = $this->prepare("CALL SP_getAllTasksByLapseId( :lapseid )");
      $query->execute(["lapseid" => $lapseid]);

      while($p = $query->fetch(PDO::FETCH_ASSOC)){
        $item = new JoinLapsesTasksModel();
        $item->fromTasksLapses($p);

        array_push($items, $item);
      }

      return $items;
    }catch(PDOException $e){
      echo $e;
    }
  }

  public function getAllLapsesByUserId($userid){
    $items = [];

    try{
      $query = $this->prepare("CALL SP_getAllLapsesByUserId( :userid, :actualdate )");
      $query->execute([
        "userid" => $userid,
        "actualdate" => date("Y-m-d")
      ]);

      while($p = $query->fetch(PDO::FETCH_ASSOC)){
        $item = new JoinLapsesTasksModel();
        $item->from($p);
        
        array_push($items, $item);
      }

      return $items;
    }catch(PDOException $e){
      echo $e;
    }
  }

  public function getAllTasksByUserAndLapseId($userid, $lapseid){
    $items = [];

    try{
      $query = $this->prepare("CALL SP_getAllTasksByUserAndLapseId( :userid, :lapseid )");
      $query->execute([
        "userid" => $userid,
        "lapseid" => $lapseid
      ]);

      while($p = $query->fetch(PDO::FETCH_ASSOC)){
        $item = new JoinLapsesTasksModel();
        $item->fromTasksLapses($p);

        array_push($items, $item);
      }

      return $items;
    }catch(PDOException $e){
      echo $e;
    }
  }

  public function from($array){
    $this->lapseid = $array['id'];
    $this->lapsename = $array['name'];
    $this->shipid = $array['shipid'];
    $this->ship = $array['ship'];
    $this->categoryid = $array['categoryid'];
    $this->category = $array['category'];
    $this->initial = $array['initial'];
    $this->end = $array['end'];
    $this->userid = $array['userid'];
    $this->userfirstname = $array['userfirstname'];
    $this->userlastname = $array['userlastname'];
    $this->createdat = $array['createdat'];
    $this->updatedat = $array['updatedat'];
  }

  public function toArray(){
    $array = [];
    $array['id'] = $this->lapseid;
    $array['name'] = $this->lapsename;
    $array['shipid'] = $this->shipid;
    $array['ship'] = $this->ship;
    $array['categoryid'] = $this->categoryid;
    $array['category'] = $this->category;
    $array['initial'] = $this->initial;
    $array['end'] = $this->end;
    $array['userid'] = $this->userid;
    $array['userfirstname'] = $this->userfirstname;
    $array['userlastname'] = $this->userlastname;
    $array['createdat'] = $this->createdat;
    $array['updatedat'] = $this->updatedat;

    return $array;
  }

  public function fromTasksLapses($array){
    $this->taskid = $array['id'];
    $this->tasktitle = $array['title'];
    $this->taskdescription = $array['description'];
    $this->taskshipid = $array['shipid'];
    $this->taskship = $array['ship'];
    $this->tasklapseid = $array['lapseid'];
    $this->tasklapse = $array['lapse'];
    $this->taskcategoryid = $array['categoryid'];
    $this->taskcategory = $array['category'];
    $this->statusid = $array['statusid'];
    $this->status = $array['status'];
    $this->taskuserid = $array['userid'];
    $this->taskuserfirstname = $array['userfirstname'];
    $this->taskuserlastname = $array['userlastname'];
    $this->taskhoursid = $array['hoursid'];
    $this->taskhours = $array['hours'];
    $this->taskusercreatedid = $array['createdid'];
    $this->taskusercreatedname = $array['createdname'];
    $this->taskusercreatedlastname = $array['createdlastname'];
    $this->taskcreatedat = $array['createdat'];
    $this->taskupdatedat = $array['updatedat'];
  }

  public function toArrayTasksLapses(){
    $array = [];
    $array['id'] = $this->taskid;
    $array['title'] = $this->title;
    $array['description'] = $this->description;
    $array['shipid'] = $this->taskshipid;
    $array['ship'] = $this->taskship;
    $array['lapseid'] = $this->tasklapseid;
    $array['lapse'] = $this->tasklapse;
    $array['categoryid'] = $this->taskcategoryid;
    $array['category'] = $this->taskcategory;
    $array['statusid'] = $this->statusid;
    $array['status'] = $this->status;
    $array['userid'] = $this->taskuserid;
    $array['userfirstname'] = $this->taskuserfirstname;
    $array['userlastname'] = $this->taskuserlastname;
    $array['hoursid'] = $this->taskhoursid;
    $array['hours'] = $this->taskhours;
    $array['createdid'] = $this->taskusercreatedid;
    $array['createdname'] = $this->taskusercreatedname;
    $array['createdlastname'] = $this->taskusercreatedlastname;
    $array['createdat'] = $this->taskcreatedat;
    $array['updatedat'] = $this->taskupdatedat;

    return $array;
  }

  public function getLapseId(){return $this->lapseid;}
  public function getLapseName(){return $this->lapsename;}
  public function getShipId(){return $this->shipid;}
  public function getShip(){return $this->ship;}
  public function getCategoryId(){return $this->categoryid;}
  public function getCategory(){return $this->category;}
  public function getInitial(){return $this->initial;}
  public function getEnd(){return $this->end;}
  public function getUserId(){return $this->userid;}
  public function getUserFirstName(){return $this->userfirstname;}
  public function getUserLastName(){return $this->userlastname;}
  public function getCreatedAt(){return $this->createdat;}
  public function getUpdatedAt(){return $this->updatedat;}

  public function getTaskId(){return $this->taskid;}
  public function getTaskTitle(){return $this->tasktitle;}
  public function getTaskDescription(){return $this->taskdescription;}
  public function getTaskShipId(){return $this->taskshipid;}
  public function getTaskShip(){return $this->taskship;}
  public function getTaskLapseId(){return $this->tasklapseid;}
  public function getTaskLapse(){return $this->tasklapse;}
  public function getTaskCategoryId(){return $this->taskcategoryid;}
  public function getTaskCategory(){return $this->taskcategory;}
  public function getStatusId(){return $this->statusid;}
  public function getStatus(){return $this->status;}
  public function getTaskUserId(){return $this->taskuserid;}
  public function getTaskUserFirstName(){return $this->taskuserfirstname;}
  public function getTaskUserLastName(){return $this->taskuserlastname;}
  public function getTaskHoursId(){return $this->taskhoursid;}
  public function getTaskHours(){return $this->taskhours;}
  public function getTaskUserCreatedId(){return $this->taskusercreatedid;}
  public function getTaskUserCreatedName(){return $this->taskusercreatedname;}
  public function getTaskUserCreatedLastName(){return $this->taskusercreatedlastname;}
  public function getTaskCreatedAt(){return $this->taskcreatedat;}
  public function getTaskUpdatedAt(){return $this->taskupdatedat;}
}

?>