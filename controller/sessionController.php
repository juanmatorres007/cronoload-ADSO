<?php

include_once "../conexion/conexion.php";
include_once "../model/sessionModel.php";

class SessionController {
    public function iniciarSesion($number_ident, $pass) {
        $usuarioModel = new SessionModel();
        
        $usuario = $usuarioModel->iniciarSesion($number_ident, $pass);
        
        if (!empty($usuario)) {
            header("Location: ../view/headerContenido.php");
            exit();
        } else {
            $error = "Usuario o contraseña incorrectos";
            include_once("../index.php");
        }
        return $usuario;
    }
    
    public function cerrarSesion() {
        $usuarioModel = new SessionModel();
        
        $usuarioModel->cerrarSesion();
        header("Location: login.php");
        exit();
    }
    
}