<?php

require_once '../config/config.php';
require_once '../libs/database.php';
require_once '../libs/model.php';

$db = new Model();

$error = false;
$taskid;
$taskstatus;

if(isset($_POST['task'])){
  $taskdata = $_POST['task'];
  $task = json_decode($taskdata);
  
  foreach($task as $data){
    $taskid = $data->id;
    $taskstatus = $data->status;
  }
  
  $query = $db->prepare('UPDATE tasks SET status_id = :status WHERE id = :id');
  $query->execute(['status' => $taskstatus, 'id' => $taskid]);
}

?>