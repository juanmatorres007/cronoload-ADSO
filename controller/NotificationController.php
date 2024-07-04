<?php
session_start();
require_once '../conexion/conexion.php';
require_once '../model/Notification.php';

class NotificationController {
    public function sendNotification() {
        if ($_POST) {
            $name = $_SESSION["usuario"]['name_user'] . ' ' . $_SESSION['usuario']['lastname_user'];
            $msg = $_POST['msg'];
            $ach = '';

            // Manejo del archivo subido
            if (isset($_FILES['fileNot']) && $_FILES['fileNot']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['fileNot']['tmp_name'];
                $fileName = $_FILES['fileNot']['name'];
                $fileSize = $_FILES['fileNot']['size'];
                $fileType = $_FILES['fileNot']['type'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));

                // Limitar los tipos de archivo permitidos
                $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc', 'pdf', 'docx', 'xls', 'xlsx', 'pdf', 'zip');
                if (in_array($fileExtension, $allowedfileExtensions)) {
                    // Directorio donde se guardará el archivo
                    $uploadFileDir = '../upload/files/';
                    $dest_path = $uploadFileDir . $fileName;

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $ach = $dest_path;
                    } else {
                        echo 'Error al mover el archivo subido al directorio de destino.';
                    }
                } else {
                    echo 'Subida fallida. Tipo de archivo no permitido.';
                }
            }

            // Guardar notificación
            $notification = new Notification();
            if ($notification->saveNotification($name, $msg, $ach)) {
                header('Location: ../view/viewNotification.php');
                exit();
            } else {
                echo "Algo salió mal";
            }
        }
    }
}
class NotiController {
    private $model;

    public function __construct($dbConnection) {
        $this->model = new NotificationModel($dbConnection);
    }

    public function showNotifications() {
        try {
            $notifications = $this->model->getAllNotifications();
            include '../view/notification.php';
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
