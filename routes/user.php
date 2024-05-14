<?php
include_once "../controller/userController.php";

extract($_REQUEST);

$name = $_REQUEST['name_user'];
$lastname = $_REQUEST['lastname_user'];
$tipoid = $_REQUEST['type_id_user'];
$noid = $_REQUEST['munber_id_user'];
$aredc = $_REQUEST['id_know_user'];
$fromlvl = $_REQUEST['id_information_lvl_user'];
$tipo_contrato = $_REQUEST['tcontrato'];
$fecha_I_contrato = $_REQUEST['FI'];
$fecha_F_contrato = $_REQUEST['FF'];
$rol = $_REQUEST['rol'];

$userController = new UserController();
$userController->showRegistrationForm();

if($userController > 0){
    $datosregistrado = $userController->validarRegistro($name, $lastname, $tipoid, $noid, $aredc, $fromlvl);
    echo $datosregistrado;
        if ($datosregistrado > 0) {
            $respuesta = $userController->registroVinculacion($tipo_contrato, $fecha_I_contrato, $fecha_F_contrato, $datosregistrado);
        }
}
// if() {
//     $updateUser = $registrouser->update($name, $lastname, $tipoid, $noid, $aredc, $fromlvl, $datosregistrado);    
// }