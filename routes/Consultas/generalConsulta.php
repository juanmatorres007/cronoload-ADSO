<?php
include "../../controller/consultaController.php";

$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action === 'consulta') {

    if (isset($_GET['consulta'])) {

        $consultaController = new ConsultaController();
        // $data = null;

        if ($_GET['consulta'] === 'areaConocimiento') {
            $data = $consultaController->getKnowArea();
            header('Content-Type: application/json');
            echo json_encode($data);
        } elseif ($_GET['consulta'] === 'programa') {
            $data = $consultaController->getProgram();
            header('Content-Type: application/json');
            echo json_encode($data);
        } elseif ($_GET['consulta'] === 'ficha') {
            $data = $consultaController->getFile();
            header('Content-Type: application/json');
            echo json_encode($data);
        } elseif ($_GET['consulta'] === 'proyecto') {
            $data = $consultaController->getProject();
            header('Content-Type: application/json');
            echo json_encode($data);
        } elseif ($_GET['consulta'] === 'contract') {
            $data = $consultaController->getContract();
            header('Content-Type: application/json');
            echo json_encode($data);
        } elseif ($_GET['consulta'] === 'genero') {
            $data = $consultaController->getGenero();
            header('Content-Type: application/json');
            echo json_encode($data);
        } elseif ($_GET['consulta'] === 'phase') {
            $data = $consultaController->getPhase();
            header('Content-Type: application/json');
            echo json_encode($data);
        } elseif ($_GET['consulta'] === 'formation_lvl') {
            $data = $consultaController->getFormation_lvl();
            header('Content-Type: application/json');
            echo json_encode($data);
        } elseif ($_GET['consulta'] === 'activity') {
            $data = $consultaController->getActivity();
            header('Content-Type: application/json');
            echo json_encode($data);
        } elseif ($_GET['consulta'] === 'competition') {
            $data = $consultaController->getCompetition();
            header('Content-Type: application/json');
            echo json_encode($data);
        } elseif ($_GET['consulta'] === 'result') {
            $data = $consultaController->getResult();
            header('Content-Type: application/json');
            echo json_encode($data);
        }
    } else {
        // Si no se proporcionó un valor de consulta, devuelve un mensaje de error
        echo json_encode(array('error' => 'No se proporcionó un valor de consulta'));
    }
} elseif ($action === 'update') {

    $input = json_decode(file_get_contents('php//input'), true);
    $table = $input['table'];
    $idField = $input['idField'];
    $id = $input[$idField];

    $setValues = [];
    foreach ($input as $key => $value) {
        if ($key !== 'table' && $key !== 'idField') {
            $setValues[] = "$key = '$value'";
        }
    }
    $setString = implode(', ', $setValues);
    
    $updateQuery = "UPDATE $table SET $setString WHERE $idField = '$id'";
    
    if (mysqli_query($conn, $updateQuery)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Error actualizando los datos']);
    }

}
