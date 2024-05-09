<?php

include "../controller/rolController.php";

$rolController = new RolController();
$roles = $rolController->getRoles();

include_once "../view/registro.php";