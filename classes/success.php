<?php

class Success{
    //ERROR|SUCCESS
    //Controller
    //method
    //operation
    
    const SUCCESS_ADMIN_UPDATE       = "02904a426f8769ff930b83b5d58048f0";
    const SUCCESS_ADMIN_NEWUSER     = "f52228665c4f14c8695b194f670b0ef1";
    const SUCCESS_ADMIN_UPDATEUSER     = "g4j2248431c4f14c8695b1942j6780b0ef1";
    const SUCCESS_ADMIN_UPDATEUSERPASSWORD = "f451424a507a30aca11f23eecb5a8f12";
    const SUCCESS_ADMIN_UPDATEADITIONALUSER     = "abd464f00ff68c217d41a20bb4f8b51f";
    const SUCCESS_ADMIN_DISABLEUSER       = "fcd919285d5759328b143801573ec47d";
    const SUCCESS_ADMIN_ENABLEUSER       = "d6d986c244f148fe4a5cd3f2e5c12d03";
    const SUCCESS_SUPERVISOR_UPDATE     = "0477c6fa8f395691381b0854444a579a";
    const SUCCESS_SUPERVISOR_UPDATEPASSWORD       = "e3ba215fb9c98b83617a84a7fb71c7ad";
    const SUCCESS_SUPERVISOR_CREATETASK   = "fbbd0f23184e820e1df466abe6102955";
    const SUCCESS_SUPERVISOR_UPDATETASK   = "95a1ba7e5f429a6efbf93074e2029dd6";
    const SUCCESS_SUPERVISOR_UPDATETASKSTATUS   = "d333095e98d11842ca628ad9891b7654";
    const SUCCESS_SUPERVISOR_CREATELAPSE   = "68a69000db375de3b09b4590e872af61";
    const SUCCESS_SUPERVISOR_UPDATELAPSE   = "e44e674457db9e0d75f12a7133e6f628";
    const SUCCESS_OPERATOR_UPDATE     = "2ee085ac8828407f4908e4d134195e5c";
    const SUCCESS_OPERATOR_UPDATEPASSWORD       = "6fb34a5e4118fb823636ca24a1d21669";
    const SUCCESS_OPERATOR_UPDATETASKSTATUS   = "918235e1164202d3ae614d43268a8763";
    const SUCCESS_ADMINISTRATIVE_UPDATE     = "6fb34a5e4118fb823636ca2an5yu3345i85h";
    const SUCCESS_ADMINISTRATIVE_UPDATEPASSWORD = "6fb34a5e4118fb823636ca24a3164vds894bj6";
    
    private $successList = [];

    public function __construct()
    {
        $this->successList = [
            Success::SUCCESS_ADMIN_UPDATE => "¡Datos actualizados exitosamente!",
            Success::SUCCESS_ADMIN_NEWUSER => "¡Nuevo usuario creado exitosamente!",
            Success::SUCCESS_ADMIN_UPDATEUSER => "¡Datos del usuario actualizados exitosamente!",
            Success::SUCCESS_ADMIN_UPDATEUSERPASSWORD => "¡Contraseña del usuario actualizada exitosamente!",
            Success::SUCCESS_ADMIN_UPDATEADITIONALUSER => "¡Datos del usuario actualizados exitosamente!",
            Success::SUCCESS_ADMIN_DISABLEUSER => "¡Usuario deshabilitado exitosamente!",
            Success::SUCCESS_ADMIN_ENABLEUSER => "¡Usuario habilitado exitosamente!",
            Success::SUCCESS_SUPERVISOR_UPDATE => "¡Datos actualizados exitosamente!",
            Success::SUCCESS_SUPERVISOR_UPDATEPASSWORD => "¡Contraseña actualizada exitosamente!",
            Success::SUCCESS_SUPERVISOR_CREATETASK => "¡Nueva tarea creada exitosamente!",
            Success::SUCCESS_SUPERVISOR_UPDATETASK => "¡Datos de la tarea actualizados exitosamente!",
            Success::SUCCESS_SUPERVISOR_UPDATETASKSTATUS => "¡Estatus de la tarea actualizado",
            Success::SUCCESS_SUPERVISOR_CREATELAPSE => "¡Nuevo lapso de tiempo creado exitosamente!",
            Success::SUCCESS_SUPERVISOR_UPDATELAPSE => "¡Datos del lapso actualizados exitosamente!",
            Success::SUCCESS_OPERATOR_UPDATE => "¡Datos actualizados exitosamente!",
            Success::SUCCESS_OPERATOR_UPDATEPASSWORD => "¡Contraseña actualizada exitosamente!",
            Success::SUCCESS_OPERATOR_UPDATETASKSTATUS => "¡Estatus de la tarea actualizado",
            Success::SUCCESS_ADMINISTRATIVE_UPDATE => "¡Datos actualizados exitosamente!",
            Success::SUCCESS_ADMINISTRATIVE_UPDATEPASSWORD => "¡Contraseña actualizada exitosamente!"
        ];
    }

    function get($hash){
        return $this->successList[$hash];
    }

    function existsKey($key){
        if(array_key_exists($key, $this->successList)){
            return true;
        }else{
            return false;
        }
    }
}
?>