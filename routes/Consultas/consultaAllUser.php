<?php
// Incluir el controlador necesario
include_once "../../controller/consultaController.php";

// Crear una instancia del controlador
$consultaController = new ConsultaController;

// Verificar qué tipo de solicitud se está haciendo
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Si se está solicitando todos los usuarios
    if (isset($_GET['rol'])) {
        $rol = $_GET['rol'];
        $getAllUser = $consultaController->getAllDataUser($rol);
        echo json_encode($getAllUser);
    } elseif (isset($_GET['userId'])) {
        // Si se está solicitando un usuario específico por su ID
        $userId = $_GET['userId'];
        $userData = $consultaController->getUserData($userId);
        echo json_encode($userData);
    } else {
        // Manejar otro tipo de solicitud o error
        http_response_code(400); // Bad Request
        echo json_encode(array("message" => "Solicitud no válida"));
    }
} else {
    // Manejar otros métodos HTTP si es necesario
    http_response_code(405); // Método no permitido
    echo json_encode(array("message" => "Método no permitido"));
}
?>
