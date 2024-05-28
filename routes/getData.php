<?php

include_once "../controller/consultaController.php";
$consultaController = new consultaController();

if (isset($_GET['type_id'])) {
    $type_id = $_GET['type_id'];

    $tipo_documento = $consultaController->getUserDocumentType($type_id);

    echo $tipo_documento;

    
}else
if
(isset($_GET['genero_id'])){
    $genero_id = $_GET['genero_id'];

    $getUserGenero = $consultaController->getUserGenero($genero_id);

    echo $getUserGenero;
}elseif(isset($_GET['phone_id'])){
    $phone_id = $_GET['phone_id'];

    $getUserPhone = $consultaController->getUserPhone($phone_id);
} else {
    echo "Error: No se proporcionó el ID del tipo de documento.";
}
