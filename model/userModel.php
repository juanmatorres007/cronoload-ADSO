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

  public function registerUser($name, $lastname, $type_id, $number_id, $know, $form_lvl, $genero, $birth){
    $sql = $this->conn->prepare("INSERT INTO user(name_user, lastname_user, type_id_user, number_id_user, birth_user,
    id_gen_user, id_know_user, id_formation_lvl_user) VALUES (?,?,?,?,?,?,?,?)");

    $sql->bindParam(1, $name);
    $sql->bindParam(2, $lastname);
    $sql->bindParam(3, $type_id);
    $sql->bindParam(4, $number_id);
    $sql->bindParam(5, $birth);
    $sql->bindParam(6, $genero);
    $sql->bindParam(7, $know);
    $sql->bindParam(8, $form_lvl);
    $sql->execute();

    $rta = $sql->rowCount();
    $varId = $this->conn->lastInsertId();
    return $varId;
  }

  public function registerRolUser($rol, $registerUser){

    $sql = $this->conn->prepare("INSERT INTO relation_rol_user(id_rol_relaru, id_user_relaru) VALUES (?,?)");

    $sql->bindParam(1, $rol);
    $sql->bindParam(2, $registerUser);
    $sql->execute();
    $rolFull = $sql->rowCount();
    return $rolFull;
  }

  public function registerVinculation($start_date, $end_date, $contract_type, $registerUser){

    $sql = $this->conn->prepare("INSERT INTO vinculation(start_date_vin, end_date_vin, id_contractType_vin, id_user_vin) VALUES (?,?,?,?)");

    $sql->bindParam(1, $start_date);
    $sql->bindParam(2, $end_date);
    $sql->bindParam(3, $contract_type);
    $sql->bindParam(4, $registerUser);
    $sql->execute();
    $rta = $sql->rowCount();
    return $rta;
  }

  public function registerArea($Nombre, $Fecha, $Estado){

    $sql = $this->conn->prepare("INSERT INTO knowledge_area(area_name_know, date_register_know, state_know) VALUES(?,?,?)");
    $sql->bindParam(1, $Nombre);
    $sql->bindParam(2, $Fecha);
    $sql->bindParam(3, $Estado);
    $sql->execute();
    $rta = $sql->rowCount();
    return $rta;
  }

  public function registerFile($registerUser, $file){

    $sql = $this->conn->prepare("INSERT INTO relation_user_file(id_user_reluf, id_file_reluf) VALUES (?,?)");
    $sql->bindParam(1, $registerUser);
    $sql->bindParam(2, $file);
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

  public function registerContact($email_user, $phone_user, $registerUser){
    $sql = $this->conn->prepare("INSERT INTO contact(email_con, phone_con, id_user_con) VALUES (?,?,?)");
    $sql->bindParam(1, $email_user);
    $sql->bindParam(2, $phone_user);
    $sql->bindParam(3, $registerUser);
    $sql->execute();

    $registerContact = $sql->rowCount();
    return $registerContact;
  }

  public function registerAccess($number_id, $registerUser){
    $sql = $this->conn->prepare("INSERT INTO acceso(account_acc, password_acc, id_user_acc) VALUES (?,?,?)");
    $sql->bindParam(1, $number_id);
    $sql->bindParam(2, $number_id);
    $sql->bindParam(3, $registerUser);
    $sql->execute();

    $registerAccess = $sql->rowCount();
    return $registerAccess;
  }

  public function registerAddress($departament, $city, $address, $registerUser){
    $sql = $this->conn->prepare("INSERT INTO address_u(department_add, municipality_add, address_add, id_user_add) VALUES (?,?,?,?)");
    $sql->bindParam(1, $departament);
    $sql->bindParam(2, $city);
    $sql->bindParam(3, $address);
    $sql->bindParam(4, $registerUser);
    $sql->execute();

    $registerAddress = $sql->rowCount();
    return $registerAddress;
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

  public function getContractType(){

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

  public function getDept(){
    $departament_query = "SELECT id_departamento, departamento FROM departamentos";
    $departament_result = $this->conn->query($departament_query);

    $departament_data = array();

    if ($departament_result) {
      while ($row = $departament_result->fetch(PDO::FETCH_ASSOC)) {
        $departament_data[] = $row;
      }
    }

    $this->conn = null;

    return $departament_data;

  }

  public function getMunicipioByDeptId($deptId){
    $municipio_query = "SELECT id_municipio, municipio FROM municipios WHERE departamento_id = :deptId";
    $stmt = $this->conn->prepare($municipio_query);

    $stmt->bindParam(':deptId', $deptId);

    if($stmt->execute()){
      return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }else{
      $errorInfo = $stmt->errorInfo();
      return array('error' => 'Error encontrando los municipios' . $errorInfo[2]);
    }
  }

  public function getGenero(){
    $genero_query = "SELECT id_genero_auto, name_gen FROM genero";
    $genero_result = $this->conn->query($genero_query);

    $genero_data = array();

    if ($genero_result) {
      while ($row = $genero_result->fetch(PDO::FETCH_ASSOC)) {
        $genero_name = $row["name_gen"];
        $genero_id = $row["id_genero_auto"];
        $genero_data[$genero_name] = $genero_id;
      }
    }

    $this->conn = null;

    return $genero_data;
  }

  public function getTypeId(){
    $typeId_query = "SELECT id_idType_auto, name_idType FROM type_id";
    $typeId_result = $this->conn->query($typeId_query);

    $typeId_data = array();

    if ($typeId_result) {
      while ($row = $typeId_result->fetch(PDO::FETCH_ASSOC)) {
        $typeId_name = $row["name_idType"];
        $typeId_id = $row["id_idType_auto"];
        $typeId_data[$typeId_name] = $typeId_id;
      }
    }

    $this->conn = null;

    return $typeId_data;
  }


  public function registerProyect($name, $number, $estado, $var_fecha, $id_area){
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

  public function registerFicha($id_proyect, $numero_ficha, $estado, $f_ini, $f_fin){
    $sql = $this->conn->prepare("INSERT INTO ficha(number_file, state_file, start_date_file, end_date_file, id_proj_file ) VALUES (?,?,?,?,?)");
    $sql->bindParam(1, $numero_ficha);
    $sql->bindParam(2, $estado);
    $sql->bindParam(3, $f_ini);
    $sql->bindParam(4, $f_fin);
    $sql->bindParam(5, $id_proyect);

      if($sql->execute()){

        $ficha_id = $this->conn->lastInsertId();

        $sql2 = $this->conn->prepare("INSERT INTO events(ficha_event) VALUES (?)");
        $sql2->bindParam(1, $ficha_id);
        $sql2->execute();
          
        $registerFicha = $sql->rowCount();
        return $registerFicha;
      }
  }

  // public function updateUser($type_id, $phone_user, $email_user, $genero){
  //   $sql = $this ->conn -> prepare("UPDATE user SET phone_user=?, email_user=? where id_auto_user=? ");
  //   $sql -> bindParam(1,$phone_user);
  //   $sql -> bindParam(2,$email_user);
  //   $sql -> bindParam(3,$type_id);
  //   $sql -> execute();
  //   $rta = $sql -> rowCount();

  //   return $rta;
  // }

  public function updateUserPhoto($imagen, $id_user){
    $sql = $this->conn->prepare("UPDATE user SET photo_user=? where id_auto_user=?");
    $sql->bindValue(1, $imagen);
    $sql->bindParam(2, $id_user);
    $sql->execute();
    $updateUserPhoto = $sql->rowCount();

    return $updateUserPhoto;
  }

  public function updateUser($id_user, $name, $lastname, $number_id, $birth){
    $sql = $this->conn->prepare("UPDATE user SET name_user=?, lastname_user=?, number_id_user=?, birth_user=?
    WHERE id_auto_user=?");
    $sql->bindParam(1, $name);
    $sql->bindParam(2, $lastname);
    $sql->bindParam(3, $number_id);
    $sql->bindParam(4, $birth);
    $sql->bindParam(5, $id_user);
    $sql->execute();

    $updateUser = $sql->rowCount();

    return $updateUser;
  }
}