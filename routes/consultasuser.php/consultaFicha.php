<?php
include "../../controller/userController.php";

$consultFile = new UserController();
$file = $consultFile->getKnowFile();

header('Content-Type: application/json');
echo json_encode($file);