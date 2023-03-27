<?php

class Lapses extends SessionController {

  //Variable para almacenar los datos del usuario
  private $user;

  //Constructor de la clase
  function __construct(){
    //Se heredan los métodos de la clase SessionController
    parent::__construct();

    //Se obtienen los datos del usuario
    $this->user = $this->getUserSessionData();
    error_log("Lapses::constructor() ");
  }

  //Método para crear un nuevo lapso
  function createLapse() {
    error_log("Lapses::createLapse() ");
    if(!$this->existPOST(['lapsename', 'lapsecategory', 'lapseinitialdate', 'lapseenddate'])){
      error_log("Lapses::createLapse() -> No se recibieron los datos del lapso");
      $this->redirect('supervisor/lapses', ['error' => Errors::ERROR_SUPERVISOR_CREATELAPSE]);
      return;
    }

    $name = $this->getPost('lapsename');
    $ship = 1;
    $category = $this->getPost('lapsecategory');
    $initial = $this->getPost('lapseinitialdate');
    $end = $this->getPost('lapseenddate');
    $user = $this->user->getId();

    if(empty($name) || empty($category) || empty($initial) || empty($end) || empty($user)){
      error_log("Lapses::createLapse() -> No se recibieron los datos del lapso");
      $this->redirect('supervisor/lapses', ['error' => Errors::ERROR_SUPERVISOR_CREATELAPSE_EMPTY]);
      return;
    }

    //Comprobar que $name no posea más de 50 caracteres
    if(strlen($name) > 50){
      error_log("Lapses::createLapse() -> El nombre del lapso es demasiado largo");
      $this->redirect('supervisor/lapses', ['error' => Errors::ERROR_SUPERVISOR_CREATELAPSE_TITLETOOLONG]);
      return;
    }

    //Comprobar que el valor de $initial no sea menor que la fecha actual
    if($initial < date("Y-m-d")){
      error_log("Lapses::createLapse() -> La fecha inicial no puede ser menor que la fecha actual");
      $this->redirect('supervisor/lapses', ['error' => Errors::ERROR_SUPERVISOR_CREATELAPSE_INITIALDATE]);
      return;
    }

    //Comprobar que el valor de $end no sea menor que la fecha de $initial
    if($end < $initial){
      error_log("Lapses::createLapse() -> La fecha final no puede ser menor que la fecha inicial");
      $this->redirect('supervisor/lapses', ['error' => Errors::ERROR_SUPERVISOR_CREATELAPSE_ENDDATE]);
      return;
    }

    //Comprobar que la cantidad de tiempo entre initial y end concuerde con la categoria
    switch ($category) {
      case 2:
        //Comprobar que entre initial y end pasen exactamente 7 días
        if($end != date("Y-m-d", strtotime($initial."+ 7 days"))){
          error_log("Lapses::createLapse() -> La fecha final no coincide con la fecha inicial");
          $this->redirect('supervisor/lapses', ['error' => Errors::ERROR_SUPERVISOR_CREATELAPSE_DATEPERIOD]);
          return;
        }
        break;
      case 3:
        //Comprobar que entre initial y end pase exactamente 1 mes
        if($end != date("Y-m-d", strtotime($initial."+ 1 month"))){
          error_log("Lapses::createLapse() -> La fecha final no coincide con la fecha inicial");
          $this->redirect('supervisor/lapses', ['error' => Errors::ERROR_SUPERVISOR_CREATELAPSE_DATEPERIOD]);
          return;
        }
        break;
      case 4:
        //Comprobar que entre initial y end pase exactamente 3 meses
        if($end != date("Y-m-d", strtotime($initial."+ 3 months"))){
          error_log("Lapses::createLapse() -> La fecha final no coincide con la fecha inicial");
          $this->redirect('supervisor/lapses', ['error' => Errors::ERROR_SUPERVISOR_CREATELAPSE_DATEPERIOD]);
          return;
        }
        break;
    }

    //Comprobar que no se solapen con otros lapsos de su misma categoría
    if($this->model->checkLapseOverlap($initial, $end, $category)){
      error_log("Lapses::createLapse() -> El lapso se solapa con otro lapso de la misma categoría");
      $this->redirect('supervisor/lapses', ['error' => Errors::ERROR_SUPERVISOR_CREATELAPSE_OVERLAP]);
      return;
    }

    $this->model->setName($name);
    $this->model->setShipId($ship);
    $this->model->setCategoryId($category);
    $this->model->setInitial($initial);
    $this->model->setEnd($end);
    $this->model->setUserId($user);

    if($this->model->save()){
      error_log("Lapses::createLapse() -> Lapso creada");
      $this->redirect('supervisor/lapses', ['success' => Success::SUCCESS_SUPERVISOR_CREATELAPSE]);
      return;
    }else{
      error_log("Lapses::createLapse() -> Error al crear el lapso");
      $this->redirect('supervisor/lapses', ['error' => Errors::ERROR_SUPERVISOR_CREATELAPSE]);
      return;
    }

  }

  //Método para actualizar los datos de un lapso
  function updateLapse(){
    error_log("Lapses::updateLapse() ");
    if(!$this->existPOST(['lapseid', 'lapseinitialold', 'lapsename', 'lapsecategory', 'lapseinitialdate', 'lapseenddate'])){
      error_log("Lapses::updateLapse() -> No se recibieron los datos del lapso");
      $this->redirect('supervisor/lapses', ['error' => Errors::ERROR_SUPERVISOR_UPDATELAPSE]);
      return;
    }

    $id = $this->getPost('lapseid');
    $initialold = $this->getPost('lapseinitialold');
    $name = $this->getPost('lapsename');
    $ship = 1;
    $category = $this->getPost('lapsecategory');
    $initial = $this->getPost('lapseinitialdate');
    $end = $this->getPost('lapseenddate');

    if(empty($id) || empty($initialold) || empty($name) || empty($category) || empty($initial) || empty($end)){
      error_log("Lapses::updateLapse() -> No se recibieron los datos del lapso");
      $this->redirect('supervisor/lapses', ['error' => Errors::ERROR_SUPERVISOR_UPDATELAPSE_EMPTY]);
      return;
    }

    //Comprobar que $name no posea más de 50 caracteres
    if(strlen($name) > 50){
      error_log("Lapses::updateLapse() -> El nombre del lapso es demasiado largo");
      $this->redirect('supervisor/lapses', ['error' => Errors::ERROR_SUPERVISOR_UPDATELAPSE_TITLETOOLONG]);
      return;
    }

    //Comprobar que el valor de $initial no sea menor que la fecha inicial actual
    if($initial < $initialold){
      error_log("Lapses::updateLapse() -> La fecha inicial no puede ser menor que la fecha actual");
      $this->redirect('supervisor/lapses', ['error' => Errors::ERROR_SUPERVISOR_UPDATELAPSE_INITIALDATE]);
      return;
    }

    //Comprobar que el valor de $end no sea menor que la fecha de $initial
    if($end < $initial){
      error_log("Lapses::updateLapse() -> La fecha final no puede ser menor que la fecha inicial");
      $this->redirect('supervisor/lapses', ['error' => Errors::ERROR_SUPERVISOR_UPDATELAPSE_ENDDATE]);
      return;
    }

    //Comprobar que la cantidad de tiempo entre initial y end concuerde con la categoria
    switch ($category) {
      case 2:
        //Comprobar que entre initial y end pasen exactamente 7 días
        if($end != date("Y-m-d", strtotime($initial."+ 7 days"))){
          error_log("Lapses::updateLapse() -> La fecha final no coincide con la fecha inicial");
          $this->redirect('supervisor/lapses', ['error' => Errors::ERROR_SUPERVISOR_UPDATELAPSE_DATEPERIOD]);
          return;
        }
        break;
      case 3:
        //Comprobar que entre initial y end pase exactamente 1 mes
        if($end != date("Y-m-d", strtotime($initial."+ 1 month"))){
          error_log("Lapses::updateLapse() -> La fecha final no coincide con la fecha inicial");
          $this->redirect('supervisor/lapses', ['error' => Errors::ERROR_SUPERVISOR_UPDATELAPSE_DATEPERIOD]);
          return;
        }
        break;
      case 4:
        //Comprobar que entre initial y end pase exactamente 3 meses
        if($end != date("Y-m-d", strtotime($initial."+ 3 months"))){
          error_log("Lapses::updateLapse() -> La fecha final no coincide con la fecha inicial");
          $this->redirect('supervisor/lapses', ['error' => Errors::ERROR_SUPERVISOR_UPDATELAPSE_DATEPERIOD]);
          return;
        }
        break;
    }

    //Comprobar que no se solapen con otros lapsos de su misma categoría
    if(!$this->model->checkLapseOverlapException($initial, $end, $category, $id)){
      error_log("Lapses::updateLapse() -> El lapso se solapa con otro lapso de la misma categoría");
      $this->redirect('supervisor/lapses', ['error' => Errors::ERROR_SUPERVISOR_UPDATELAPSE_OVERLAP]);
      return;
    }

    $this->model->setId($id);
    $this->model->setName($name);
    $this->model->setShipId($ship);
    $this->model->setCategoryId($category);
    $this->model->setInitial($initial);
    $this->model->setEnd($end);

    if($this->model->update()){
      error_log("Lapses::updateLapse() -> Lapso creada");
      $this->redirect('supervisor/lapses', ['success' => Success::SUCCESS_SUPERVISOR_UPDATELAPSE]);
      return;
    }else{
      error_log("Lapses::updateLapse() -> Error al crear el lapso");
      $this->redirect('supervisor/lapses', ['error' => Errors::ERROR_SUPERVISOR_UPDATELAPSE]);
      return;
    }
  }

}
?>