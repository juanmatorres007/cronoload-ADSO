<?php
include "../controller/consultaController.php";

extract($_REQUEST);
$idproyect = $_REQUEST['x'];

$consulficha = new ConsultaController;
$consulficha ->consultaficha($idproyect);