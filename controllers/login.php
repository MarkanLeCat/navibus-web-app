
<?php

class Login extends SessionController{

    function __construct(){
        parent::__construct();
    }

    function render(){
        $actual_link = trim("$_SERVER[REQUEST_URI]");
        $url = explode('/', $actual_link);
        $this->view->errorMessage = '';
        $this->view->render('login/index');
    }

    function authenticate(){
        if( $this->existPOST(['username', 'password']) ){
            $username = $this->getPost('username');
            $password = $this->getPost('password');

            //validate data
            if($username == '' || empty($username) || $password == '' || empty($password)){
                error_log('Login::authenticate() vacío');
                $this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE_EMPTY]);
                return;
            }
            // si el login es exitoso regresa solo el ID del usuario
            
            $user = $this->model->login($username, $password);

            if($user != NULL){
                //comprueba que el usuario esté activo
                if($user->getStatus() == 0){
                    error_log('Login::authenticate() usuario inactivo');
                    $this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE_INACTIVE]);
                    return;
                }
                // inicializa el proceso de las sesiones
                error_log('Login::authenticate() pasó');    
                $this->initialize($user);
            }else{
                //error al registrar, que intente de nuevo
                //$this->errorAtLogin('Nombre de usuario y/o password incorrecto');
                error_log('Login::authenticate() username y/o password incorrecto');
                $this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE_DATA]);
                return;
            }
        }else{
            // error, cargar vista con errores
            //$this->errorAtLogin('Error al procesar solicitud');
            error_log('Login::authenticate() error con los parámetros');
            $this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE]);
        }
    }
}

?>