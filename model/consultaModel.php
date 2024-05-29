<?php

class ConsultaModel{
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

    public function ConsultAr(){
 
        $sql=$this->conn->prepare("SELECT * FROM knowledge_area");
        $sql -> execute();
        $consultaarea = $sql -> fetchAll(PDO::FETCH_ASSOC);
        return  $consultaarea;
    }

    public function consulproyect($idarea) {

        $sql = $this -> conn -> prepare("SELECT * FROM project WHERE id_knowledge_area_proj = $idarea");
        $sql -> execute();
        $consulta_proyecto = $sql -> fetchAll(PDO::FETCH_ASSOC);
        return $consulta_proyecto;
        return $idarea;
    }

    public function consultarFichaModel($idproyect) {

        $sql = $this -> conn -> prepare("SELECT * FROM file WHERE id_proj_file  = $idproyect");
        $sql -> execute();
        $consulta_ficha = $sql -> fetchAll(PDO::FETCH_ASSOC);
        return $consulta_ficha;
        return $idproyect;
    }

    public function getUserDocumentType($type_id){
        $documentType_query = "SELECT t.name_idType FROM type_id t INNER JOIN user u ON t.id_idType_auto = u.type_id_user WHERE u.type_id_user = :type_id";
        $stmt = $this->conn->prepare($documentType_query);
        $stmt->bindParam(':type_id', $type_id);
    
        if($stmt->execute()){
            return $stmt->fetchColumn();
        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el tipo de documento: ' . $errorInfo[2]);
        }
    }

    public function getUserGenero($genero_id){
        $genero_query = "SELECT g.name_gen FROM genero g INNER JOIN user u ON g.id_genero_auto = :genero_id WHERE u.id_gen_user = :genero_id";
        $stmt = $this->conn->prepare($genero_query);
        $stmt->bindParam(':genero_id', $genero_id);
        
        if($stmt->execute()){
            return $stmt->fetchColumn();
        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el género: ' . $errorInfo[2]);
        }
    }

    public function getUserPhone($phone_id){
        $phone_query = "SELECT c.phone_con FROM contact c INNER JOIN user u ON c.id_user_con = u.id_auto_user WHERE u.id_auto_user = :phone_id";
        $stmt = $this->conn->prepare($phone_query);
        $stmt->bindParam(':phone_id', $phone_id);
        
        if($stmt->execute()){
            return $stmt->fetchColumn();
        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el género: ' . $errorInfo[2]);
        }
    }

    public function getUserEmail($email_id){
        $email_query = "SELECT c.email_con FROM contact c INNER JOIN user u ON c.id_user_con = u.id_auto_user WHERE u.id_auto_user = :email_id";
        $stmt = $this->conn->prepare($email_query);
        $stmt->bindParam(':email_id', $email_id);
        
        if($stmt->execute()){
            return $stmt->fetchColumn();
        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el género: ' . $errorInfo[2]);
        }
    }

    public function getUserFicha($ficha_id){
        $ficha_query = "SELECT number_file FROM ficha, relation_user_file WHERE id_user_reluf  = :ficha_id AND id_auto_fil = id_file_reluf";
        $stmt = $this->conn->prepare($ficha_query);
        $stmt->bindParam(':ficha_id', $ficha_id);
        
        if($stmt->execute()){
            return $stmt->fetchColumn();
        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el género: ' . $errorInfo[2]);
        }
    }

}