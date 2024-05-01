<?php

include_once "../controller/loginController.php";
include_once '../controller/sessionController.php';

 extract($_REQUEST);
 $number_ident = $_REQUEST['document'];
 $pass = $_REQUEST['pass'];

 $valController = new ViewController();
 $var_access = $valController->login($number_ident,$pass);
    if($var_access > 0){
      $usuarioController = new SessionController();
      $usuarioController->iniciarSesion($number_ident, $pass);
      
    } else {      
      header("Location: ../index.php?accion=mostrarFormularioLogin");
      exit();
    }
?>