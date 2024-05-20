<?php

class UserModel
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

  public function registerUser($name, $lastname, $type_id, $number_id, $know, $form_lvl)
  {
    $sql = $this->conn->prepare("INSERT INTO user(name_user, lastname_user, type_id_user, number_id_user, id_know_user, id_formation_lvl_user)
        VALUES (?,?,?,?,?,?)");

    $sql->bindParam(1, $name);
    $sql->bindParam(2, $lastname);
    $sql->bindParam(3, $type_id);
    $sql->bindParam(4, $number_id);
    $sql->bindParam(5, $know);
    $sql->bindParam(6, $form_lvl);
    $sql->execute();

    $rta = $sql->rowCount();
    $varid = $this->conn->lastInsertId();
    return $varid;
  }

  public function registerRolUser($rol, $userInfo)
  {

    $sql = $this->conn->prepare("INSERT INTO relation_rol_user(id_rol_relaru, id_user_relaru) VALUES (?,?)");

    $sql->bindParam(1, $rol);
    $sql->bindParam(2, $userInfo);
  }

  public function registerVinculation($contract_type, $star_date, $end_date, $userInfo)
  {
    $sql = $this->conn->prepare("INSERT INTO vinculation(start_date_vin, end_date_vin, id_contractType_vin id_user_vin) VALUES(?,?,?,?)");
    $sql->bindParam(1, $star_date);
    $sql->bindParam(2, $end_date);
    $sql->bindParam(3, $userInfo);
    $sql->bindParam(4, $userInfo);
    $sql->execute();
    $rta = $sql->rowCount();
    return $rta;
  }

  public function registerArea($Nombre, $Fecha, $Estado)
  {
    $sql = $this->conn->prepare("INSERT INTO knowledge_area(area_name_know, date_register_know, state_know) VALUES(?,?,?)");
    $sql->bindParam(1, $Nombre);
    $sql->bindParam(2, $Fecha);
    $sql->bindParam(3, $Estado);
    $sql->execute();
    $rta = $sql->rowCount();
    return $rta;
  }

  public function registerFile($file, $userInfo)
  {

    $sql = $this->conn->prepare("INSERT INTO relarion_user_file(id_user_reluf, id_file_reluf) VALUES (?,?)");
    $sql->bindParam(1, $file);
    $sql->bindParam(2, $userInfo);
    $sql->execute();
    $rta = $sql->rowCount();

    return $rta;
  }

  public function registerContract($contract_name){
    $sql = $this->conn->prepare("INSERT INTO contracts(name_cont) Values (?)");
    $sql->bindParam(1,$contract_name);
    $sql->execute();

    $rta = $sql->rowCount();
    $id_contract = $this->conn->lastInsertId();
    return $id_contract;
  }

  public function getKnowArea(){

    $knowArea_query = "SELECT id_auto_know, area_name_know FROM knowledge_area";
    $knowArea_result = $this->conn->query($knowArea_query);

    $knowArea_data = array();

    if ($knowArea_result) {
      while ($row = $knowArea_result->fetch(PDO::FETCH_ASSOC)) {
        $knowArea_name = $row["area_name_know"];
        $knowArea_id = $row["id_auto_know"];
        $knowArea_data[$knowArea_name] = $knowArea_id;
      }
    }

    $this->conn = null;

    return $knowArea_data;
  }

  public function getKnowFile(){

    $knowFile_query = "SELECT id_auto_fil, number_file FROM ficha";
    $knowFile_result = $this->conn->query($knowFile_query);

    $knowFile_data = array();

    if ($knowFile_result) {
      while ($row = $knowFile_result->fetch(PDO::FETCH_ASSOC)) {
        $knowFile_name = $row["number_file"];
        $knowFile_id = $row["id_auto_fil"];
        $knowFile_data[$knowFile_name] = $knowFile_id;
      }
    }

    $this->conn = null;

    return $knowFile_data;
  }

  public function getLvlForm()
  {

    $lvlForm_query = "SELECT id_auto_flvl, name_flvl FROM formation_lvl";
    $lvlForm_result = $this->conn->query($lvlForm_query);

    $lvlForm_data = array();

    if ($lvlForm_result) {
      while ($row = $lvlForm_result->fetch(PDO::FETCH_ASSOC)) {
        $lvlForm_name = $row["name_flvl"];
        $lvlForm_id = $row["id_auto_flvl"];
        $lvlForm_data[$lvlForm_name] = $lvlForm_id;
      }
    }

    $this->conn = null;

    return $lvlForm_data;
  }

  public function getContractType()
  {

    $contractType_query = "SELECT id_auto_cont, name_cont FROM contracts";
    $contractType_result = $this->conn->query($contractType_query);

    $contractType_data = array();

    if ($contractType_result) {
      while ($row = $contractType_result->fetch(PDO::FETCH_ASSOC)) {
        $contractType_name = $row["name_cont"];
        $contractType_id = $row["id_auto_cont"];
        $contractType_data[$contractType_name] = $contractType_id;
      }
    }

    $this->conn = null;

    return $contractType_data;
  }

  public function registerProyect($name, $number, $estado, $var_fecha, $id_area)
  {
    $sql = $this->conn->prepare("INSERT INTO project(name_proj, number_proj, state_proj, register_date_proj, id_knowledge_area_proj)
        VALUES(?,?,?,?,?)");
    $sql->bindParam(1, $name);
    $sql->bindParam(2, $number);
    $sql->bindParam(3, $estado);
    $sql->bindParam(4, $var_fecha);
    $sql->bindParam(5, $id_area);
    $sql->execute();
    $rta = $sql->rowCount();
    return $rta;
  }
}
