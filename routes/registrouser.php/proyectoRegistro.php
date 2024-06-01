<?php
include "../../controller/userController.php";

extract($_REQUEST);

$id_area = $_REQUEST['IdArea'];
$name = $_REQUEST['nombre_proyec'];
$number = $_REQUEST['numero_proyec'];
$estado =$_REQUEST['estado'];
date_default_timezone_set('America/Bogota');
$var_fecha = date("Y-m-d");

$registroProyecto = new UserController();
$registroProyecto -> registroproyect($name, $number, $estado, $var_fecha, $id_area);