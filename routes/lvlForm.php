<?php

include "../controller/userController.php";

$userController = new userController();
$lvlForm = $userController->getLvlForm();

// include_once "../view/registro.php";
header('Content-Type: application/json');
echo json_encode($lvlForm);
// echo $roles;