<?php

//Clase para el controlador del nivel de usuario Operador
class Administrative extends SessionController{

  //Variable para almacenar los datos del usuario
  private $user;

  //Constructor de la clase
  function __construct(){
    //Se heredan los métodos de la clase SessionController
    parent::__construct();

    //Se obtienen los datos del usuario
    $this->user = $this->getUserSessionData();
    error_log("Operator::constructor() ");
  }

  //Método para renderizar la vista del panel de tareas
  function render(){
    error_log("Operator::render() ");
    $tasksLapsesModel = new JoinTasksModel();
    //Se obtienen las tareas del usuario
    $tasks = $this->getTasks();
    $tView = true;

    //Se renderiza la vista del panel de tareas, enviando los datos del usuario y las tareas
    $this->view->render('administrative/index', [
      'user' => $this->user,
      'tasks' => $tasks,
      'tView' => $tView
    ]);
  }

  //Método para renderizar la vista de lapsos
  function lapses(){
    error_log("Operator::lapses() ");
    $lapsesTasksModel = new JoinLapsesTasksModel();
    //Se obtienen los lapsos del usuario
    $lapses = $this->getLapses();
    $lView = true;

    //Se renderiza la vista de lapsos, enviando los datos del usuario y los lapsos
    $this->view->render('operator/lapses', [
      'user' => $this->user,
      'lapses' => $lapses,
      'tasks' => $lapsesTasksModel,
      'lView' => $lView
    ]);
  }

  //Método para renderizar la vista de perfil
  function profile(){
    error_log("Operator::profile() ");
    //Se renderiza la vista de perfil, enviando los datos del usuario
    $this->view->render('operator/profile', [
      'user' => $this->user
    ]);
  }

  //Método para recuperar todas las tareas del usuario
  private function getTasks(){
    error_log("Operator::getTasks() id = " . $this->user->getId());
    $tasks = new JoinTasksModel();
    return $tasks->getAllTasksByUserId($this->user->getId());
  }

  //Método para recuperar todos los lapsos del usuario
  private function getLapses(){
    error_log("Operator::getLapses() id = " . $this->user->getId());
    $lapses = new JoinLapsesTasksModel();
    return $lapses->getAllLapsesByUserId($this->user->getId());
  }

  //Método para actualizar los datos del usuario
  function updateUserData(){
    error_log("Operator::updateUserData() ");
    //Se verifica que se hayan recibido los datos del formulario
    if(!$this->existPOST(['email', 'firstname', 'lastname', 'phone'])){
      $this->redirect('operator/profile', ['error' => Errors::ERROR_USER_UPDATE]);
      return;
    }

    $email = $this->getPost('email');
    $firstname = $this->getPost('firstname');
    $lastname = $this->getPost('lastname');
    $phone = $this->getPost('phone');

    if(empty($firstname) || empty($lastname) || empty($email) || empty($phone)){
      $this->redirect('operator/profile', ['error' => Errors::ERROR_USER_UPDATE_EMPTY]);
      return;
    }

    //Valida que el email tenga el formato correcto
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $this->redirect('operator/profile', ['error' => Errors::ERROR_USER_UPDATE_EMAILFORMAT]);
      return;
    }

    $this->user->setEmail($email);
    $this->user->setName($firstname);
    $this->user->setLastname($lastname);
    $this->user->setPhone($phone);

    if($this->user->update()){
      $this->redirect('operator/profile', ['success' => Success::SUCCESS_USER_UPDATE]);
    }else{
      //error
    }
  }

  //Función para actualizar los el nombre del usuario
  /* function updateName(){
    if(!$this->existPOST('name')){
      $this->redirect('user', ['error' => Errors::ERROR_USER_UPDATEBUDGET]);
      return;
    }

    $name = $this->getPost('name');

    if(empty($name)){
      $this->redirect('user', ['error' => Errors::ERROR_USER_UPDATEBUDGET]);
      return;
    }
    
    $this->user->setName($name);
    if($this->user->update()){
      $this->redirect('user', ['success' => Success::SUCCESS_USER_UPDATEBUDGET]);
    }else{
      //error
    }
  } */

  //Función para actualizar el email del usuario
  /* function updateEmail(){
    //Valida que el email exista
    if(!$this->existPOST('email')){
      $this->redirect('user', ['error' => Errors::ERROR_USER_UPDATEEMAIL]);
      return;
    }

    $email = $this->getPost('email');

    //Valida que el email esté vacío
    if(empty($email)){
      $this->redirect('user', ['error' => Errors::ERROR_USER_UPDATEEMAIL]);
      return;
    }
    
    //Valida que el email tenga el formato correcto
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $this->redirect('user', ['error' => Errors::ERROR_USER_UPDATEEMAIL_FORMAT]);
      return;
    }
    
    //Actualiza el email
    $this->user->setEmail($email);
    if($this->user->update()){
      $this->redirect('user', ['success' => Success::SUCCESS_USER_UPDATEEMAIL]);
    }else{
      //error
    }
  } */

  //Función para actualizar la contraseña del usuario
  /* function updatePassword(){
    if(!$this->existPOST(['current_password', 'new_password'])){
      $this->redirect('user', ['error' => Errors::ERROR_USER_UPDATEPASSWORD]);
      return;
    }

    $current = $this->getPost('current_password');
    $new     = $this->getPost('new_password');

    if(empty($current) || empty($new)){
      $this->redirect('user', ['error' => Errors::ERROR_USER_UPDATEPASSWORD_EMPTY]);
      return;
    }

    if($current === $new){
      $this->redirect('user', ['error' => Errors::ERROR_USER_UPDATEPASSWORD_ISNOTTHESAME]);
      return;
    }

    //validar que el current es el mismo que el guardado
    $newHash = $this->model->comparePasswords($current, $this->user->getId());
    if($newHash != NULL){
      //si lo es actualizar con el nuevo
      $this->user->setPassword($new, true);
      
      if($this->user->update()){
        $this->redirect('user', ['success' => Success::SUCCESS_USER_UPDATEPASSWORD]);
      }else{
        //error
        $this->redirect('user', ['error' => Errors::ERROR_USER_UPDATEPASSWORD]);
      }
    }else{
      $this->redirect('user', ['error' => Errors::ERROR_USER_UPDATEPASSWORD]);
      return;
    }
  } */


}

?>