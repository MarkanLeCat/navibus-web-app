<?php

//Es la clase que se encargará de controlar los redireccionamientos de la aplicación

//Llama al archivo del controlador de los errores
require_once 'controllers/errores.php';

class App{

    function __construct(){

        //Revisa que exista una url ingresada por el usuario
        //Si existe, a la variable $url se le asigna el valor GET, sino se le asigna Null
        $url = isset($_GET['url']) ? $_GET['url']: null;
        //rtrim elimina todas las barras / innecesarias al final del url
        $url = rtrim($url, '/');
        /*
            controlador->[0]
            metodo->[1]
            parameter->[2]
        */
        //explode se encargará de separar el url por cada / encontrado, convirtiendo $url en un array
        $url = explode('/', $url);

        //Si $url está vacío, osea que no se especificó url, se redirecciona al login
        // cuando se ingresa sin definir controlador
        if(empty($url[0])){
            //Se almacena la dirección del controlador de login en una variable
            $archivoController = 'controllers/login.php';
            require_once $archivoController;
            //Se inicializa un nuevo controlador de la clase Login con el nombre $controller
            $controller = new Login();
            //Se ejecuta la función para cargar su modelo correspondiente
            $controller->loadModel('login');
            //Se cargar la vista correspondiente, en este caso sería el login
            $controller->render();
            return false;
        }
        //Si se indicó una url específica, se almacena en una vairable su ruta de acceso, haciendo uso del valor 0
        //del array ya que contiene el nombre del archivo controlador, agregando la carpeta y la extensión
        $archivoController = 'controllers/' . $url[0] . '.php';

        //Valida si existe un archivo con el nombre de la variable
        if(file_exists($archivoController)){
            require_once $archivoController;

            //Se crea un objeto del tipo del controlador especificado en la url
            // inicializar controlador
            $controller = new $url[0];
            //Igual que arriba, se ejecuta la función para cargar su modelo correspondiente
            $controller->loadModel($url[0]);

            //Se valida si existe algún método especificado en la URL
            // si hay un método que se requiere cargar
            if(isset($url[1])){
                //Se comprueba ahora que exista ese método en la clase
                if(method_exists($controller, $url[1])){
                    //Se valida ahora si la URL trae parámetros para la función
                    if(isset($url[2])){
                        //Se almacena el número de parámetros que hay
                        //el método tiene parámetros
                        //sacamos el # de parametros
                        $nparam = sizeof($url) - 2; //Se le restan dos para omitir el controlador y el método
                        //crear un arreglo con los parametros
                        $params = [];

                        //Ciclo for para ingresar cada parámetro en el array
                        //iterar
                        for($i = 0; $i < $nparam; $i++){
                            array_push($params, $url[$i + 2]);
                        }

                        //Se le mandan al método los parámetros mediante el array
                        //pasarlos al metodo   
                        $controller->{$url[1]}($params);
                    }else{
                        //No lleva parámetros, por lo que se llama el método directamente
                        $controller->{$url[1]}(); //Se interpreta la variable url como el nombre de una funció
                    }
                }else{
                    //Error, no existe el método
                    $controller = new Errores();
                }
            }else{
                //No hay métodos para cargar, se carga el método por default, en este caso render
                $controller->render();
            }
        }else{
            //No existe el archivo, manda un controlador de error
            $controller = new Errores();
        }
    }
}

?>