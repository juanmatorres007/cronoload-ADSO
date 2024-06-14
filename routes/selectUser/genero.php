<?php

include "../../controller/userController.php";

$userController = new userController();
$genero = $userController->getGenero();

header('Content-Type: application/json');
echo json_encode($genero);