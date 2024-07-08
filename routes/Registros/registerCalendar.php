<?php
include_once "../../controller/calendarController.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $calendarController = new CalendarController();
    $result = $calendarController->saveEvent($_POST);

    if ($result) {
        echo json_encode([
            'success' => true,
            'eventTitle' => $_POST['calendarInstructor'] . ' - ' . $_POST['calendarCompetition'], // Ajusta esto según tus datos
            'eventDate' => $_POST['calendarDate']
        ]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>