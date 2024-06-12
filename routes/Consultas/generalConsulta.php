<?php
include "../../controller/consultaController.php";

if(isset($_GET['consulta'])) {
    
    $consultaController = new ConsultaController();
    // $data = null;

        if ($_GET['consulta'] === 'areaConocimiento'){
            $data = $consultaController->getKnowArea(); 
            header('Content-Type: application/json');
            echo json_encode($data);
        }elseif($_GET['consulta'] === 'programa'){
            $data = $consultaController->getProgram(); 
            header('Content-Type: application/json');
            echo json_encode($data);
        } elseif($_GET['consulta'] === 'ficha'){
            $data = $consultaController->getFile(); 
            header('Content-Type: application/json');
            echo json_encode($data);
        } elseif($_GET['consulta'] === 'proyecto'){
            $data = $consultaController->getProject();
            header('Content-Type: application/json');
            echo json_encode($data);
        } elseif($_GET['consulta'] === 'contract'){
            $data = $consultaController->getContract();
            header('Content-Type: application/json');
            echo json_encode($data);
        }elseif($_GET['consulta'] === 'genero'){
            $data = $consultaController->getGenero();
            header('Content-Type: application/json');
            echo json_encode($data);
        }elseif($_GET['consulta'] === 'phase'){
            $data = $consultaController->getPhase();   
            header('Content-Type: application/json');
            echo json_encode($data);
        }elseif($_GET['consulta'] === 'formation_lvl'){
            $data = $consultaController->getFormation_lvl();
            header('Content-Type: application/json');
            echo json_encode($data);
        } elseif($_GET['consulta'] === 'activity'){
            $data = $consultaController->getActivity();
            header('Content-Type: application/json');
            echo json_encode($data);
        } elseif($_GET['consulta'] === 'competition'){
            $data = $consultaController->getCompetition();
            header('Content-Type: application/json');
            echo json_encode($data);
        } elseif($_GET['consulta'] === 'result'){
            $data = $consultaController->getResult();
            header('Content-Type: application/json');
            echo json_encode($data);
        }
} else {
    // Si no se proporcionó un valor de consulta, devuelve un mensaje de error
    echo json_encode(array('error' => 'No se proporcionó un valor de consulta'));
}