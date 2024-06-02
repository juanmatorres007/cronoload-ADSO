<?php

include "../../controller/userController.php";

$userController = new userController();
$typeId = $userController->getTypeId();

header('Content-Type: application/json');
echo json_encode($typeId);