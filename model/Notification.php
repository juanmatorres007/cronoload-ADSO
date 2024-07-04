<?php
require_once '../conexion/conexion.php';
class Notification {
    public function saveNotification($user, $msg, $file) {
        try {
            $conn = conectaDb();
            $sql = "INSERT INTO `notification`(`user_not`, `notification`, `file_not`) VALUES (:usuario, :msg, :archivo)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':usuario', $user, PDO::PARAM_STR);
            $stmt->bindParam(':msg', $msg, PDO::PARAM_STR);
            $stmt->bindParam(':archivo', $file, PDO::PARAM_STR);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: en la consulta " . $e->getMessage();
            return false;
        }
    }
}

