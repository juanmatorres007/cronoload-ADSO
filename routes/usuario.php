<?php

include_once "../controller/usuarioController.php";

extract($_REQUEST);

$name = $_REQUEST['name'];
$lastname = $_REQUEST['lastname'];
$type_id = $_REQUEST['type_id'];
$number_id = $_REQUEST['number_id'];


$usuarioController = new UsuarioController();
$usuarioController->update($name, $lastname, $type_id, $number_id);