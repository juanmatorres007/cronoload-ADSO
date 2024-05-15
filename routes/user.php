<?php
include_once "../controller/userController.php";

extract($_REQUEST);

$name = $_REQUEST['name_user'];
$lastname = $_REQUEST['lastname_user'];
$type_id = $_REQUEST['type_id_user'];
$number_id = $_REQUEST['number_id_user'];
$know = $_REQUEST['id_know_user'];
$form_lvl = $_REQUEST['id_information_lvl_user'];
$contract_type= $_REQUEST['tcontrato'];
$star_date = $_REQUEST['FI'];
$end_date = $_REQUEST['FF'];
$rol = $_REQUEST['rol'];

$userController = new UserController();

    $userInfo = $userController->validarRegistro($name, $lastname, $type_id, $number_id, $know, $form_lvl);
    echo $userInfo;
        if($userInfo > 0){
            $rolRegistered = $userController->registerRolUser($rol,$userInfo);
            }
        if ($datosregistrado > 0) {
            $respuesta = $userController->registroVinculacion($contract_type, $star_date, $end_date, $datosregistrado);
        }
// if() {
//     $updateUser = $registrouser->update($name, $lastname, $tipoid, $noid, $aredc, $fromlvl, $datosregistrado);    
// }