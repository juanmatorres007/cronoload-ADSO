<?php
include_once "../../controller/consultaController.php";
$consultaController = new ConsultaController;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['rol'])) {
        $rol = $_GET['rol'];
        $getAllUser = $consultaController->getAllDataUser($rol);
        echo json_encode($getAllUser);
    } elseif (isset($_GET['userId'])) {
        $userId = $_GET['userId'];
        $userData = $consultaController->getUserData($userId);
        echo json_encode($userData);
    } else {
        http_response_code(400); // Bad Request
        echo json_encode(array("message" => "Solicitud no válida"));
    }
} else {
    // Manejar otros métodos HTTP si es necesario
    http_response_code(405); // Método no permitido
    echo json_encode(array("message" => "Método no permitido"));
}
?>
