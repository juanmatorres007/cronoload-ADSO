<?php

include "../controller/rolController.php";

$rolController = new RolController();
$roles = $rolController->getRoles();

// include_once "../view/registro.php";
header('Content-Type: application/json');
echo json_encode($roles);
// echo $roles;