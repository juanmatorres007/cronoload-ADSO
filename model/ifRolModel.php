<?php

class ifRolModel
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

  public function getSessionRol($id_usuario){
    $sessionRol_query = "SELECT name_rol FROM rol, relation_rol_user WHERE id_auto_rol = id_rol_relaru AND id_user_relaru = :id_usuario";  
    $stmt = $this->conn->prepare($sessionRol_query);
    $stmt->bindParam(':id_usuario', $id_usuario);
    
    if($stmt->execute()){
        return $stmt->fetchColumn();
    } else {
        $errorInfo = $stmt->errorInfo();
        return array('error' => 'Error encontrando el género: ' . $errorInfo[2]);
    }
  }
}