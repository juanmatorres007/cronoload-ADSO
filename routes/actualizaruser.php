<?php
include "../controller/Actualizaruser.php";
extract($_REQUEST);

$actuauser = new Actualizarcontoller;

$actuauser -> Actualizaruser();
?>