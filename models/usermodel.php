<?php

class UserModel extends Model{

    private $id;
    private $role;
    private $status;
    private $username;
    private $password;
    private $email;
    private $name;
    private $lastname;
    private $position;
    private $phone;

    public function __construct(){
        parent::__construct();

        $this->role = '';
        $this->username = '';
        $this->password = '';
        $this->email = '';
        $this->name = '';
        $this->lastname = '';
        $this->position = '';
        $this->phone = '';
    }

    function updatePassword($new, $iduser){
        try{
            $hash = password_hash($new, PASSWORD_DEFAULT);
            $query = $this->db->connect()->prepare('UPDATE users SET password = :val WHERE id = :id');
            $query->execute(['val' => $hash, 'id' => $iduser]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        
        }catch(PDOException $e){
            return NULL;
        }
    }

    function comparePasswords($current, $userid){
        try{
            $query = $this->db->connect()->prepare('SELECT id, password FROM USERS WHERE id = :id');
            $query->execute(['id' => $userid]);
            
            if($row = $query->fetch(PDO::FETCH_ASSOC)) return password_verify($current, $row['password']);

            error_log('USERMODEL::comparePasswords-> No se encontró el usuario');
            return false;
        }catch(PDOException $e){
            error_log('USERMODEL::comparePasswords-> PDOException');
            return NULL;
        }
    }

    public function save(){
        try{
            $query = $this->prepare('INSERT INTO users (role_id, username, password, email, firstname, lastname, position, phone) VALUES(:role, :username, :password, :email, :firstname, :lastname, :position, :phone)');
            $query->execute([
                'role'      => $this->role,
                'username'  => $this->username, 
                'password'  => $this->password,
                'email'     => $this->email,
                'firstname' => $this->name,
                'lastname'  => $this->lastname,
                'position'  => $this->position,
                'phone'     => $this->phone
                ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    } 

    //Recupera todos los usuarios de la base de datos para el admin
    public function getAllForAdmin(){
        $items = [];

        try{
            $query = $this->query('SELECT * FROM users');

            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new UserModel();
                $item->setId($p['id']);
                $item->setRole($p['role_id']);
                $item->setStatus($p['status']);
                $item->setUsername($p['username']);
                $item->setPassword($p['password'], false);
                $item->setEmail($p['email']);
                $item->setName($p['firstname']);
                $item->setLastname($p['lastname']);
                $item->setPosition($p['position']);
                $item->setPhone($p['phone']);

                array_push($items, $item);
            }
            return $items;


        }catch(PDOException $e){
            echo $e;
        }
    }
    
    //Recupera solo los usuarios con status = 1, es decir que están habilitados
    public function getAll(){
        $items = [];

        try{
            $query = $this->query('SELECT * FROM users WHERE status = 1');

            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new UserModel();
                $item->setId($p['id']);
                $item->setRole($p['role_id']);
                $item->setUsername($p['username']);
                $item->setPassword($p['password'], false);
                $item->setEmail($p['email']);
                $item->setName($p['firstname']);
                $item->setLastname($p['lastname']);
                $item->setPosition($p['position']);
                $item->setPhone($p['phone']);

                array_push($items, $item);
            }
            return $items;


        }catch(PDOException $e){
            echo $e;
        }
    }

    //Retorna un usuario cualquiera para el admin
    public function getForAdmin($id){
        try{
            $query = $this->prepare('SELECT * FROM users WHERE id = :id');
            $query->execute([ 'id' => $id]);
            $res = $query->fetch(PDO::FETCH_ASSOC);
            error_log("UserModel::getForAdmin() -> " . print($res));

            $user = new UserModel();
            $user->from($res);

            return $user;
        }catch(PDOException $e){
            return array('success' => false, 'error' => $e);
        }
    }
    
    //Retorna únicamente usuarius habilitados
    public function get($id){
        try{
            $query = $this->prepare('SELECT * FROM users WHERE id = :id AND status = 1');
            $query->execute([ 'id' => $id]);
            $user = $query->fetch(PDO::FETCH_ASSOC);

            $this->id = $user['id'];
            $this->role = $user['role_id'];
            $this->username = $user['username'];
            $this->password = $user['password'];
            $this->email = $user['email'];
            $this->name = $user['firstname'];
            $this->lastname = $user['lastname'];
            $this->position = $user['position'];
            $this->phone = $user['phone'];

            return $this;
        }catch(PDOException $e){
            return false;
        }
    }

    /* public function delete($id){
        try{
            $query = $this->prepare('DELETE FROM users WHERE id = :id');
            $query->execute([ 'id' => $id]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    } */

    function updateStatus(){
        try{
            $query = $this->prepare('UPDATE users SET status = :val WHERE id = :id');
            $query->execute([
                'val' => $this->status,
                'id' => $this->id
            ]);

            return true;        
        }catch(PDOException $e){
            return NULL;
        }
    }

    public function updateForAdmin(){
        try{
            $query = $this->prepare('UPDATE users SET role_id = :role, status = :status, username = :username, password = :password, email = :email, firstname = :name, lastname = :lastname, position = :position, phone = :phone WHERE id = :id');
            $query->execute([
                'id'        => $this->id,
                'role'      => $this->role,
                'status'    => $this->status,
                'username'  => $this->username, 
                'password'  => $this->password,
                'email'     => $this->email,
                'name'      => $this->name,
                'lastname'  => $this->lastname,
                'position'  => $this->position,
                'phone'     => $this->phone
                ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }
    
    public function update(){
        try{
            $query = $this->prepare('UPDATE users SET username = :username, password = :password, email = :email, firstname = :name, lastname = :lastname, position = :position, phone = :phone WHERE id = :id');
            $query->execute([
                'id'        => $this->id,
                'username'  => $this->username, 
                'password'  => $this->password,
                'email'     => $this->email,
                'name'      => $this->name,
                'lastname'  => $this->lastname,
                'position'  => $this->position,
                'phone'     => $this->phone
                ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function exists($username){
        try{
            $query = $this->prepare('SELECT username FROM users WHERE username = :username');
            $query->execute( ['username' => $username]);
            
            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }
    
    public function existsExcept($id, $username){
        try{
            $query = $this->prepare('SELECT id, username FROM users WHERE username = :username AND id != :id');
            $query->execute([
                'username' => $username,
                'id' => $id
            ]);
            
            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }
    
    public function existsEmail($email){
        try{
            $query = $this->prepare('SELECT email FROM users WHERE email = :email');
            $query->execute( ['email' => $email]);
            
            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }
    
    public function existsEmailExcept($id, $email){
        try{
            $query = $this->prepare('SELECT id, email FROM users WHERE email = :email AND id != :id');
            $query->execute([
                'email' => $email,
                'id' => $id
            ]);
            
            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function from($array){
        $this->id = $array['id'];
        $this->role = $array['role_id'];
        $this->status = $array['status'];
        $this->username = $array['username'];
        $this->password = $array['password'];
        $this->email = $array['email'];
        $this->name = $array['firstname'];
        $this->lastname = $array['lastname'];
        $this->position = $array['position'];
        $this->phone = $array['phone'];
    }

    private function getHashedPassword($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }
    
    public function setId($id){             $this->id = $id;}
    public function setRole($role){         $this->role = $role;}
    public function setStatus($status){     $this->status = $status;}
    public function setUsername($username){ $this->username = $username;}
    public function setPassword($password, $hash = true){ 
        if($hash){
            $this->password = $this->getHashedPassword($password);
        }else{
            $this->password = $password;
        }
    }
    public function setEmail($email){       $this->email = $email;}
    public function setName($name){         $this->name = $name;}
    public function setLastname($lastname){ $this->lastname = $lastname;}
    public function setPosition($position){ $this->position = $position;}
    public function setPhone($phone){       $this->phone = $phone;}

    public function getId(){        return $this->id;}
    public function getRole(){      return $this->role;}
    public function getStatus(){    return $this->status;}
    public function getUsername(){  return $this->username;}
    public function getPassword(){  return $this->password;}
    public function getEmail(){     return $this->email;}
    public function getName(){      return $this->name;}
    public function getLastname(){  return $this->lastname;}
    public function getPosition(){  return $this->position;}
    public function getPhone(){     return $this->phone;}
}

?>