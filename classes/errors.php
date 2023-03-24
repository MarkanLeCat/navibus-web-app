<?php

class Errors{
    //ERROR|SUCCESS
    //Controller
    //method
    //operation
    
    //const ERROR_ADMIN_NEWCATEGORY_EXISTS = "El nombre de la categoría ya existe, intenta otra";
    const ERROR_LOGIN_AUTHENTICATE               = "11c37cfab311fbe28652f4947a9523c4";
    const ERROR_LOGIN_AUTHENTICATE_EMPTY         = "2194ac064912be67fc164539dc435a42";
    const ERROR_LOGIN_AUTHENTICATE_DATA          = "bcbe63ed8464684af6945ad8a89f76f8";
    const ERROR_LOGIN_AUTHENTICATE_INACTIVE      = "fd586eca4177b7ad014a9a2dbe50ce54";
    const ERROR_ADMIN_NEWUSER                   = "4b5ca4a63fed210998768ec22a3a73ff";
    const ERROR_ADMIN_NEWUSER_EMPTY             = "a5bcd7089d83f45e17e989fbc86003ed";
    const ERROR_ADMIN_NEWUSER_EXISTS            = "1f8f0ae8963b16403c3ec9ebb851f156";
    const ERROR_ADMIN_NEWUSER_EMAILFORMAT         = "d68c2ffd28c4c638caf1c07eb8418eb4";
    const ERROR_ADMIN_NEWUSER_WEEKPASSWORD         = "96fe81a2ea075fc8c0aeb10ce0f076f7";
    const ERROR_ADMIN_UPDATE                     = "c2bc0aeac2e6eebb492a8dd6ec9e16d0";
    const ERROR_ADMIN_USERPROFILE_NOTEXIST            = "aa3728f012b9c8a866206a6bccf9ad20";
    const ERROR_ADMIN_UPDATEUSER                    = "c104dc1cbf44cf2907376788e2f1827d";
    const ERROR_ADMIN_UPDATEUSER_EMPTY              = "c568e66ff62c815d4c551178cdce0513";
    const ERROR_ADMIN_UPDATEUSER_EMAILFORMAT         = "98217b0c263b136bf14925994ca7a0aa";
    const ERROR_ADMIN_UPDATEUSERPASSWORD            = "bba7335be87ecbeb5c704faaf529e346";
    const ERROR_ADMIN_UPDATEUSERPASSWORD_EMPTY      = "280d932867cd14576fa92cef1841c6d6";
    const ERROR_ADMIN_UPDATEUSERPASSWORD_WEEKPASSWORD    = "33a677b4686ac8910d10bf57a802cc04";
    const ERROR_ADMIN_UPDATEUSERPASSWORD_ISNOTTHESAME = "a562eaf506b8730621657d8a35cffb78";
    const ERROR_ADMIN_UPDATEADTIONALUSER              = "1075f709e84d2ee0fd7f24c6f082dcce";
    const ERROR_ADMIN_UPDATEADTIONALUSER_EMPTY        = "27dd3689a220f497b1a4d177676aaa5d";
    const ERROR_ADMIN_DISABLEUSER                     = "bafceb8faca509158e2e7fe239b33b4d";
    const ERROR_ADMIN_ENABLEUSER                     = "1df3134a183f3bd2413a5370d27b99cf";
    const ERROR_SUPERVISOR_UPDATE                     = "43754e84ce3e5c18d8cac320504c80a2";
    const ERROR_SUPERVISOR_UPDATE_EMPTY                = "63c9e63f94ee2062ad09f8507977f797";
    const ERROR_SUPERVISOR_UPDATEPASSWORD             = "5879ec03ef47b55a5adb3ca64ebf96d7";
    const ERROR_SUPERVISOR_UPDATEPASSWORD_EMPTY       = "02a456a9bf9f4103403fd4af12e632a3";
    const ERROR_SUPERVISOR_UPDATEPASSWORD_OLDWRONG    = "6a1668224dbb5bd9a2db38d656beedfe";
    const ERROR_SUPERVISOR_UPDATEPASSWORD_ISNOTTHESAME = "ab905b920a9ba483c666692c479141e9";
    const ERROR_SUPERVISOR_UPDATEPASSWORD_WEEK       = "c65ffcce6654ca046e50b62dd7f21596";
    const ERROR_SUPERVISOR_CREATETASK               = "ee9156ca95ea9a72b86b19e25aa1fb5f";
    const ERROR_SUPERVISOR_CREATETASK_EMPTY          = "ee9156ca95ea9a72bj7gij49rfye384f";
    const ERROR_SUPERVISOR_CREATETASK_TITLETOOLONG   = "ehdf73j49the73ge4ie19e25aa1fb5f";
    const ERROR_SUPERVISOR_CREATETASK_DESCRIPTIONTOOLONG = "ehdf73j498dfji48t64jhaa1fb5f";
    const ERROR_SUPERVISOR_UPDATETASK               = "fdae7b5bb7c0a34bb97e38552ed1d98b";
    const ERROR_SUPERVISOR_CREATELAPSE               = "e1975746283378e6d802326e6bb13216";
    const ERROR_SUPERVISOR_UPDATELAPSE               = "266c43aef9319533f68d6f0ce16cbb5f";
    const ERROR_OPERATOR_UPDATE                     = "807f75bf7acec5aa86993423b6841407";
    const ERROR_OPERATOR_UPDATE_EMPTY                = "0f0735f8603324a7bca482debdf088fa";
    const ERROR_OPERATOR_UPDATEPASSWORD             = "365009a3644ef5d3cf7a229a09b4d690";
    const ERROR_OPERATOR_UPDATEPASSWORD_EMPTY       = "0f0738gj603324a7bca482debdf088fa";
    const ERROR_OPERATOR_UPDATEPASSWORD_OLDWRONG    = "97ebb55648b5c99aaf3c6586be177c66";
    const ERROR_OPERATOR_UPDATEPASSWORD_ISNOTTHESAME = "27731b37e286a3c6429a1b8e44ef3ff6";
    const ERROR_OPERATOR_UPDATEPASSWORD_WEEK       = "e99ab11bbeec9f63fb16f46133de85ec";
    const ERROR_OPERATOR_UPDATETASKSTATUS            = "ef63f6fed75kfgh79837ygm8534tffw34t6ec";
    const ERROR_ADMINISTRATIVE_UPDATE                     = "bbb8ea93e28e475b4ccf2738ab8effc5";
    const ERROR_ADMINISTRATIVE_UPDATE_EMPTY                = "34313b215c234554933265c4eee093a4";
    const ERROR_ADMINISTRATIVE_UPDATEPASSWORD             = "b8b342e89bbb90c7844612d308516a54";
    const ERROR_ADMINISTRATIVE_UPDATEPASSWORD_EMPTY       = "1fdb5e026314a905b5f10fb185351640";
    const ERROR_ADMINISTRATIVE_UPDATEPASSWORD_OLDWRONG    = "e9901e776235f174f3001b75ec4e1504";
    const ERROR_ADMINISTRATIVE_UPDATEPASSWORD_ISNOTTHESAME = "41a640bb412415bd4dbb7d05db0a4535";
    const ERROR_ADMINISTRATIVE_UPDATEPASSWORD_WEEK       = "dec842debf6a83005b55d78fc8ff58b4";
    const ERROR_USER_UPDATEPASSWORD_CANNOTTHESAME = "27731b37e44hbfg7885th9jj6ed893uhj";


    private $errorsList = [];

    public function __construct()
    {
        $this->errorsList = [
            Errors::ERROR_LOGIN_AUTHENTICATE        => 'Hubo un problema al iniciar sesión, inténtelo de nuevo',
            Errors::ERROR_LOGIN_AUTHENTICATE_EMPTY  => 'Los campos de usuario y contraseña no pueden estar vacíos',
            Errors::ERROR_LOGIN_AUTHENTICATE_DATA   => 'Nombre de usuario y/o contraseña incorrectos',
            Errors::ERROR_LOGIN_AUTHENTICATE_INACTIVE=> 'El usuario se encuentra deshabilitado',
            Errors::ERROR_ADMIN_NEWUSER           => 'Hubo un error al intentar crear el usuario',
            Errors::ERROR_ADMIN_NEWUSER_EMPTY      => 'Uno o más campos estaban vacíos',
            Errors::ERROR_ADMIN_NEWUSER_EXISTS      => 'El nombre de usuario ya existe, intente otro',
            Errors::ERROR_ADMIN_NEWUSER_EMAILFORMAT => 'Ingrese un correo electrónico válido',
            Errors::ERROR_ADMIN_NEWUSER_WEEKPASSWORD => 'La contraseña es muy débil',
            Errors::ERROR_ADMIN_UPDATE              => 'Hubo un error al intentar actualizar los datos',
            Errors::ERROR_ADMIN_USERPROFILE_NOTEXIST  => 'El usuario no existe',
            Errors::ERROR_ADMIN_UPDATEUSER            => 'Hubo un error al intentar actualizar los datos',
            Errors::ERROR_ADMIN_UPDATEUSER_EMPTY      => 'Uno o más campos estaban vacíos',
            Errors::ERROR_ADMIN_UPDATEUSER_EMAILFORMAT   => 'Ingrese un correo electrónico válido',
            Errors::ERROR_ADMIN_UPDATEUSERPASSWORD    => 'Hubo un error al intentar actualizar la contraseña',
            Errors::ERROR_ADMIN_UPDATEUSERPASSWORD_EMPTY => 'La contraseña no puede estar vacía',
            Errors::ERROR_ADMIN_UPDATEUSERPASSWORD_WEEKPASSWORD => 'La contraseña es muy débil',
            Errors::ERROR_ADMIN_UPDATEUSERPASSWORD_ISNOTTHESAME => 'Las contraseñas no coinciden',
            Errors::ERROR_ADMIN_UPDATEADTIONALUSER       => 'Hubo un error al intentar actualizar los datos',
            Errors::ERROR_ADMIN_UPDATEADTIONALUSER_EMPTY => 'Uno o más campos estaban vacíos',
            Errors::ERROR_ADMIN_DISABLEUSER              => 'Hubo un error al intentar deshabilitar el usuario',
            Errors::ERROR_ADMIN_ENABLEUSER               => 'Hubo un error al intentar habilitar el usuario',
            Errors::ERROR_SUPERVISOR_UPDATE               => 'No se pueden actualizar los datos',
            Errors::ERROR_SUPERVISOR_UPDATE_EMPTY         => 'Uno o más campos estaban vacíos',
            Errors::ERROR_SUPERVISOR_UPDATEPASSWORD       => 'No se puede actualizar la contraseña',
            Errors::ERROR_SUPERVISOR_UPDATEPASSWORD_EMPTY => 'La contraseña no puede estar vacía',
            Errors::ERROR_SUPERVISOR_UPDATEPASSWORD_OLDWRONG => 'La contraseña actual es incorrecta',
            Errors::ERROR_SUPERVISOR_UPDATEPASSWORD_ISNOTTHESAME => 'Las contraseñas no coinciden',
            Errors::ERROR_SUPERVISOR_UPDATEPASSWORD_WEEK => 'La contraseña es muy débil',
            Errors::ERROR_SUPERVISOR_CREATETASK           => 'Hubo un error al intentar crear la tarea',
            Errors::ERROR_SUPERVISOR_CREATETASK_EMPTY     => 'Uno o más campos estaban vacíos',
            Errors::ERROR_SUPERVISOR_CREATETASK_TITLETOOLONG  => 'El título sobrepasa el límite de caracteres',
            Errors::ERROR_SUPERVISOR_CREATETASK_DESCRIPTIONTOOLONG  => 'La descripción sobrepasa el límite de caracteres',
            Errors::ERROR_SUPERVISOR_UPDATETASK           => 'Hubo un error al intentar actualizar la tarea',
            Errors::ERROR_SUPERVISOR_CREATELAPSE          => 'Hubo un error al intentar crear el lapso',
            Errors::ERROR_SUPERVISOR_UPDATELAPSE          => 'Hubo un error al intentar actualizar el lapso',
            Errors::ERROR_OPERATOR_UPDATE               => 'No se pueden actualizar los datos',
            Errors::ERROR_OPERATOR_UPDATE_EMPTY         => 'Uno o más campos estaban vacíos',
            Errors::ERROR_OPERATOR_UPDATEPASSWORD       => 'No se puede actualizar la contraseña',
            Errors::ERROR_OPERATOR_UPDATEPASSWORD_EMPTY => 'La contraseña no puede estar vacía',
            Errors::ERROR_OPERATOR_UPDATEPASSWORD_OLDWRONG => 'La contraseña actual es incorrecta',
            Errors::ERROR_OPERATOR_UPDATEPASSWORD_ISNOTTHESAME => 'Las contraseñas no coinciden',
            Errors::ERROR_OPERATOR_UPDATEPASSWORD_WEEK => 'La contraseña es muy débil',
            Errors::ERROR_OPERATOR_UPDATETASKSTATUS     => 'Ocurrió un error al actualizar el estado de la tarea',
            Errors::ERROR_ADMINISTRATIVE_UPDATE               => 'No se pueden actualizar los datos',
            Errors::ERROR_ADMINISTRATIVE_UPDATE_EMPTY         => 'Uno o más campos estaban vacíos',
            Errors::ERROR_ADMINISTRATIVE_UPDATEPASSWORD       => 'No se puede actualizar la contraseña',
            Errors::ERROR_ADMINISTRATIVE_UPDATEPASSWORD_EMPTY => 'La contraseña no puede estar vacía',
            Errors::ERROR_ADMINISTRATIVE_UPDATEPASSWORD_OLDWRONG => 'La contraseña actual es incorrecta',
            Errors::ERROR_ADMINISTRATIVE_UPDATEPASSWORD_ISNOTTHESAME => 'Las contraseñas no coinciden',
            Errors::ERROR_ADMINISTRATIVE_UPDATEPASSWORD_WEEK => 'La contraseña es muy débil',
            Errors::ERROR_USER_UPDATEPASSWORD_CANNOTTHESAME => 'Debe ingresar una contraseña diferente a la actual'
        ];
    }

    function get($hash){
        return $this->errorsList[$hash];
    }

    function existsKey($key){
        if(array_key_exists($key, $this->errorsList)){
            return true;
        }else{
            return false;
        }
    }
}
?>