<?php

//Clase para el controlador del nivel de usuario Operador
class Operator extends SessionController{

  //Variable para almacenar los datos del usuario
  private $user;

  //Constructor de la clase
  function __construct(){
    //Se heredan los métodos de la clase SessionController
    parent::__construct();

    //Se obtienen los datos del usuario
    $this->user = $this->getUserSessionData();
    error_log("OPERATOR::constructor() ");
  }

  //Método para renderizar la vista del panel de tareas
  function render(){
    error_log("OPERATOR::render() ");
    $tasksLapsesModel = new JoinTasksModel();
    //Se obtienen las tareas del usuario
    $tasks = $this->getTasks();
    $tView = true;

    //Se renderiza la vista del panel de tareas, enviando los datos del usuario y las tareas
    $this->view->render('operator/index', [
      'user' => $this->user,
      'tasks' => $tasks,
      'tView' => $tView
    ]);
  }

  //Método para renderizar la vista de lapsos
  function lapses(){
    error_log("OPERATOR::lapses() ");
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
    error_log("OPERATOR::profile() ");
    //Se renderiza la vista de perfil, enviando los datos del usuario
    $this->view->render('operator/profile', [
      'user' => $this->user
    ]);
  }

  //Método para recuperar todas las tareas del usuario
  private function getTasks(){
    error_log("OPERATOR::getTasks() id = " . $this->user->getId());
    $tasks = new JoinTasksModel();
    return $tasks->getAllTasksByUserId($this->user->getId());
  }

  //Método para recuperar todos los lapsos del usuario
  private function getLapses(){
    error_log("OPERATOR::getLapses() id = " . $this->user->getId());
    $lapses = new JoinLapsesTasksModel();
    return $lapses->getAllLapsesByUserId($this->user->getId());
  }

  //Método para actualizar los datos del usuario
  function updateUserData(){
    error_log("OPERATOR::updateUserData() ");
    //Se verifica que se hayan recibido los datos del formulario
    if(!$this->existPOST(['firstname', 'lastname', 'phone'])){
      $this->redirect('operator/profile', ['error' => Errors::ERROR_OPERATOR_UPDATE]);
      return;
    }

    $firstname = $this->getPost('firstname');
    $lastname = $this->getPost('lastname');
    $phone = $this->getPost('phone');

    if(empty($firstname) || empty($lastname) || empty($phone)){
      $this->redirect('operator/profile', ['error' => Errors::ERROR_OPERATOR_UPDATE_EMPTY]);
      return;
    }

    $this->user->setName($firstname);
    $this->user->setLastname($lastname);
    $this->user->setPhone($phone);

    if($this->user->update()){
      $this->redirect('operator/profile', ['success' => Success::SUCCESS_OPERATOR_UPDATE]);
    }else{
      //error
    }
  }

  //Función para actualizar la contraseña del usuario
  function updateUserPassword(){
    error_log("OPERATOR::updateUserPassword() ");

    if(!$this->existPOST(['current-password', 'new-password', 'confirm-password'])){
      $this->redirect('operator/profile', ['error' => Errors::ERROR_OPERATOR_UPDATEPASSWORD]);
      return;
    }

    $current = $this->getPost('current-password');
    $new     = $this->getPost('new-password');
    $confirm = $this->getPost('confirm-password');

    if(empty($current) || empty($new) || empty($confirm)){
      $this->redirect('operator/profile', ['error' => Errors::ERROR_OPERATOR_UPDATEPASSWORD_EMPTY]);
      return;
    }

    if($current === $new){
      $this->redirect('operator/profile', ['error' => Errors::ERROR_USER_UPDATEPASSWORD_CANNOTTHESAME]);
      return;
    }

    //Comprobar que el usuario haya escrito bien la contraseña
    if($new !== $confirm){
      $this->redirect('operator/profile', ['error' => Errors::ERROR_OPERATOR_UPDATEPASSWORD_ISNOTTHESAME]);
      return;
    }

    //Validar que la contraseña posea mínimo 8 caracteres, una mayúscula, una minúscula, un número y un caracter especial
    if(!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,16}$/', $new)){
      $this->redirect('operator/profile', ['error' => Errors::ERROR_OPERATOR_UPDATEPASSWORD_WEEK]);
      return;
    }

    //validar que el current es el mismo que el guardado
    $newHash = $this->model->comparePasswords($current, $this->user->getId());
    if($newHash != NULL){
      if($newHash){
        //si lo es actualizar con el nuevo
        $this->user->setPassword($new, true);
        
        if($this->user->update()){
          error_log("OPERATOR::updateUserPassword-> Contraseña actualizada correctamente");
          $this->redirect('operator/profile', ['success' => Success::SUCCESS_OPERATOR_UPDATEPASSWORD]);
        }else{
          //error
          $this->redirect('operator/profile', ['error' => Errors::ERROR_OPERATOR_UPDATEPASSWORD]);
        }
      }else{
        error_log("OPERATOR::updateUserPassword-> La contraseña actual no es correcta");
        $this->redirect('operator/profile', ['error' => Errors::ERROR_OPERATOR_UPDATEPASSWORD_OLDWRONG]);
        return;
      }
    }else{
      $this->redirect('operator/profile', ['error' => Errors::ERROR_OPERATOR_UPDATEPASSWORD_OLDWRONG]);
      return;
    }
  }


}

?>