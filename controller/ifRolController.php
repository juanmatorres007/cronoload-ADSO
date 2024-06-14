<?php
include_once "../conexion/conexion.php";
include "../model/ifRolModel.php";

class ifRolController{

  public function getSessionRol($id_usuario){
    $ifRolModel = new ifRolModel();
    $getSessionRol = $ifRolModel->getSessionRol($id_usuario);

    return $getSessionRol;
  }
}