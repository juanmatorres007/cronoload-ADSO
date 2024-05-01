<?php

class SessionModel
{

    private $conn;

    public function __construct()
    {
        $this->db();
    }

    public function db()
    {
        $this->conn = conectaDb();
    }

    public function iniciarSesion($number_ident, $pass)
    {

        $sql = $this->conn->prepare("SELECT * FROM acceso WHERE account_acc=? AND password_acc=?");
        $sql->bindParam(1, $number_ident);
        $sql->bindParam(2, $pass);
        $sql->execute();

        $usuario = $sql->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            $sqlUser = $this->conn->prepare("SELECT * FROM user WHERE id_auto_user=?");
            $sqlUser->bindParam(1, $usuario['id_user_acc']); 
            $sqlUser->execute();
            $datosUsuario = $sqlUser->fetch(PDO::FETCH_ASSOC);
            
            if ($datosUsuario){
                session_start();
                $_SESSION["usuario"] = array_merge($usuario, $datosUsuario);
                return $_SESSION['usuario'];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function cerrarSesion()
    {
        // Aquí iría la lógica para cerrar la sesión del usuario
        // Por ejemplo, eliminar la información de la sesión actual
    }
}
