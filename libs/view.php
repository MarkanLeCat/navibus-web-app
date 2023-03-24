<?php

//Clase base que contendrá métodos y atributos genéricos para todas las vistas

class View{

    function __construct(){
    }

    //Función que presenta en pantalla una vista, tomará como parámetros el nombre del archivo a imprimir y data
    function render($nombre, $data = []){
        //Se asigna el valor de data a una variable "d" de la clase
        $this->d = $data;
        
        $this->handleMessages();
        
        //Se manda a llamar al archivo que contiene la vista
        require 'views/' . $nombre . '.php';
    }
    
    private function handleMessages(){
        if(isset($_GET['success']) && isset($_GET['error'])){
            // no se muestra nada porque no puede haber un error y success al mismo tiempo
        }else if(isset($_GET['success'])){
            
            $this->handleSuccess();
        }else if(isset($_GET['error'])){
            $this->handleError();
        }
    }

    private function handleError(){
        if(isset($_GET['error'])){
            $hash = $_GET['error'];
            $errors = new Errors();

            if($errors->existsKey($hash)){
                error_log('View::handleError() existsKey =>' . $errors->get($hash));
                $this->d['error'] = $errors->get($hash);
            }else{
                $this->d['error'] = NULL;
            }
        }
    }


    private function handleSuccess(){
        if(isset($_GET['success'])){
            $hash = $_GET['success'];
            $success = new Success();

            if($success->existsKey($hash)){
                error_log('View::handleError() existsKey =>' . $success->existsKey($hash));
                $this->d['success'] = $success->get($hash);
            }else{
                $this->d['success'] = NULL;
            }
        }
    }

    public function showMessages(){
        $this->showError();
        $this->showSuccess();
    }

    public function showError(){
        if(array_key_exists('error', $this->d)){
            echo '<div class="error" hidden>'.$this->d['error'].'</div>';
        }
    }

    public function showSuccess(){
        if(array_key_exists('success', $this->d)){
            echo '<div class="success" hidden>'.$this->d['success'].'</div>';
        }
    }
}

?>