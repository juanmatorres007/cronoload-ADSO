<?php
include "../../controller/consultaController.php";

if(isset($_GET['consulta'])) {
    $consulta = $_GET['consulta'];
    
    $consultaController = new ConsultaController();
    $data = null;

    // Realiza la consulta según el valor seleccionado
    switch ($consulta) {
        case 'areaConocimiento':
            $data = $consultaController->getKnowArea(); // Supongamos que esta función obtiene los archivos por área de conocimiento
            break;
        case 'programa':
            $data = $consultaController->getProgram(); // Supongamos que esta función obtiene los archivos por programa
            break;
        case 'ficha':
            $data = $consultaController->getFile(); // Supongamos que esta función obtiene los archivos por ficha
            break;
        case 'proyecto':
            $data = $consultaController->getProject();
            break;   
        case 'contract':
            $data = $consultaController->getContract();
            break;   
        case 'genero':
            $data = $consultaController->getGenero();
            break;     
        case 'phase':
            $data = $consultaController->getPhase();   
            break;  
        case 'formation_lvl':
            $data = $consultaController->getFormation_lvl();
            break; 
        case 'activity':
            $data = $consultaController->getActivity();
            break;    
        case 'competition':
            $data = $consultaController->getCompetition();
            break;    
        case 'result':
            $data = $consultaController->getResult();
            break;    
        default:
            // Si el valor seleccionado no coincide con ninguna consulta conocida, devuelve un mensaje de error
            echo json_encode(array('error' => 'Consulta no válida'));
            exit;
    }

    // Devuelve los resultados de la consulta como r espuesta JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    // Si no se proporcionó un valor de consulta, devuelve un mensaje de error
    echo json_encode(array('error' => 'No se proporcionó un valor de consulta'));
}