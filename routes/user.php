<?php
include_once "../controller/userController.php";

$action = isset($_GET['action']) ? $_GET['action'] : '';

extract($_REQUEST);

$name = $_REQUEST['name_user'];
$lastname = $_REQUEST['lastname_user'];
$type_id = $_REQUEST['type_id_user'];
$number_id = $_REQUEST['number_id_user'];
$phone_user = $_REQUEST['phone_user'];
$email_user = $_REQUEST['email_user'];
$know = $_REQUEST['id_know_user'];
$file = $_REQUEST['file_user'];
$form_lvl = $_REQUEST['id_formation_lvl_user'];
$contract_type = $_REQUEST['tcontrato'];
$start_date = $_REQUEST['FI'];
$end_date = $_REQUEST['FF'];
$rol = $_REQUEST['rol'];
$genero = $_REQUEST['genero_user'];
$address = $_REQUEST['address_user'];
$city = $_REQUEST['id_mun_user'];
$departament = $_REQUEST['id_dept_user'];

$userController = new UserController();

if ($action === 'register') {
    $userInfo = $userController->validarRegistro($name, $lastname, $type_id, $number_id, $know, $form_lvl, $genero);
    if ($userInfo > 0) {
        $rolRegistered = $userController->registerRolUser($rol, $userInfo);
        if ($rolRegistered > 0) {
            $registerVinculation = $userController->registerVinculation($start_date, $end_date, $contract_type, $userInfo);
            if ($registerVinculation > 0) {
                $registerFile = $userController->registerFile($userInfo, $file);
                if ($registerFile > 0) {
                    $registerContacts = $userController->registerContact($email_user, $phone_user, $userInfo);
                    if ($registerContacts > 0) {
                        $registerAccess = $userController->registerAccess($number_id, $userInfo);
                        if($registerAccess > 0) {
                            $registerAddress = $userController->registerAddress($departament, $city, $address, $userInfo);
                        }if ($registerAddress > 0){
                            // echo "Registro finalizado hasta el acceso";
                        }
                    }
                }
            }
        }
    }
}


// elseif($action === 'update'){
//     $sessionDocument = $userController->getUserDocumentType($type_id);
// }

