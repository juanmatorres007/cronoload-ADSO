<?php
include "../../controller/consultaController.php";

extract($_REQUEST);
$idarea = $_REQUEST['x'];

$consuluserios = new ConsultaController;
$consuluserios ->consultarProyect($idarea);