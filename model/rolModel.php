<?php
class RolModel{
  private $conn;
   
      public function __construct(){
        $this->db();
      }

      public function db(){

        $this->conn = conectaDb();
      }

      public function insertRol($name_rol, $state_rol){

        $sql = $this->conn->prepare("INSERT INTO rol (name_rol,state_rol,date_register_rol) VALUES (?,?,now())");

        $sql -> bindParam(1,$name_rol);
        $sql -> bindParam(2,$state_rol);

        $rol = $sql -> execute();

        return $rol;
      }

      public function consulRol(){

        $sql = $this->conn->prepare("SELECT name_rol FROM rol");
        $sql -> execute();
        
        return $sql->fetchAll(PDO::FETCH_COLUMN);
      }
}