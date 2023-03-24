<?php

//Clase base que contendrá métodos y atributos genéricos para todos los controladores

class Controller{

    function __construct(){
        //Se crea un objeto del tipo Vista en la variable de la clase "view"
        $this->view = new View();
    }

    //funcion que permitirá cargar el modelo de la DB para el controlador correspondiente
    function loadModel($model){
        //Similar a la clase App, se guarda la ruta del modelo en la variable url
        $url = 'models/'.$model.'model.php';

        //Se comprueba que el archivo de la url exista
        if(file_exists($url)){
            //Se llama al archivo de la url
            require_once $url;

            //Se declara una variable que contenga el nombre del modelo completo, que coincida con el nombre de 
            //la clase correspondiente
            $modelName = $model.'Model';
            //Y se inicializa una variable de la clase local que será del tipo de la clase correspondiente al modelo
            $this->model = new $modelName();
        }
    }

    //Funcion para simplificar el proceso de validación del envío de datos por POST
    function existPOST($params){
        //Se recorren todos los parámetros a validar mediante un ciclo y un arreglo que los contenga
        foreach ($params as $param) {
            //Se válida si cada uno existe
            if(!isset($_POST[$param])){
                //Si uno de ellos no existe, se imprime en el error_log cuál es y se retorna false
                error_log("Controller::existPOST: No existe el parametro $param" );
                return false;
            }
        }
        //Si todos existen, se retorna true
        error_log("Controller::existPOST: Existen parámetros" );
        return true;
    }

    //Funcion para simplificar el proceso de validación del envío de datos por GET
    function existGET($params){
        //Se recorren todos los parámetros a validar mediante un ciclo y un arreglo que los contenga
        foreach ($params as $param) {
            //Se válida si cada uno existe
            if(!isset($_GET[$param])){
                //Si uno de ellos no existe, se imprime en el error_log cuál es y se retorna false
                error_log('Controller::existGET -> No existe el parámetro ' . $param);
                return false;
            }
        }

        //Si todos existen, se retorna true
        return true;
    }

    //Función para extraer los valores de un GET más fácilmente
    function getGet($name){
        return $_GET[$name];
    }

    //Función para extraer los valores de un POST más fácilmente
    function getPost($name){
        return $_POST[$name];
    }

    //Función para redirigir al usuario a una página, donde url es el controlador, y mensaje los parámetros a enviar
    function redirect($url, $mensajes = []){
        //Se declara un arreglo data y una variable params
        $data = [];
        $params = '';
        
        //Se recorre el arreglo de mensajes y se le asigna el valor del mensaje al array
        foreach ($mensajes as $key => $value) {
            array_push($data, $key . '=' . $value);
        }

        //Se une el contenido de data a un string mediante &
        $params = join('&', $data);
        //Ejemplo del resultado: ?nombre=Marcos&apellido=Rivas
        
        //Si la variable params no está vacía, se le agrega el ? al principio para denotar los parámetros en la url
        if($params != ''){
            $params = '?' . $params;
        }

        //Se redirecciona al usuario a la url resultante
        header('location: ' . constant('URL') . $url . $params);
    }
}

?>