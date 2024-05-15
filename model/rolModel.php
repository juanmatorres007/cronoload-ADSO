<?php
class RolModel
{
  private $conn;

  public function __construct(){

    $this->db();

  }

  public function db(){

    $this->conn = conectaDb();

  }

  public function insertRol($name_rol, $state_rol){

    $sql = $this->conn->prepare("INSERT INTO rol (name_rol,state_rol,date_register_rol) VALUES (?,?,now())");

    $sql->bindParam(1, $name_rol);
    $sql->bindParam(2, $state_rol);
    $rol = $sql->execute();
    return $rol;
  }

  public function consulRol(){

    $roles_query = "SELECT id_auto_rol, name_rol FROM rol";
    $roles_result = $this->conn->query($roles_query);

    // Array para almacenar los datos de los roles 
    $roles_data = array();

    // Procesar resultados de roles 
    if ($roles_result) {
      while($row = $roles_result->fetch(PDO::FETCH_ASSOC)) {
        $role_name = $row["name_rol"];
        $role_id = $row["id_auto_rol"];
        $roles_data[$role_name] = $role_id;        
      }
}

  $this->conn = null;

  return $roles_data;
  }
}