<?php

include_once "../conexion/conexion.php";
include_once "../model/usuarioModel.php";

class UsuarioController{


  public function update($name, $lastname, $type_id, $number_id){
    $usuarioModel = new UsuarioModel();

    $usuario = $usuarioModel->update($name, $lastname, $type_id, $number_id);

  }
}