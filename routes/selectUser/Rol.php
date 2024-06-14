<?php

include "../../controller/rolController.php";

$rolController = new RolController();
$roles = $rolController->getRoles();

header('Content-Type: application/json');
echo json_encode($roles);