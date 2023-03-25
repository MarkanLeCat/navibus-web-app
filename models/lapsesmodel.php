<?php

class LapsesModel extends Model{

  private $id;
  private $name;
  private $shipid;
  private $categoryid;
  private $initial;
  private $end;
  private $userid;

  public function __construct(){
    parent::__construct();
  }

  public function save(){
    try{
      $query = $this->prepare('INSERT INTO lapse (name, ship_id, category_id, initial, end, user_id) VALUES(:name, :ship, :category, :initial, :end, :user)');
      $query->execute([
        'name' => $this->name, 
        'ship' => $this->shipid,
        'category' => $this->categoryid, 
        'initial' => $this->initial,
        'end' => $this->end,
        'user' => $this->userid,
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
      $query = $this->prepare('UPDATE lapse SET name = :name, ship_id = :ship, category_id = :category, initial = :initial, end = :end WHERE id = :id');
      $query->execute([
        'id' => $this->id,
        'name' => $this->name, 
        'ship' => $this->shipid,
        'category' => $this->categoryid, 
        'initial' => $this->initial,
        'end' => $this->end
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

  //Función para comprobar que un lapso no solape a otro ya existente en la base de datos
  public function checkLapseOverlap($initial, $end, $categoryid){
    try{
      $query = $this->prepare('CALL SP_checkLapseOverlap( :initial, :end, :categoryid)');
      $query->execute([
        'initial' => $initial,
        'end' => $end,
        'categoryid' => $categoryid
      ]);

      if($query->rowCount()) return true;

      return false;
    }catch(PDOException $e){
      return false;
    }
  }
  
  //Función para comprobar que un lapso no solape a otro ya existente en la base de datos, exceptuandose a sí mismo
  public function checkLapseOverlapException($initial, $end, $categoryid, $lapseid){
    try{
      $query = $this->prepare('CALL SP_checkLapseOverlapException( :initial, :end, :categoryid, :lapseid )');
      $query->execute([
        'initial' => $initial,
        'end' => $end,
        'categoryid' => $categoryid,
        'lapseid' => $lapseid
      ]);

      if($query->rowCount()) return true;

      return false;
    }catch(PDOException $e){
      return false;
    }
  }

  public function setId($id){ $this->id = $id; }
  public function setName($name){ $this->name = $name; }
  public function setShipId($shipid){ $this->shipid = $shipid; }
  public function setCategoryId($categoryid){ $this->categoryid = $categoryid; }
  public function setInitial($initial){ $this->initial = $initial; }
  public function setEnd($end){ $this->end = $end; }
  public function setUserId($userid){ $this->userid = $userid; }

  public function getId(){ return $this->id;}
  public function getName(){ return $this->name; }
  public function getShipId(){ return $this->shipid; }
  public function getCategoryId(){ return $this->categoryid; }
  public function getInitial(){ return $this->initial; }
  public function getEnd(){ return $this->end; }
  public function getUserId(){ return $this->userid; }
}

?>