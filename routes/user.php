<?php
include_once "../controller/userController.php";

extract($_REQUEST);

$name = $_REQUEST['name_user'];
$lastname = $_REQUEST['lastname_user'];
$type_id = $_REQUEST['type_id_user'];
$number_id = $_REQUEST['number_id_user'];
$know = $_REQUEST['id_know_user'];
$file = $_REQUEST['file_user'];
$form_lvl = $_REQUEST['id_formation_lvl_user'];
$contract_type= $_REQUEST['tcontrato'];
$star_date = $_REQUEST['FI'];
$end_date = $_REQUEST['FF'];
$rol = $_REQUEST['rol'];

$userController = new UserController();
$userInfo = $userController->validarRegistro($name, $lastname, $type_id, $number_id, $know, $form_lvl);
    if($userInfo > 0) {
        $rolRegistered = $userController->registerRolUser($rol,$userInfo);
        echo "Registro exitoso hasta el rol";
            if ($rolRegistered > 0) {
                $registerVinculation = $userController->registerVinculation($contract_type, $star_date, $end_date, $userInfo);
                echo "Registro exitoso hasta la vinculacion";
                    if($registerVinculation > 0) {
                        $registerFile = $userController->registerFile($file, $userInfo);
                        echo "Registro exitoso hasta la ficha";
                    }
            }
    }