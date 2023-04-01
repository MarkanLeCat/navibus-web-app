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
    
    $oView = false;
    $uView = false;
    $lView = false;
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
  function createDBBackup(){
    $db = new Database();
    $db->exportDB();
  }

  //método para importar un backup de la base de datos
  function importDBBackup(){
    if(isset($_POST["import"])){
      if($_FILES['database']['name'] != ''){
        $array = explode('.', $_FILES['database']['name']);
        $extension = end($array);
        if($extension == 'sql'){
          $db = new Database();
          $pdo = $db->connect();
          $templine = '';
          $lines = file($_FILES["database"]["tmp_name"]);
          foreach($lines as $line){
              if(substr($line, 0, 2) == '--' || $line == ''){
                  continue;
              }
              $templine .= $line;
              if(substr(trim($line), -1, 1) == ';'){
                  $pdo->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . $pdo->error . '<br /><br />');
                  $templine = '';
              }
          }
        }
      }
    }
  }

  //Función para crear un nuevo usuario
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
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_NEWUSER_EXISTS]);
      //return;
    } else if($newUser->existsEmail($email)){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_NEWUSER_EXISTSEMAIL]);
      //return;
    } else if($newUser->save()){
      $this->redirect('admin', ['success' => Success::SUCCESS_ADMIN_NEWUSER]);
    }else{
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_NEWUSER]);
    }
  }

  //Función para actualizar los datos del admin
  function updateAdminData(){
    error_log("Admin::updateAdminData() ");
    //Se verifica que se hayan recibido los datos del formulario
    if(!$this->existPOST(['firstname', 'lastname', 'phone'])){
      $this->redirect('admin/profile', ['error' => Errors::ERROR_ADMIN_UPDATE]);
      return;
    }

    $firstname = $this->getPost('firstname');
    $lastname = $this->getPost('lastname');
    $phone = $this->getPost('phone');

    if(empty($firstname) || empty($lastname) || empty($phone)){
      $this->redirect('admin/profile', ['error' => Errors::ERROR_ADMIN_NEWUSER_EMPTY]);
      return;
    }

    $this->user->setName($firstname);
    $this->user->setLastname($lastname);
    $this->user->setPhone($phone);

    if($this->user->update()){
      $this->redirect('admin/profile', ['success' => Success::SUCCESS_ADMIN_UPDATE]);
    }else{
      //error
    }
  }

  //Método para actualizar los datos de un usuario
  function updateUserData(){
    error_log("Admin::updateUserData() ");
    //Se verifica que se hayan recibido los datos del formulario
    if(!$this->existPOST(['id', 'username', 'email', 'firstname', 'lastname', 'phone'])){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_UPDATEUSER]);
      return;
    }

    $userid = $this->getPost('id');
    $username = $this->getPost('username');
    $email = $this->getPost('email');
    $firstname = $this->getPost('firstname');
    $lastname = $this->getPost('lastname');
    $phone = $this->getPost('phone');

    if(empty($userid) || empty($username) || empty($email) || empty($firstname) || empty($lastname) || empty($phone)){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_UPDATEUSER_EMPTY]);
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

    //Validar que el nombre no excenda los 20 caractéres
    if(strlen($firstname) > 20){
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

    //Validar que el correo sea válido
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_NEWUSER_INVALIDEMAIL]);
      return;
    }

    $user = $this->getUser($userid);

    $user->setUsername($username);
    $user->setEmail($email);
    $user->setName($firstname);
    $user->setLastname($lastname);
    $user->setPhone($phone);

    if($user->existsExcept($userid, $username)){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_NEWUSER_EXISTS]);
      //return;
    } else if($user->existsEmailExcept($userid, $email)){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_NEWUSER_EXISTSEMAIL]);
      //return;
    } else if($user->updateForAdmin()){
      $this->redirect('admin', ['success' => Success::SUCCESS_ADMIN_UPDATEUSER]);
      //return;
    }else{
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_UPDATEUSER]);
    }
  }

  //Función para actualizar el status de un usuario
  function updateUserStatus(){
    error_log("Admin::updateUserStatus() ");
    //Se verifica que se hayan recibido los datos del formulario
    if(!$this->existPOST(['id'])){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_UPDATEADTIONALUSER]);
      return;
    }

    $userid = $this->getPost('id');

    if(empty($userid)){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_UPDATEADTIONALUSER_EMPTY]);
      return;
    }

    $user = $this->getUser($userid);

    if($user->getStatus() == 1){
      $user->setStatus(0);
    }else{
      $user->setStatus(1);
    }

    if($user->updateStatus()){
      if($user->getStatus() == 1){
        $this->redirect('admin', ['success' => Success::SUCCESS_ADMIN_ENABLEUSER]);
      }else{
        $this->redirect('admin', ['success' => Success::SUCCESS_ADMIN_DISABLEUSER]);
      }
    }else{
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_UPDATEUSER]);
    }
  }

  //Función para actualizar los datos adicionales del usuario
  function updateUserAditionalData(){
    error_log("Admin::updateUserAditionalData() ");
    //Se verifica que se hayan recibido los datos del formulario
    if(!$this->existPOST(['id', 'position', 'role'])){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_UPDATEADTIONALUSER]);
      return;
    }

    $userid = $this->getPost('id');
    $position = $this->getPost('position');
    $role = $this->getPost('role');

    if(empty($userid) || empty($position) || empty($role)){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_UPDATEADTIONALUSER_EMPTY]);
      return;
    }
    
    //Validar que el usernameno excenda los 20 caractéres
    if(strlen($position) > 30){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_UPDATEADTIONALUSER_POSITIONLENGTH]);
      return;
    }

    $user = $this->getUser($userid);

    $user->setPosition($position);
    $user->setRole($role);

    if($user->updateForAdmin()){
      $this->redirect('admin', ['success' => Success::SUCCESS_ADMIN_UPDATEADITIONALUSER]);
      //return;
    }else{
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_UPDATEADTIONALUSER]);
    }
  }

  //Función para actualizar la contraseña del usuario
  function updateUserPassword(){
    error_log("Admin::updateUserPassword() ");

    if(!$this->existPOST(['id', 'new-password', 'confirm-password'])){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_UPDATEUSERPASSWORD]);
      return;
    }

    $userid = $this->getPost('id');
    $new     = $this->getPost('new-password');
    $confirm = $this->getPost('confirm-password');

    if(empty($userid) || empty($new) || empty($confirm)){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_UPDATEUSERPASSWORD_EMPTY]);
      return;
    }

    //Comprobar que el usuario haya escrito bien la contraseña
    if($new !== $confirm){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_UPDATEUSERPASSWORD_ISNOTTHESAME]);
      return;
    }

    //Validar que la contraseña posea mínimo 8 caracteres, una mayúscula, una minúscula, un número y un caracter especial
    if(!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,16}$/', $new)){
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_UPDATEUSERPASSWORD_WEEKPASSWORD]);
      return;
    }

    $user = $this->getUser($userid);
    $user->setPassword($new, true);
    
    if($user->updateForAdmin()){
      error_log("Admin::updateUserPassword-> Contraseña actualizada correctamente");
      $this->redirect('admin', ['success' => Success::SUCCESS_ADMIN_UPDATEUSERPASSWORD]);
    }else{
      //error
      $this->redirect('admin', ['error' => Errors::ERROR_ADMIN_UPDATEUSERPASSWORD]);
    }
  }
}
?>