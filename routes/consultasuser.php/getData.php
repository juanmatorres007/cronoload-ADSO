<?php

include_once "../controller/consultaController.php";
$consultaController = new consultaController();

if (isset($_GET['type_id'])) {
    $type_id = $_GET['type_id'];

    $tipo_documento = $consultaController->getUserDocumentType($type_id);

    echo $tipo_documento;

    
}elseif(isset($_GET['genero_id'])){
    $genero_id = $_GET['genero_id'];

    $getUserGenero = $consultaController->getUserGenero($genero_id);

    echo $getUserGenero;

}elseif(isset($_GET['phone_id'])){
    $phone_id = $_GET['phone_id'];

    $getUserPhone = $consultaController->getUserPhone($phone_id);

    echo $getUserPhone;

}elseif(isset($_GET['email_id'])){
    $email_id = $_GET['email_id'];

    $getUserEmail = $consultaController->getUserEmail($email_id);

    echo $getUserEmail;
}elseif(isset($_GET['ficha_id'])){
    $ficha_id = $_GET['ficha_id'];

    $getUserFicha = $consultaController->getUserFicha($ficha_id);

    echo $getUserFicha;
}elseif(isset($_GET['departamento_id'])){
    $departamento_id = $_GET['departamento_id'];

    $getUserDepartamento = $consultaController->getUserDepartamento($departamento_id);

    echo $getUserDepartamento;
}elseif(isset($_GET['municipio_id'])){
    $municipio_id = $_GET['municipio_id'];

    $getUserMunicipio = $consultaController->getUserMunicipio($municipio_id);

    echo $getUserMunicipio;
}elseif(isset($_GET['direccion_id'])) {
    $direccion_id = $_GET['direccion_id'];

    $getUserDireccion = $consultaController->getUserDireccion($direccion_id);

    echo $getUserDireccion;
}else{
    echo "Error: No se proporcionó el ID del tipo de documento.";
}
