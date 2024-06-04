<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

include_once "../controller/ifRolController.php";

$ifRolController = new ifRolController();

$id_usuario = $_SESSION['usuario']['id_auto_user'];

  $getSessionRol = $ifRolController->getSessionRol($id_usuario);

  $_SESSION['getSessionRol'] = $getSessionRol;