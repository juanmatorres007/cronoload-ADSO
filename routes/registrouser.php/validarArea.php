<?php
include_once "../../controller/userController.php";

extract($_REQUEST);
$idarea = $_REQUEST['x'];

if($idarea > 0) {
$proyectoregistro = new UserController();
$proyectoregistro -> registroproyect($idarea);
}