<?php
include_once "../../controller/consultaController.php";
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

    header('Content-Type: application/json');
    echo json_encode($getUserDepartamento);

}elseif(isset($_GET['municipio_id'])){
    $municipio_id = $_GET['municipio_id'];

    $getUserMunicipio = $consultaController->getUserMunicipio($municipio_id);

    header('Content-Type: application/json');
    echo json_encode($getUserMunicipio);

}elseif(isset($_GET['direccion_id'])) {
    $direccion_id = $_GET['direccion_id'];

    $getUserDireccion = $consultaController->getUserDireccion($direccion_id);

    echo $getUserDireccion;

}elseif(isset($_GET['contrato_id'])){
    $contrato_id = $_GET['contrato_id'];

    $getUserContrato = $consultaController->getUserContrato($contrato_id);

    echo $getUserContrato;

}elseif(isset($_GET['startContrato_id'])){
    $startContrato_id =  $_GET['startContrato_id'];

    $getUserStartContrato = $consultaController->getUserStartContrato($startContrato_id);

    header('Content-Type: application/json');
    echo json_encode($getUserStartContrato);

}elseif(isset($_GET['endContrato_id'])){
    $endContrato_id =  $_GET['endContrato_id'];

    $getUserEndContrato = $consultaController->getUserEndContrato($endContrato_id);

    header('Content-Type: application/json');
    echo json_encode($getUserEndContrato);

}elseif(isset($_GET['know_id'])){
    $know_id = $_GET['know_id'];

    $getUserKnow = $consultaController->getUserKnow($know_id);

    echo $getUserKnow;

}elseif(isset($_GET['lvl_id'])){
        $lvl_id = $_GET['lvl_id'];
    
        $getUserLvl = $consultaController->getUserLvl($lvl_id);
    
        echo $getUserLvl;

}elseif(isset($_GET['photo_id'])){
    $photo_id = $_GET['photo_id'];

    $getUserPhoto = $consultaController->getUserPhoto($photo_id);

    echo $getUserPhoto;
}else{
    echo "Error: No se proporcionó el ID del tipo de documento.";
}
