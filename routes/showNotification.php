<?php
include_once '../conexion/conexion.php';
include_once '../controller/NotificationController.php';

$conn = conectaDb();
$controller = new NotiController($conn);
$controller->showNotifications();
?>