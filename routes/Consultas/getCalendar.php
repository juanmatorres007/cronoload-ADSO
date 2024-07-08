<?php
header('Content-Type: application/json');
include_once "../../controller/CalendarController.php";
$calendarController = new CalendarController();

$action = $_POST['action'] ?? null;
$fichaId = $_POST['fichaId'] ?? null;
$calendarId = $_POST['calendarId'] ?? null;
$compId = $_POST['compId'] ?? null;
$areaId = $_POST['areaId'] ?? null;

try{
        switch ($action) {
            //--------MOSTRAR CALENDARIOS--------//

            case 'getCalendarByFicha':
                if ($fichaId) {
                    $calendar = $calendarController->getFichaCalendarById($fichaId);
                    if($calendar){
                        echo json_encode($calendar);
                    } else {
                        echo json_encode(['error' => 'Calendario no encontrado para este ficha']);
                    }
                } else {
                    echo json_encode(['erorr' => 'Ficha no proporcionada']);
                }
                break;

            case 'getEventsByCalendarId':
                if($_POST['action'] === 'getEventsByCalendarId') {
                    $calendarId = $_POST['calendarId'];
                    $events = $calendarController->getEventsByCalendarId($calendarId);
                    echo json_encode($events);
                } else {
                    echo json_encode(['error' => 'Ficha no encontrada para este calendario']);
                }
                break;

            //--------MOSTRAR CALENDARIOS--------//

            //------FUNCIONES SELECTS MODAL------//
    
            case 'getCompetition':
                $competitions = $calendarController->getCompetition();
                echo json_encode($competitions);
                break;
    
            case 'getResultados':
                $results = $calendarController->getResultados();
                echo json_encode($results);
                break;

            case 'getInstructorsByCompetition':
                if ($compId && $areaId) {
                    $instructors = $calendarController->getInstructorsByCompetition($compId, $areaId);
                    echo json_encode($instructors);
                } else {
                    echo json_encode(['error' => 'Competencia o area no proporcionadas']);
                }
                break;

            //------FUNCIONES SELECTS MODAL------//
    
            default:
            echo json_encode(['error' => 'Accion no identifica']);
            break;
        }
} catch (Exception $e) {
    echo json_encode(['error' => 'Internal Server Error', 'message' => $e->getMessage()]);
}
?>