<?php

//Clase para el controlador del nivel de usuario Operador
class Supervisor extends SessionController{

  //Variable para almacenar los datos del usuario
  private $user;

  //Constructor de la clase
  function __construct(){
    //Se heredan los métodos de la clase SessionController
    parent::__construct();

    //Se obtienen los datos del usuario
    $this->user = $this->getUserSessionData();
    error_log("Supervisor::constructor() ");
  }

  //Método para renderizar la vista del panel de tareas
  function render(){
    error_log("Supervisor::render() ");
    //Se obtienen las tareas del usuario
    $tasks = $this->getTasks();
    $users = $this->getUsers();
    $lapses = $this->getLapses();
    $tView = true;

    //Se renderiza la vista del panel de tareas, enviando los datos del usuario y las tareas
    $this->view->render('supervisor/index', [
      'user' => $this->user,
      'tasks' => $tasks,
      'users' => $users,
      'lapses' => $lapses,
      'tView' => $tView
    ]);
  }

  //Método para renderizar la vista de lapsos
  function lapses(){
    error_log("Supervisor::lapses() ");
    //Se obtienen los lapsos del usuario
    $lapsesTasksModel = new JoinLapsesTasksModel();
    $users = $this->getUsers();
    $lapses = $this->getLapses();
    $lView = true;

    //Se renderiza la vista de lapsos, enviando los datos del usuario y los lapsos
    $this->view->render('supervisor/lapses', [
      'user' => $this->user,
      'tasks' => $lapsesTasksModel,
      'users' => $users,
      'lapses' => $lapses,
      'lView' => $lView
    ]);
  }

  //Método para renderizar la vista de perfil
  function profile(){
    error_log("Supervisor::profile() ");
    //Se renderiza la vista de perfil, enviando los datos del usuario
    $this->view->render('supervisor/profile', [
      'user' => $this->user
    ]);
  }

  //Método para recuperar todas las tareas del usuario
  private function getTasks(){
    error_log("Supervisor::getTasks() id = " . $this->user->getId());
    $tasks = new JoinTasksLapsesModel();
    return $tasks->getAllTasksByUserId($this->user->getId());
  }

  //Método para recuperar todos los lapsos
  private function getLapses(){
    error_log("Supervisor::getLapses()");
    $lapses = new JoinLapsesTasksModel();
    return $lapses->getAllLapses();
  }

  //Método para recuperar todos los usuarios del sistema
  private function getUsers(){
    error_log("Supervisor::getUsers()");
    $users = new UserModel();
    return $users->getAll();
  }

  //Método para actualizar los datos del usuario
  function updateUserData(){
    error_log("Supervisor::updateUserData() ");
    //Se verifica que se hayan recibido los datos del formulario
    if(!$this->existPOST(['firstname', 'lastname', 'phone'])){
      $this->redirect('supervisor/profile', ['error' => Errors::ERROR_SUPERVISOR_UPDATE]);
      return;
    }

    $firstname = $this->getPost('firstname');
    $lastname = $this->getPost('lastname');
    $phone = $this->getPost('phone');

    if(empty($firstname) || empty($lastname) || empty($phone)){
      $this->redirect('supervisor/profile', ['error' => Errors::ERROR_SUPERVISOR_UPDATE_EMPTY]);
      return;
    }

    $this->user->setName($firstname);
    $this->user->setLastname($lastname);
    $this->user->setPhone($phone);

    if($this->user->update()){
      $this->redirect('supervisor/profile', ['success' => Success::SUCCESS_SUPERVISOR_UPDATE]);
    }else{
      //error
    }
  }

  //Función para actualizar la contraseña del usuario
  function updateUserPassword(){
    error_log("Supervisor::updateUserPassword() ");

    if(!$this->existPOST(['current-password', 'new-password', 'confirm-password'])){
      $this->redirect('supervisor/profile', ['error' => Errors::ERROR_SUPERVISOR_UPDATEPASSWORD]);
      return;
    }

    $current = $this->getPost('current-password');
    $new     = $this->getPost('new-password');
    $confirm = $this->getPost('confirm-password');

    if(empty($current) || empty($new) || empty($confirm)){
      $this->redirect('supervisor/profile', ['error' => Errors::ERROR_SUPERVISOR_UPDATEPASSWORD_EMPTY]);
      return;
    }

    if($current === $new){
      $this->redirect('supervisor/profile', ['error' => Errors::ERROR_USER_UPDATEPASSWORD_CANNOTTHESAME]);
      return;
    }

    //Comprobar que el usuario haya escrito bien la contraseña
    if($new !== $confirm){
      $this->redirect('supervisor/profile', ['error' => Errors::ERROR_SUPERVISOR_UPDATEPASSWORD_ISNOTTHESAME]);
      return;
    }

    //Validar que la contraseña posea mínimo 8 caracteres, una mayúscula, una minúscula, un número y un caracter especial
    if(!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,16}$/', $new)){
      $this->redirect('supervisor/profile', ['error' => Errors::ERROR_SUPERVISOR_UPDATEPASSWORD_WEEK]);
      return;
    }

    //validar que el current es el mismo que el guardado
    $newHash = $this->model->comparePasswords($current, $this->user->getId());
    if($newHash != NULL){
      if($newHash){
        //si lo es actualizar con el nuevo
        $this->user->setPassword($new, true);
        
        if($this->user->update()){
          error_log("Supervisor::updateUserPassword-> Contraseña actualizada correctamente");
          $this->redirect('supervisor/profile', ['success' => Success::SUCCESS_SUPERVISOR_UPDATEPASSWORD]);
        }else{
          //error
          $this->redirect('supervisor/profile', ['error' => Errors::ERROR_SUPERVISOR_UPDATEPASSWORD]);
        }
      }else{
        error_log("Supervisor::updateUserPassword-> La contraseña actual no es correcta");
        $this->redirect('supervisor/profile', ['error' => Errors::ERROR_SUPERVISOR_UPDATEPASSWORD_OLDWRONG]);
        return;
      }
    }else{
      $this->redirect('supervisor/profile', ['error' => Errors::ERROR_SUPERVISOR_UPDATEPASSWORD_OLDWRONG]);
      return;
    }
  }


}

?>