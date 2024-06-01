<?php

include_once '../../conexion/conexion.php';
include_once "../../model/rolModel.php";


class RolController{

  public function getRoles(){
    $rolModel = new RolModel();
    $roles = $rolModel->consulRol();
    return $roles;
  }

  public function insertRol($name_rol, $state_rol){
    $rolModel = new RolModel();
    $rol = $rolModel->insertRol($name_rol,$state_rol);
    // include "../view/formularioRol.php";
  }
}