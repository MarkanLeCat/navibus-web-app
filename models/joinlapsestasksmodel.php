<?php

class JoinLapsesTasksModel extends Model {

  private $lapseid;
  private $lapsename;
  private $ship;
  private $category;
  private $initial;
  private $end;
  private $userfirstname;
  private $userlastname;
  private $createdat;
  private $updatedat;

  private $taskid;
  private $tasktitle;
  private $taskdescription;
  private $taskship;
  private $tasklapse;
  private $taskcategory;
  private $status;
  private $taskuserfirstname;
  private $taskuserlastname;
  private $taskhours;
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
    $this->ship = $array['ship'];
    $this->category = $array['category'];
    $this->initial = $array['initial'];
    $this->end = $array['end'];
    $this->userfirstname = $array['userfirstname'];
    $this->userlastname = $array['userlastname'];
    $this->createdat = $array['createdat'];
    $this->updatedat = $array['updatedat'];
  }

  public function toArray(){
    $array = [];
    $array['id'] = $this->lapseid;
    $array['name'] = $this->lapsename;
    $array['ship'] = $this->ship;
    $array['category'] = $this->category;
    $array['initial'] = $this->initial;
    $array['end'] = $this->end;
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
    $this->taskship = $array['ship'];
    $this->tasklapse = $array['lapse'];
    $this->taskcategory = $array['category'];
    $this->status = $array['status'];
    $this->taskuserfirstname = $array['userfirstname'];
    $this->taskuserlastname = $array['userlastname'];
    $this->taskhours = $array['hours'];
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
    $array['ship'] = $this->taskship;
    $array['lapse'] = $this->tasklapse;
    $array['category'] = $this->taskcategory;
    $array['status'] = $this->status;
    $array['userfirstname'] = $this->taskuserfirstname;
    $array['userlastname'] = $this->taskuserlastname;
    $array['hours'] = $this->taskhours;
    $array['createdname'] = $this->taskusercreatedname;
    $array['createdlastname'] = $this->taskusercreatedlastname;
    $array['createdat'] = $this->taskcreatedat;
    $array['updatedat'] = $this->taskupdatedat;

    return $array;
  }

  public function getLapseId(){return $this->lapseid;}
  public function getLapseName(){return $this->lapsename;}
  public function getShip(){return $this->ship;}
  public function getCategory(){return $this->category;}
  public function getInitial(){return $this->initial;}
  public function getEnd(){return $this->end;}
  public function getUserFirstName(){return $this->userfirstname;}
  public function getUserLastName(){return $this->userlastname;}
  public function getCreatedAt(){return $this->createdat;}
  public function getUpdatedAt(){return $this->updatedat;}

  public function getTaskId(){return $this->taskid;}
  public function getTaskTitle(){return $this->tasktitle;}
  public function getTaskDescription(){return $this->taskdescription;}
  public function getTaskShip(){return $this->taskship;}
  public function getTaskLapse(){return $this->tasklapse;}
  public function getTaskCategory(){return $this->taskcategory;}
  public function getStatus(){return $this->status;}
  public function getTaskUserFirstName(){return $this->taskuserfirstname;}
  public function getTaskUserLastName(){return $this->taskuserlastname;}
  public function getTaskHours(){return $this->taskhours;}
  public function getTaskUserCreatedName(){return $this->taskusercreatedname;}
  public function getTaskUserCreatedLastName(){return $this->taskusercreatedlastname;}
  public function getTaskCreatedAt(){return $this->taskcreatedat;}
  public function getTaskUpdatedAt(){return $this->taskupdatedat;}
}

?>