<?php

class LoginModel{

    private $conn;

    public function __construct(){
        $this->db();
    }

    public function db(){
        $this->conn = conectaDb();
    }

    public function startSession($number_ident, $pass){

         $sql = $this -> conn -> prepare("SELECT * FROM acceso WHERE account_acc=? AND password_acc=?");
         $sql -> bindParam(1, $number_ident);
         $sql -> bindParam(2, $pass);
         $sql -> execute();

         $usuario_valido = $sql->fetchAll(PDO::FETCH_ASSOC);
         return $usuario_valido;
    }
}