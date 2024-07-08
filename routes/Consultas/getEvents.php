<?php
include_once "../controller/calendarController.php";

if (isset($_GET['calendarId'])) {
    $calendarController = new CalendarController();
    $events = $calendarController->getEventsByCalendarId($_GET['calendarId']);
    echo json_encode($events);
} else {
    echo json_encode([]);
}
?>

