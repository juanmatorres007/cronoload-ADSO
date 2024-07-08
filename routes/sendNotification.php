<?php
include_once "../controller/NotificationController.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $notificationController = new NotificationController();
    $notificationController->sendNotification();
}
?>