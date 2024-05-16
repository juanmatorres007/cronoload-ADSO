<?php

class UserModel{
    private $conn;

    public function __construct() {
        // Inicializar la conexión a la base de datos
        $this->db();
    }

    // Función para inicializar la conexión a la base de datos
    public function db() {
        // Establecer la conexión a la base de datos
        $this-> conn = conectaDb();
    }

    public function reGUSer($name_user, $lastname_user, $tp_id, $num_id, $are_cmt, $fromlvl_id){
        $sql =$this -> conn -> prepare("INSERT INTO user(name_user, lastname_user, type_id_user, number_id_user)
        VALUES (?,?,?,?)");
        $sql ->bindParam(1,$name_user);
        $sql ->bindParam(2,$lastname_user);
        $sql ->bindParam(3,$tp_id);
        $sql ->bindParam(4,$num_id);
        // $sql ->bindParam(5,$are_cmt);
        // $sql ->bindParam(6,$fromlvl_id);
        $sql ->execute();
        
        $rta = $sql ->rowCount();
        $varid = $this -> conn -> lastInsertId();
        return $varid;
    }

    public function update($name, $lastname, $tipoid, $noid, $aredc, $fromlvl, $datosregistrado){
 
        $id_usuario = $datosregistrado['id_auto_user'];

        $sql =  $this -> conn -> prepare("UPDATE user SET name_user=?, lastname_user=?, type_id_user=?, number_id_user=? WHERE id_auto_user=?");
        $sql->bindParam(1, $name);
        $sql->bindParam(2, $lastname);
        $sql->bindParam(3, $tipoid);
        $sql->bindParam(4, $noid);
        $sql->bindParam(5, $id_usuario);

        $sql->execute();
        
        $rta = $sql ->rowCount();
        return $rta;
    }

    public function reVINg($tipocontrato, $fechainicial, $fechafinal, $iduser){
        $sql = $this -> conn -> prepare("INSERT INTO vinculation(name_vin, start_date_vin, end_date_vin, id_user_vin) VALUES(?,?,?,?)");
        $sql ->bindParam(1,$tipocontrato);
        $sql ->bindParam(2,$fechainicial);
        $sql ->bindParam(3,$fechafinal);
        $sql ->bindParam(4,$iduser);
        $sql -> execute();
        $rta = $sql ->rowCount();
        return $rta;
    }

    public function rArea($Nombre, $Fecha, $Estado){
        $sql = $this -> conn -> prepare("INSERT INTO knowledge_area(area_name_know, date_register_know, state_know) VALUES(?,?,?)");
        $sql -> bindParam(1,$Nombre);
        $sql -> bindParam(2,$Fecha);
        $sql -> bindParam(3,$Estado);
        $sql -> execute();
        $rta = $sql ->rowCount();
        return $rta;

    }
    public function reGPro($name, $number, $estado, $var_fecha, $id_area){
        $sql =$this->conn -> prepare("INSERT INTO project(name_proj, number_proj, state_proj, register_date_proj, id_knowledge_area_proj)
        VALUES(?,?,?,?,?)");
        $sql ->bindParam(1,$name);
        $sql ->bindParam(2,$number);
        $sql ->bindParam(3,$estado);
        $sql ->bindParam(4,$var_fecha);
        $sql ->bindParam(5,$id_area);
        $sql ->execute();
        $rta = $sql -> rowCount();
        return $rta;

    }
}