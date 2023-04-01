<?php

class Administrative extends SessionController{

  //Variable para almacenar los datos del usuario
  private $user;

  //Constructor de la clase
  function __construct(){
    //Se heredan los métodos de la clase SessionController
    parent::__construct();

    //Se obtienen los datos del usuario
    $this->user = $this->getUserSessionData();
    error_log("Administrative::constructor() ");
  }

    //Método para renderizar la vista del panel de tareas
  function render(){
    error_log("Administrative::render() ");
    $stats = new JoinStatsModel();
    $dView = true;

    //Se renderiza la vista del panel de usuarios
    $this->view->render('administrative/index', [
      'user' => $this->user,
      'stats' => $stats,
      'dView' => $dView
    ]);
  }

  //Método para renderizar la vista de perfil
  function profile(){
    error_log("Administrative::profile() ");
    
    $dView = false;
    //Se renderiza la vista de perfil, enviando los datos del usuario
    $this->view->render('administrative/profile', [
      'user' => $this->user,
      'dView' => $dView
    ]);
  }

  //Método para recuperar todas las tareas del usuario
  private function getTasks(){
    error_log("administrative::getTasks() id = " . $this->user->getId());
    $tasks = new JoinTasksModel();
    return $tasks->getAllTasksByUserId($this->user->getId());
  }

  //Método para recuperar todos los lapsos
  private function getLapses(){
    error_log("Admin::getLapses()");
    $lapses = new JoinLapsesModel();
    return $lapses->getAllLapses();
  }

  //Método para recuperar todos los usuarios del sistema
  private function getUsers(){
    error_log("Admin::getUsers()");
    $users = new UserModel();
    return $users->getAll();
  }

  //Método para actualizar los datos del usuario
  function updateUserData(){
    error_log("administrative::updateUserData() ");
    //Se verifica que se hayan recibido los datos del formulario
    if(!$this->existPOST(['firstname', 'lastname', 'phone'])){
      $this->redirect('administrative/profile', ['error' => Errors::ERROR_SUPERVISOR_UPDATE]);
      return;
    }

    $firstname = $this->getPost('firstname');
    $lastname = $this->getPost('lastname');
    $phone = $this->getPost('phone');

    if(empty($firstname) || empty($lastname) || empty($phone)){
      $this->redirect('administrative/profile', ['error' => Errors::ERROR_SUPERVISOR_UPDATE_EMPTY]);
      return;
    }

    $this->user->setName($firstname);
    $this->user->setLastname($lastname);
    $this->user->setPhone($phone);

    if($this->user->update()){
      $this->redirect('administrative/profile', ['success' => Success::SUCCESS_SUPERVISOR_UPDATE]);
    }else{
      //error
    }
  }

  //Función para actualizar la contraseña del usuario
  function updateUserPassword(){
    error_log("administrative::updateUserPassword() ");

    if(!$this->existPOST(['current-password', 'new-password', 'confirm-password'])){
      $this->redirect('administrative/profile', ['error' => Errors::ERROR_SUPERVISOR_UPDATEPASSWORD]);
      return;
    }

    $current = $this->getPost('current-password');
    $new     = $this->getPost('new-password');
    $confirm = $this->getPost('confirm-password');

    if(empty($current) || empty($new) || empty($confirm)){
      $this->redirect('administrative/profile', ['error' => Errors::ERROR_SUPERVISOR_UPDATEPASSWORD_EMPTY]);
      return;
    }

    if($current === $new){
      $this->redirect('administrative/profile', ['error' => Errors::ERROR_USER_UPDATEPASSWORD_CANNOTTHESAME]);
      return;
    }

    //Comprobar que el usuario haya escrito bien la contraseña
    if($new !== $confirm){
      $this->redirect('administrative/profile', ['error' => Errors::ERROR_SUPERVISOR_UPDATEPASSWORD_ISNOTTHESAME]);
      return;
    }

    //Validar que la contraseña posea mínimo 8 caracteres, una mayúscula, una minúscula, un número y un caracter especial
    if(!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,16}$/', $new)){
      $this->redirect('administrative/profile', ['error' => Errors::ERROR_SUPERVISOR_UPDATEPASSWORD_WEEK]);
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
          $this->redirect('administrative/profile', ['success' => Success::SUCCESS_SUPERVISOR_UPDATEPASSWORD]);
        }else{
          //error
          $this->redirect('administrative/profile', ['error' => Errors::ERROR_SUPERVISOR_UPDATEPASSWORD]);
        }
      }else{
        error_log("Supervisor::updateUserPassword-> La contraseña actual no es correcta");
        $this->redirect('administrative/profile', ['error' => Errors::ERROR_SUPERVISOR_UPDATEPASSWORD_OLDWRONG]);
        return;
      }
    }else{
      $this->redirect('administrative/profile', ['error' => Errors::ERROR_SUPERVISOR_UPDATEPASSWORD_OLDWRONG]);
      return;
    }
  }
}
?>