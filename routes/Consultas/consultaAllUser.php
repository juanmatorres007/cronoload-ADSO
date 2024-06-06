<?php

include_once "../../controller/consultaController.php";
$consultaController = new ConsultaController;

extract($_REQUEST);
$rol = $_REQUEST['rol'];

$getAllDataUser = $consultaController->getAllDataUser($rol);

echo json_encode($getAllDataUser);