<?php
include "../controller/userController.php";

extract($_REQUEST);

$Id_proyect = $_REQUEST['IdProyect'];
$numero_ficha = $_REQUEST['num_ficha'];
$estado = $_REQUEST['estado'];
$f_ini = $_REQUEST['f_inicio'];
$f_fin = $_REQUEST['f_fin'];