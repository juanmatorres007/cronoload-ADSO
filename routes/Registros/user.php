<?php
include_once "../../controller/userController.php";

$action = isset($_GET['action']) ? $_GET['action'] : '';

extract($_REQUEST);

$userController = new UserController();

if ($action === 'register') {

$name = $_REQUEST['name_user'];
$lastname = $_REQUEST['lastname_user'];
$type_id = $_REQUEST['type_id_user'];
$number_id = $_REQUEST['number_id_user'];
$genero = $_REQUEST['genero_user'];
$birth = $_REQUEST['birth'];
$email_user = $_REQUEST['email_user'];
$phone_user = $_REQUEST['phone_user'];
$departament = $_REQUEST['id_dept_user'];
$city = $_REQUEST['id_mun_user'];
$address = $_REQUEST['address_user'];
$rol = $_REQUEST['rol'];
$file = $_REQUEST['file_user'];
$contract_type = $_REQUEST['tcontrato'];
$start_date = $_REQUEST['startDate'];
$end_date = $_REQUEST['endDate'];
$know = $_REQUEST['id_know_user'];
$form_lvl = $_REQUEST['id_formation_lvl_user'];

    $registerUser = $userController->registerUser($name, $lastname, $type_id, $number_id, $know, $form_lvl, $genero, $birth);
    if ($registerUser > 0) {
        $rolRegistered = $userController->registerRolUser($rol, $registerUser);
        if ($rolRegistered > 0) {
            $registerVinculation = $userController->registerVinculation($start_date, $end_date, $contract_type, $registerUser);
            if ($registerVinculation > 0) {
                $registerFile = $userController->registerFile($registerUser, $file);
                if ($registerFile > 0) {
                    $registerContacts = $userController->registerContact($email_user, $phone_user, $registerUser);
                    if ($registerContacts > 0) {
                        $registerAccess = $userController->registerAccess($number_id, $registerUser);
                        if($registerAccess > 0) {
                            $registerAddress = $userController->registerAddress($departament, $city, $address, $registerUser);
                        }if ($registerAddress > 0){
                            // echo "Registro finalizado hasta el acceso";
                        }
                    }
                }
            }
        }
    }
}

elseif($action === 'update'){

extract($_REQUEST);

$id_user = $_REQUEST['id'];
$name = $_REQUEST['name_user'];
$lastname = $_REQUEST['lastname'];
// $type_id = $_REQUEST['type_id'];
$number_id = $_REQUEST['number_id'];
// $genero = $_REQUEST['genero_id'];
$birth = $_REQUEST['birth_id'];
// $phone_user = $_REQUEST['phone_id'];
// $email_user = $_REQUEST['email_id'];
// $departament = $_REQUEST['departamento_id'];
// $city = $_REQUEST['municipio_id'];
// $address = $_REQUEST['direccion_id'];
// $file = $_REQUEST['ficha_id'];
// $contract_type = $_REQUEST['contrato_id'];
// $start_date = $_REQUEST['startContrato_id'];
// $end_date = $_REQUEST['endContrato_id'];
// $know = $_REQUEST['know_id'];
// $form_lvl = $_REQUEST['lvl_id'];

    if (isset($_POST["btn"])) {
        $id_user = $_REQUEST['id'];
        $imagen = $_POST['imageUrl'];
        $targetDir = "../../img/imgPrueba/";
        $targetFile = $targetDir . basename($_FILES["newPhoto"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["newPhoto"]["tmp_name"]);
                if ($check !== false) {
                    echo "El archivo es una imagen - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                echo "El archivo no es una imagen.";
                $uploadOk = 0;
                }
            }

            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Lo sentimos, solo se permiten archivos JPG, JPEG, PNG y GIF.";
            $uploadOk = 0;
            }

            if ($uploadOk == 0) {
                echo "Tu archivo no fue subido.";
            } else {
                if (move_uploaded_file($_FILES["newPhoto"]["tmp_name"], $targetFile)) {
                    echo "El archivo " . htmlspecialchars(basename($_FILES["newPhoto"]["name"])) . " ha sido subido correctamente.";
                } else {
                    echo "Lo sentimos, hubo un error al subir tu archivo.";
                }
            }
    }

    $updateUserPhoto = $userController->updateUserPhoto($imagen, $id_user);
    if($updateUserPhoto > 0){
        $updateUser = $userController->updateUser($id_user, $name, $lastname, $number_id, $birth);
        if($updateUser > 0){
            
        }
    }
}