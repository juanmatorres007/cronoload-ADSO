<?php

include "../../controller/userController.php";

$userController = new userController();
$lvlForm = $userController->getLvlForm();

header('Content-Type: application/json');
echo json_encode($lvlForm);