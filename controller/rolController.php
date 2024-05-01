<?php

include_once '../conexion/conexion.php';
include_once "../model/rolModel.php";


class RolController{

  public function Rol($name_rol, $state_rol){
      
    $rolModel = new RolModel();
    $rol = $rolModel->insertRol($name_rol,$state_rol);
    echo "Rol successfully";
    include "../view/formularioRol.php";
  }
}