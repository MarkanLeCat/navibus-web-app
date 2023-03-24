<?php

class JoinTasksLapsesModel extends Model {

  private $taskid;
  private $title;
  private $description;
  private $ship;
  private $lapse;
  private $category;
  private $status;
  private $userfirstname;
  private $userlastname;
  private $userposition;
  private $hours;
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
        $item = new JoinTasksLapsesModel();
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
    $this->ship = $array['ship'];
    $this->lapse = $array['lapse'];
    $this->category = $array['category'];
    $this->status = $array['status'];
    $this->userfirstname = $array['userfirstname'];
    $this->userlastname = $array['userlastname'];
    $this->userposition = $array['position'];
    $this->hours = $array['hours'];
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
    $array['ship'] = $this->ship;
    $array['lapse'] = $this->lapse;
    $array['category'] = $this->category;
    $array['status'] = $this->status;
    $array['userfirstname'] = $this->userfirstname;
    $array['userlastname'] = $this->userlastname;
    $array['position'] = $this->userposition;
    $array['hours'] = $this->hours;
    $array['createdname'] = $this->usercreatedname;
    $array['createdlastname'] = $this->usercreatedlastname;
    $array['createdat'] = $this->createdat;
    $array['updatedat'] = $this->updatedat;

    return $array;
  }

  public function getTaskId(){return $this->taskid;}
  public function getTitle(){return $this->title;}
  public function getDescription(){return $this->description;}
  public function getShip(){return $this->ship;}
  public function getLapse(){return $this->lapse;}
  public function getCategory(){return $this->category;}
  public function getStatus(){return $this->status;}
  public function getUserFirstName(){return $this->userfirstname;}
  public function getUserLastName(){return $this->userlastname;}
  public function getUserPosition(){return $this->userposition;}
  public function getHours(){return $this->hours;}
  public function getUserCreatedName(){return $this->usercreatedname;}
  public function getUserCreatedLastName(){return $this->usercreatedlastname;}
  public function getCreatedAt(){return $this->createdat;}
  public function getUpdatedAt(){return $this->updatedat;}
}

?>