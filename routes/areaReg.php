<?php    
include_once "../controller/userController.php";

extract($_REQUEST);
$nombreArea=$_REQUEST['area'];
$estado=$_REQUEST['estado'];
date_default_timezone_set('America/Bogota');
$var_date = date("Y-m-d");

$Registro_area = new UserController();
$Registro_area -> regArea($nombreArea, $var_date, $estado);