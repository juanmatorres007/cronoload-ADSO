<?php
header('Content-Type: application/json');
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

    // Recibir datos directamente de $_POST
     $table = $_POST['table'] ?? null;
     $idField = $_POST['idField'] ?? null;
     $id = $_POST[$idField] ?? null;

     echo $table;

    // Verificar si los datos recibidos son válidos
    if (!$table || !$idField || !$id || !isset($_POST[$idField])) {
        echo json_encode(['error' => 'Datos de actualización no válidos']);
        exit; // Terminar el script si los datos no son válidos
    }
     
    // Crear conexión a la base de datos (reemplazar con tus datos de conexión)
    $conn = new mysqli('localhost', 'root', '', 'programador2');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
 

    $// Construir la cadena SET para la consulta UPDATE
    $setValues = [];
    foreach ($_POST as $key => $value) {
        if ($key !== 'table' && $key !== 'idField' && $key !== $idField) {
            $setValues[] = "$key = '$value'";
        }
    }
    $setString = implode(', ', $setValues);

    // Construir y ejecutar la consulta UPDATE
    $updateQuery = "UPDATE $table SET $setString WHERE $idField = '$id'";
    
    if ($conn->query($updateQuery) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Error actualizando los datos: ' . $conn->error]);
    }

    $conn->close();

} else {
    echo json_encode(['error' => 'Acceso no permitido']); // Manejar acceso incorrecto al script


}
