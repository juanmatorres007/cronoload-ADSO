<?php

include "../controller/rolController.php";

extract($_REQUEST);

$name_rol = $_REQUEST['name_rol'];
$state_rol = $_REQUEST['state_rol'];

$rolController = new RolController();
$rolController->Rol($name_rol, $state_rol);