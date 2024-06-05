<?php
include_once "../../controller/userController.php";

extract($_REQUEST);
$idproyect = $_REQUEST['x'];

$regFicha = new UserController();
$regFicha -> registroFicha($idproyect);