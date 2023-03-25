<?php

class TasksModel extends Model{

  private $id;
  private $title;
  private $description;
  private $shipid;
  private $lapseid;
  private $categoryid;
  private $statusid;
  private $userid;
  private $hourid;
  private $usercreated;
  private $createdat;
  private $updatedat;

  public function setId($id){ $this->id = $id; }
  public function setTitle($title){ $this->title = $title; }
  public function setDescription($description){ $this->description = $description; }
  public function setShipId($shipid){ $this->shipid = $shipid; }
  public function setLapseId($lapseid){ $this->lapseid = $lapseid; }
  public function setCategoryId($categoryid){ $this->categoryid = $categoryid; }
  public function setStatusId($statusid){ $this->statusid = $statusid; }
  public function setUserId($userid){ $this->userid = $userid; }
  public function setHourId($hourid){ $this->hourid = $hourid; }
  public function setUserCreated($usercreated){ $this->usercreated = $usercreated; }
  public function setCreatedAt($createdat){ $this->createdat = $createdat; }
  public function setUpdatedAt($updatedat){ $this->updatedat = $updatedat; }

  public function getId(){ return $this->id;}
  public function getTitle(){ return $this->title; }
  public function getDescription(){ return $this->description; }
  public function getShipId(){ return $this->shipid; }
  public function getLapseId(){ return $this->lapseid; }
  public function getCategoryId(){ return $this->categoryid; }
  public function getStatusId(){ return $this->statusid; }
  public function getUserId(){ return $this->userid; }
  public function getHourId(){ return $this->hourid; }
  public function getUserCreated(){ return $this->usercreated; }
  public function getCreatedAt(){ return $this->createdat; }
  public function getUpdatedAt(){ return $this->updatedat; }

  public function __construct(){
    parent::__construct();
  }

  public function save(){
    try{
      $query = $this->prepare('INSERT INTO tasks (title, description, ship_id, lapse_id, category_id, status_id, user_id, hour_id, user_created) VALUES(:title, :description, :ship, :lapse, :category, :status, :user, :hour, :usercreated)');
      $query->execute([
        'title' => $this->title, 
        'description' => $this->description, 
        'ship' => $this->shipid, 
        'lapse' => $this->lapseid, 
        'category' => $this->categoryid, 
        'status' => $this->statusid, 
        'user' => $this->userid, 
        'hour' => $this->hourid, 
        'usercreated' => $this->usercreated,
      ]);
      if($query->rowCount()) return true;

      return false;
    }catch(PDOException $e){
      return false;
    }
  }

  public function getAll() {
    $items = [];

    try{
      $query = $this->query('SELECT * FROM tasks');

      while($p = $query->fetch(PDO::FETCH_ASSOC)){
        $item = new TasksModel();
        $item->from($p);

        array_push($items, $item);
      }

      return $items;
    }catch(PDOException $e){
      echo $e;
    }
  }

  public function get($id){
    try{
      $query = $this->prepare('SELECT * FROM tasks WHERE id = :id');
      $query->execute(['id' => $id]);
      $task = $query->fetch(PDO::FETCH_ASSOC);

      $this->from($task);

      return $this;
    }catch(PDOException $e){
      return false;
    }
  }

  public function getAllByUserId($userid){
    $items = [];

    try{
      $query = $this->prepare('SELECT * FROM tasks WHERE user_id = :userid');
      $query->execute(['userid' => $userid]);

      while($p = $query->fetch(PDO::FETCH_ASSOC)){
        $item = new TasksModel();
        $item->from($p);

        array_push($items, $item);
      }

      return $items;
    }catch(PDOException $e){
      echo $e;
    }
  }

  public function update(){
    try{
      $query = $this->prepare('UPDATE tasks SET title = :title, description = :description, ship_id = :ship, lapse_id = :lapse, category_id = :category, status_id = :status, user_id = :user, hour_id = :hour, user_created = :usercreated WHERE id = :id');
      $query->execute([
        'id' => $this->id,
        'title' => $this->title, 
        'description' => $this->description, 
        'ship' => $this->shipid, 
        'lapse' => $this->lapseid, 
        'category' => $this->categoryid, 
        'status' => $this->statusid, 
        'user' => $this->userid, 
        'hour' => $this->hourid, 
        'usercreated' => $this->usercreated
      ]);

      return true;
    }catch(PDOException $e){
      echo $e;
      return false;
    }
  }

  public function from($array) {
    $this->id = $array['id'];
    $this->title = $array['title'];
    $this->description = $array['description'];
    $this->shipid = $array['ship_id'];
    $this->lapseid = $array['lapse_id'];
    $this->categoryid = $array['category_id'];
    $this->statusid = $array['status_id'];
    $this->userid = $array['user_id'];
    $this->hourid = $array['hour_id'];
    $this->usercreated = $array['user_created'];
    $this->createdat = $array['created_at'];
    $this->updatedat = $array['updated_at'];
  }

}

?>