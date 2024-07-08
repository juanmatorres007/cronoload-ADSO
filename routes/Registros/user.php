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
$state = $_REQUEST['state'];
$rol = $_REQUEST['rol'];
$know = $_REQUEST['id_know_user'];
$form_lvl = $_REQUEST['id_formation_lvl_user'];

//TERMINAR EL IFROL PARA CADA PROCESO 
    $registerUser = $userController->registerUser($name, $lastname, $type_id, $number_id, $birth, $genero, $state, $know, $form_lvl);
    if ($registerUser > 0) {
        $rolRegistered = $userController->registerRolUser($rol, $registerUser);
        if ($rolRegistered > 0) {
            $registerContacts = $userController->registerContact($email_user, $phone_user, $registerUser);
            if ($registerContacts > 0) {
                $registerAccess = $userController->registerAccess($number_id, $registerUser);
                if($registerAccess > 0) {
                    $registerAddress = $userController->registerAddress($departament, $city, $address, $registerUser);
                    if ($rol == "1"){
                        $file = $_REQUEST['file_user'];
                        $registerFile = $userController->registerFile($registerUser, $file);
                        if ($registerFile > 0) {
                            echo "Registro de aprendiz exitoso";
                        }
                    }else if($rol == "4" || $rol == "7"){
                        $contract_type = $_REQUEST['tcontrato'];
                        $start_date = $_REQUEST['startDate'];
                        $end_date = $_REQUEST['endDate'];
                        $registerVinculation = $userController->registerVinculation($start_date, $end_date, $contract_type, $registerUser);
                        if ($registerVinculation > 0) {
                            echo "Registro de Instructor Exitoso";
                        }
                    }
                }
            }
        }
    }

}else if($action === 'update'){

extract($_REQUEST);

$id_user = $_REQUEST['id'];
$name = $_REQUEST['name_user'];
$lastName = $_REQUEST['lastname'];
// $type_id = $_REQUEST['type_id'];
$numberId = $_REQUEST['number_id'];
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

            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Lo sentimos, solo se permiten archivos JPG, JPEG y PNG";
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
        // $updateUser = $userController->updateUser($id_user, $name, $lastName, $numberId, $birth);
        if($updateUser > 0){
            
        }
    }
}elseif($action === 'updates'){
    error_log(print_r($_REQUEST, true));

    extract($_REQUEST);
    $id_user = $_REQUEST['userId'];
    $rol = $_REQUEST['rolId']; // "1" == "Aprendiz" -- "4" == "Instructor" -- "7" == "Coordinador" -- "18" == "Administrador"
    $name = $_REQUEST['userName'];
    $lastName = $_REQUEST['userLastName'];
    $typeId = $_REQUEST['userTypeId'];
    $numberId = $_REQUEST['userNumberId'];
    $birth = $_REQUEST['userBirth'];
    $genero = $_REQUEST['userGenero'];
    $estado = $_REQUEST['userEstado'];

    if($rol == "1"){
        $updateUser = $userController->updateUser($id_user, $name, $lastName, $typeId, $numberId, $birth, $genero, $estado);
    } elseif ($rol == "4" || $rol == "7") {

            //----------FOREIGN KEYS----------//
        $typeContract = $_REQUEST['userTypeContract'];
        $knowArea = $_REQUEST['userknowArea'];
        $formationLvl = $_REQUEST['userFormationLvl'];
            //----------FOREIGN KEYS----------//

        $updateUser = $userController->updateUserWithExtras($id_user, $name, $lastName, $typeId, $numberId, $birth, $genero, $estado, $typeContract, $knowArea, $formationLvl);
    }

    // Manejo de la respuesta de la actualización
    if ($updateUser > 0) {
        // Éxito en la actualización
        echo json_encode(['status' => 'success', 'message' => 'Usuario actualizado correctamente']);
    } else {
        // Error en la actualización
        echo json_encode(['status' => 'error', 'message' => 'Error al actualizar usuario']);
    }

}