<?php
include_once "../conexion/conexion.php";
include "../model/loginModel.php";
 
class ViewController{

    private $loginModel;

    public function __construct() {
        $this->loginModel = new LoginModel();
    }

    public function login($number_ident,$pass) {
        $loginModel = new LoginModel();
        $usuario_valido = $loginModel->startSession($number_ident,$pass);
        if ($usuario_valido) {
            return $usuario_valido;
        } else {
            // Credenciales inválidas, mostrar mensaje de error
            $error = "Usuario o contraseña incorrectos";
            require_once("../index.php"); 
        }
    }
}