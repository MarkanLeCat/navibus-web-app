<?php

class LoginModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function login($username, $password){
        // insertar datos en la BD
        error_log("login: inicio");
        try{
            //$query = $this->db->connect()->prepare('SELECT * FROM users WHERE username = :username');
            $query = $this->prepare('SELECT * FROM users WHERE username = :username');
            $query->execute(['username' => $username]);
            
            if($query->rowCount() == 1){
                $item = $query->fetch(PDO::FETCH_ASSOC); 

                $user = new UserModel();
                $user->from($item);

                error_log('LoginModel::login: id del usuario '.$user->getId());

                if(password_verify($password, $user->getPassword())){
                    error_log('LoginModel::login: los datos concuerdan');
                    if($user->getStatus() == 0){
                        error_log('LoginModel::login: usuario inactivo');
                        return NULL;
                    }else{
                        error_log('LoginModel::login: completado');
                        return $user;
                    }
                }else{
                    return NULL;
                }
            }
        }catch(PDOException $e){
            return NULL;
        }
    }

    

}

?>