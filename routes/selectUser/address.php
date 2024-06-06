<?php

include "../../controller/userController.php";

$userController = new UserController();
$departamentos = $userController->getDept();

header('Content-Type: application/json');
echo json_encode($departamentos);