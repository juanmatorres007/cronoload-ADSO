<?php
include "../../controller/userController.php";

$userController = new UserController();

extract($_REQUEST);

$id_proyect = $_REQUEST['IdProyect'];
$numero_ficha = $_REQUEST['num_ficha'];
$estado = $_REQUEST['estado'];
$f_ini = $_REQUEST['f_inicio'];
$f_fin = $_REQUEST['f_fin'];

  $registerFicha = $userController->registerFicha($id_proyect, $numero_ficha, $estado, $f_ini, $f_fin);