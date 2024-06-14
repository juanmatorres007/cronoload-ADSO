<?php
include_once "../../controller/userController.php";

extract($_REQUEST);
$idproyect = $_REQUEST['x'];

$regFicha = new UserController();
$regFicha -> registerFicha($id_proyect, $numero_ficha, $estado, $f_ini, $f_fin);