<?php

class Admin extends SessionController{

  //Variable para almacenar los datos del usuario
  private $user;

  //Constructor de la clase
  function __construct(){
    //Se heredan los métodos de la clase SessionController
    parent::__construct();

    //Se obtienen los datos del usuario
    $this->user = $this->getUserSessionData();
    error_log("Admin::constructor() ");
  }

    //Método para renderizar la vista del panel de tareas
  function render(){
    error_log("Admin::render() ");
    $users = $this->getUsers();
    $uView = true;
    $lView = false;
    $oView = false;

    //Se renderiza la vista del panel de usuarios
    $this->view->render('admin/index', [
      'user' => $this->user,
      'users' => $users,
      'uView' => $uView,
      'lView' => $lView,
      'oView' => $oView
    ]);
  }

  //Método para renderizar la vista de lapsos y tareas
  function lapses(){
    error_log("Admin::lapses() ");
    //Se obtienen los lapsos del usuario
    $lapsesTasksModel = new JoinLapsesModel();
    $users = $this->getUsers();
    $lapses = $this->getLapses();
    $lView = true;
    $uView = false;
    $oView = false;

    //Se renderiza la vista de lapsos, enviando los datos del usuario y los lapsos
    $this->view->render('admin/lapses', [
      'user' => $this->user,
      'tasks' => $lapsesTasksModel,
      'users' => $users,
      'lapses' => $lapses,
      'uView' => $uView,
      'lView' => $lView,
      'oView' => $oView
    ]);
  }

  //Método para renderizar la vista de opciones
  function options(){
    error_log("Admin::options() ");
    $oView = true;
    $uView = false;
    $lView = false;

    //Se renderiza la vista de opciones, enviando los datos del usuario
    $this->view->render('admin/options', [
      'user' => $this->user,
      'uView' => $uView,
      'lView' => $lView,
      'oView' => $oView
    ]);
  }

  //Método para renderizar la vista de perfil
  function profile(){
    error_log("Admin::profile() ");
    
    $lView = false;
    $tView = false;
    //Se renderiza la vista de perfil, enviando los datos del usuario
    $this->view->render('admin/profile', [
      'user' => $this->user,
      'uView' => $uView,
      'lView' => $lView,
      'oView' => $oView
    ]);
  }
  
  //Método para renderizar la vista del perfil de otro usuario
  function userProfile(){
    error_log("Admin::userProfile() ");
    if(!$this->existPOST('id')){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_USERPROFILE_NOTFOUND]);
      return;
    }
    $userid = $this->getPost('id');
    
    $user = $this->getUser($userid);
    $uView = false;
    $lView = false;
    $oView = false;
    //Se renderiza la vista de perfil, enviando los datos del usuario
    $this->view->render('admin/userProfile', [
      'user' => $this->user,
      'editUser' => $user,
      'uView' => $uView,
      'lView' => $lView,
      'oView' => $oView
    ]);
  }

  //Método para recuperar todas las tareas del usuario
  private function getTasks(){
    error_log("Admin::getTasks() id = " . $this->user->getId());
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
    return $users->getAllForAdmin();
  }
  
  //Método para recuperar el usuario a editar
  private function getUser($userid){
    error_log("Admin::getUser()");
    $user = new UserModel();
    return $user->getForAdmin($userid);
  }

  //método para exportar la base de datos
  function export(){
    $db = new Database();
    $db->export();
  }

  //método para importar la base de datos
  function import(){
    $db = new Database();
    $db->import();
  }

  function createUser(){
    error_log("Admin::createUser() ");
    if (!$this->existPOST('userfirstname', 'userlastname', 'userrole', 'username', 'userpassword', 'useremail', 'userposition', 'userphone')) {
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_NEWUSER]);
      return;
    }

    $role = $this->getPost('userrole');
    $username = $this->getPost('username');
    $password = $this->getPost('userpassword');
    $email = $this->getPost('useremail');
    $name = $this->getPost('userfirstname');
    $lastname = $this->getPost('userlastname');
    $position = $this->getPost('userposition');
    $phone = $this->getPost('userphone');
    
    //Validar que los datos no estén vacíos
    if(empty($name) || empty($lastname) || empty($role) || empty($username) || empty($password) || empty($email) || empty($position) || empty($phone)){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_NEWUSER_EMPTY]);
      return;
    }

    //Validar que el usernameno excenda los 20 caractéres
    if(strlen($username) > 20){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_NEWUSER_USERNAMELENGTH]);
      return;
    }
    
    //Validar que el email no excenda los 50 caractéres
    if(strlen($email) > 50){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_NEWUSER_EMAILLENGTH]);
      return;
    }

    //Validar que el cargo no excenda los 30 caractéres
    if(strlen($position) > 30){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_NEWUSER_POSITIONLENGTH]);
      return;
    }

    //Validar que el nombre no excenda los 20 caractéres
    if(strlen($name) > 20){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_NEWUSER_NAMELENGTH]);
      return;
    }

    //Validar que el apellido no excenda los 20 caractéres
    if(strlen($lastname) > 20){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_NEWUSER_LASTNAMELENGTH]);
      return;
    }

    //Validar que el teléfono no excenda los 20 caractéres
    if(strlen($phone) > 20){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_NEWUSER_PHONELENGTH]);
      return;
    }

    //Validar que la contraseña posea mínimo 8 caracteres, una mayúscula, una minúscula, un número y un caracter especial
    if(!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,16}$/', $password)){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_NEWUSER_PASSWEEK]);
      return;
    }

    //Validar que el correo sea válido
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_NEWUSER_INVALIDEMAIL]);
      return;
    }

    $newUser = new UserModel();
    $newUser->setRole($role);
    $newUser->setUsername($username);
    $newUser->setPassword($password);
    $newUser->setEmail($email);
    $newUser->setName($name);
    $newUser->setLastname($lastname);
    $newUser->setPosition($position);
    $newUser->setPhone($phone);
    
    if($newUser->exists($username)){
      //$this->errorAtSignup('Error al registrar el usuario. Elige un nombre de usuario diferente');
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_NEWUSER_EXISTS]);
      //return;
    }else if($newUser->save()){
      //$this->view->render('login/index');
      $this->redirect('admin', ['success' => Success::SUCCESS_ADMIN_NEWUSER]);
    }else{
      /* $this->errorAtSignup('Error al registrar el usuario. Inténtalo más tarde');
      return; */
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_NEWUSER]);
    }
}

}
?>