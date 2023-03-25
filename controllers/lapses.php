<?php

class Lapses extends SessionController {

  //Variable para almacenar los datos del usuario
  private $user;

  //Constructor de la clase
  function __construct(){
    //Se heredan los métodos de la clase SessionController
    parent::__construct();

    //Se obtienen los datos del usuario
    $this->user = $this->getUserSessionData();
    error_log("Tasks::constructor() ");
  }

  //Método para crear una nueva tarea
  function createTask() {
    error_log("Tasks::createTask() ");
    if(!$this->existPOST(['taskname', 'taskdescription', 'taskcategory', 'tasklapse', 'taskuser', 'taskhours'])){
      error_log("Tasks::createTask() -> No se recibieron los datos de la tarea");
      $this->redirect('supervisor', ['error' => Errors::ERROR_SUPERVISOR_CREATETASK]);
      return;
    }

    $title = $this->getPost('taskname');
    $description = $this->getPost('taskdescription');
    $ship = 1;
    $lapse = $this->getPost('tasklapse');
    $category = $this->getPost('taskcategory');
    $user = $this->getPost('taskuser');
    $hours = $this->getPost('taskhours');
    $status = 1;
    $usercreated = $this->user->getId();

    if(empty($title) || empty($description) || empty($lapse) || empty($category) || empty($user) || empty($hours)){
      error_log("Tasks::createTask() -> No se recibieron los datos de la tarea");
      $this->redirect('supervisor', ['error' => Errors::ERROR_SUPERVISOR_CREATETASK_EMPTY]);
      return;
    }

    //Comprobar que $title no posea más de 40 caracteres
    if(strlen($title) > 100){
      error_log("Tasks::createTask() -> El título de la tarea es demasiado largo");
      $this->redirect('supervisor', ['error' => Errors::ERROR_SUPERVISOR_CREATETASK_TITLETOOLONG]);
      return;
    }

    //Comprobar que $description no posea más de 100 caracteres
    if(strlen($description) > 200){
      error_log("Tasks::createTask() -> La descripción de la tarea es demasiado larga");
      $this->redirect('supervisor', ['error' => Errors::ERROR_SUPERVISOR_CREATETASK_DESCRIPTIONTOOLONG]);
      return;
    }

    $this->model->setTitle($title);
    $this->model->setDescription($description);
    $this->model->setShipId($ship);
    $this->model->setLapseId($lapse);
    $this->model->setCategoryId($category);
    $this->model->setUserId($user);
    $this->model->setHourId($hours);
    $this->model->setStatusId($status);
    $this->model->setUserCreated($usercreated);

    if($this->model->save()){
      error_log("Tasks::createTask() -> Tarea creada");
      $this->redirect('supervisor', ['success' => Success::SUCCESS_SUPERVISOR_CREATETASK]);
      return;
    }else{
      error_log("Tasks::createTask() -> Error al crear la tarea");
      $this->redirect('supervisor', ['error' => Errors::ERROR_SUPERVISOR_CREATETASK]);
      return;
    }

  }

  //Método para actualizar los datos de una tarea
  function updateTask(){
    error_log("Tasks::updateTask() ");
    if(!$this->existPOST(['taskname', 'taskdescription', 'taskcategory', 'tasklapse', 'taskuser', 'taskhours', 'status', 'taskid'])){
      error_log("Tasks::updateTask() -> No se recibieron los datos de la tarea");
      $this->redirect('supervisor', ['error' => Errors::ERROR_SUPERVISOR_UPDATETASK]);
      return;
    }

    $id = $this->getPost('taskid');
    $title = $this->getPost('taskname');
    $description = $this->getPost('taskdescription');
    $status = $this->getPost('status');
    $ship = 1;
    $lapse = $this->getPost('tasklapse');
    $category = $this->getPost('taskcategory');
    $user = $this->getPost('taskuser');
    $hours = $this->getPost('taskhours');
    $usercreated = $this->user->getId();


    if(empty($title) || empty($description) || empty($lapse) || empty($category) || empty($user) || empty($hours) || empty($status) || empty($id)){
      error_log("Tasks::updateTask() -> No se recibieron los datos de la tarea");
      $this->redirect('supervisor', ['error' => Errors::ERROR_SUPERVISOR_UPDATETASK_EMPTY]);
      return;
    }

    //Comprobar que $title no posea más de 40 caracteres
    if(strlen($title) > 100){
      error_log("Tasks::updateTask() -> El título de la tarea es demasiado largo");
      $this->redirect('supervisor', ['error' => Errors::ERROR_SUPERVISOR_UPDATETASK_TITLETOOLONG]);
      return;
    }

    //Comprobar que $description no posea más de 100 caracteres
    if(strlen($description) > 200){
      error_log("Tasks::updateTask() -> La descripción de la tarea es demasiado larga");
      $this->redirect('supervisor', ['error' => Errors::ERROR_SUPERVISOR_UPDATETASK_DESCRIPTIONTOOLONG]);
      return;
    }

    $this->model->setId($id);
    $this->model->setTitle($title);
    $this->model->setDescription($description);
    $this->model->setShipId($ship);
    $this->model->setLapseId($lapse);
    $this->model->setCategoryId($category);
    $this->model->setUserId($user);
    $this->model->setHourId($hours);
    $this->model->setStatusId($status);
    $this->model->setUserCreated($usercreated);

    if($this->model->update()){
      error_log("Tasks::updateTask() -> Tarea creada");
      $this->redirect('supervisor', ['success' => Success::SUCCESS_SUPERVISOR_UPDATETASK]);
      return;
    }else{
      error_log("Tasks::updateTask() -> Error al crear la tarea");
      $this->redirect('supervisor', ['error' => Errors::ERROR_SUPERVISOR_UPDATETASK]);
      return;
    }
  }

  //Función para actualizar el status de una tarea recibiendo el id de la tarea y el status
  function updateStatusFromOperator($id, $status, $error) {
    error_log("Tasks::updateStatusFromOperator() ");
    if ($error){
      error_log("Tasks::updateStatusFromOperator() -> Error en la actualización del status");
      return;
    }
    
    $this->task = $this->model->get($id);
    $this->task->setStatusId($status);

    if($this->model->update()){
      error_log("Tasks::updateStatusFromOperator() -> Status actualizado");
      return;
    }else{
      //error
      error_log("Tasks::updateStatusFromOperator() -> Error al actualizar el status");
      return;
    }
  }
}

?>