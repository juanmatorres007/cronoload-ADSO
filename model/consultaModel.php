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

    public function getUserDepartamento($departamento_id){
        $departamento_query = "SELECT id_departamento, departamento FROM departamentos INNER JOIN address_u ON departamentos.id_departamento = address_u.department_add WHERE address_u.id_user_add = :departamento_id";
        $stmt = $this->conn->prepare($departamento_query);
        $stmt->bindParam(':departamento_id', $departamento_id);
        
        if($stmt->execute()){
            return $stmt->fetchALL(PDO::FETCH_ASSOC);
        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el género: ' . $errorInfo[2]);
        }
    }

    public function getUserMunicipio($municipio_id){
        $municipio_query = "SELECT id_municipio, municipio FROM municipios INNER JOIN address_u ON municipios.id_municipio  = address_u.municipality_add WHERE address_u.id_user_add = :municipio_id";
        $stmt = $this->conn->prepare($municipio_query);
        $stmt->bindParam(':municipio_id', $municipio_id);
        
        if($stmt->execute()){
            return $stmt->fetchALL(PDO::FETCH_ASSOC);
        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el género: ' . $errorInfo[2]);
        }
    }
    
    public function getUserDireccion($direccion_id){
        $direccion_query = "SELECT address_add FROM address_u WHERE id_user_add  = :direccion_id";
        $stmt = $this->conn->prepare($direccion_query);
        $stmt->bindParam(':direccion_id', $direccion_id);
        
        if($stmt->execute()){
            return $stmt->fetchColumn();
        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el género: ' . $errorInfo[2]);
        }
    }

    public function getUserContrato($contrato_id){
        $contrato_query = "SELECT name_cont FROM contracts, vinculation WHERE id_auto_cont = id_contractType_vin AND id_user_vin = :contrato_id";
        $stmt = $this->conn->prepare($contrato_query);
        $stmt->bindParam(':contrato_id', $contrato_id);
        
        if($stmt->execute()){
            return $stmt->fetchColumn();
        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el género: ' . $errorInfo[2]);
        }
    }

    public function getUserStartContrato($startContrato_id){
        $startContrato_query = "SELECT start_date_vin FROM vinculation WHERE id_user_vin = :startContrato_id";
        $stmt = $this->conn->prepare($startContrato_query);
        $stmt->bindParam(':startContrato_id', $startContrato_id);
        
        if($stmt->execute()){
            return $stmt->fetchColumn();
        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el género: ' . $errorInfo[2]);
        }
    }

    public function getUserEndContrato($endContrato_id){
        $endContrato_query = "SELECT end_date_vin FROM vinculation WHERE id_user_vin = :endContrato_id";
        $stmt = $this->conn->prepare($endContrato_query);
        $stmt->bindParam(':endContrato_id', $endContrato_id);
        
        if($stmt->execute()){
            return $stmt->fetchColumn();
        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el género: ' . $errorInfo[2]);
        }
    }

    public function getUserKnow($know_id){
        $know_query = "SELECT area_name_know FROM knowledge_area, user WHERE id_auto_know = id_know_user AND id_auto_user = :know_id";
        $stmt = $this->conn->prepare($know_query);
        $stmt->bindParam(':know_id', $know_id);
        
        if($stmt->execute()){
            return $stmt->fetchColumn();
        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el género: ' . $errorInfo[2]);
        }
    }

    public function getUserLvl($lvl_id){
        $lvl_query = "SELECT name_flvl FROM formation_lvl, user WHERE id_auto_flvl = id_formation_lvl_user AND id_auto_user = :lvl_id";
        $stmt = $this->conn->prepare($lvl_query);
        $stmt->bindParam(':lvl_id', $lvl_id);
        
        if($stmt->execute()){
            return $stmt->fetchColumn();
        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el género: ' . $errorInfo[2]);
        }
    }

    public function getUserPhoto($photo_id){
        $photo_query = "SELECT photo_user FROM user WHERE id_auto_user = :photo_id";
        $stmt = $this->conn->prepare($photo_query);
        $stmt->bindParam(':photo_id', $photo_id);
        
        if($stmt->execute()){
            return $stmt->fetchColumn();
        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el género: ' . $errorInfo[2]);
        }
    }

    public function getAllDataUser($rol){
        $sql = $this->conn->prepare("SELECT * FROM user, relation_rol_user WHERE id_rol_relaru=? AND id_user_relaru = id_auto_user");
        $sql->bindParam(1,$rol);
        $sql->execute();

        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;
    }

    //----------------CONSULTA GENERAL-----------------//

    public function getKnowArea(){
        $knowArea = "SELECT * FROM knowledge_area";
        $stmt = $this->conn->prepare($knowArea);
        $stmt->execute();

        $knowArea = $stmt->fetchALL(PDO::FETCH_ASSOC);

        return $knowArea;
        
        // if($stmt->execute()){

        //     $data = array();

        //     while($results = $stmt->fetch(PDO::FETCH_ASSOC)){
        //         $data[] = $results;
        //     }
            
        //     return $data;

        // } else {
        //     $errorInfo = $stmt->errorInfo();
        //     return array('error' => 'Error encontrando el area de conocimiento: ' . $errorInfo[2]);
        // } 
    }


    public function getProgram(){
        $program = "SELECT * FROM program";
        $stmt = $this->conn->prepare($program);
        
        if($stmt->execute()){

            $data = array();

            while($results = $stmt->fetch(PDO::FETCH_ASSOC)){
                $data[] = $results;
            }
            
            return $data;

        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el area de conocimiento: ' . $errorInfo[2]);
        } 
    }

    public function getFile(){
        $file = "SELECT * FROM ficha";
        $stmt = $this->conn->prepare($file);
        
        if($stmt->execute()){

            $data = array();

            while($results = $stmt->fetch(PDO::FETCH_ASSOC)){
                $data[] = $results;
            }
            
            return $data;

        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el area de conocimiento: ' . $errorInfo[2]);
        } 
    }

    public function getProject(){
        $project = "SELECT * FROM project";
        $stmt = $this->conn->prepare($project);
        
        if($stmt->execute()){

            $data = array();

            while($results = $stmt->fetch(PDO::FETCH_ASSOC)){
                $data[] = $results;
            }
            
            return $data;

        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el area de conocimiento: ' . $errorInfo[2]);
        } 
    }

    public function getContract(){
        $contract = "SELECT * FROM contracts";
        $stmt = $this->conn->prepare($contract);
        
        if($stmt->execute()){

            $data = array();

            while($results = $stmt->fetch(PDO::FETCH_ASSOC)){
                $data[] = $results;
            }
            
            return $data;

        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el area de conocimiento: ' . $errorInfo[2]);
        } 
    }

    public function getGenero(){
        $genero = "SELECT * FROM genero";
        $stmt = $this->conn->prepare($genero);
        
        if($stmt->execute()){

            $data = array();

            while($results = $stmt->fetch(PDO::FETCH_ASSOC)){
                $data[] = $results;
            }
            
            return $data;

        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el area de conocimiento: ' . $errorInfo[2]);
        } 
    }

    public function getPhase(){
        $phase = "SELECT * FROM phase";
        $stmt = $this->conn->prepare($phase);
        
        if($stmt->execute()){

            $data = array();

            while($results = $stmt->fetch(PDO::FETCH_ASSOC)){
                $data[] = $results;
            }
            
            return $data;

        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el area de conocimiento: ' . $errorInfo[2]);
        } 
    }

    public function getFormation_lvl(){
        $formation_lvl = "SELECT * FROM formation_lvl";
        $stmt = $this->conn->prepare($formation_lvl);
        
        if($stmt->execute()){

            $data = array();

            while($results = $stmt->fetch(PDO::FETCH_ASSOC)){
                $data[] = $results;
            }
            
            return $data;

        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el area de conocimiento: ' . $errorInfo[2]);
        } 
    }

    public function getCompetition(){
        $competition = "SELECT * FROM competition";
        $stmt = $this->conn->prepare($competition);
        
        if($stmt->execute()){

            $data = array();

            while($results = $stmt->fetch(PDO::FETCH_ASSOC)){
                $data[] = $results;
            }
            
            return $data;

        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el area de conocimiento: ' . $errorInfo[2]);
        } 
    }

    public function getActivity(){
        $activity = "SELECT * FROM activity";
        $stmt = $this->conn->prepare($activity);
        
        if($stmt->execute()){

            $data = array();

            while($results = $stmt->fetch(PDO::FETCH_ASSOC)){
                $data[] = $results;
            }
            
            return $data;

        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el area de conocimiento: ' . $errorInfo[2]);
        } 
    }

    public function getResult(){
        $result = "SELECT * FROM result";
        $stmt = $this->conn->prepare($result);
        
        if($stmt->execute()){

            $data = array();

            while($results = $stmt->fetch(PDO::FETCH_ASSOC)){
                $data[] = $results;
            }
            
            return $data;

        } else {
            $errorInfo = $stmt->errorInfo();
            return array('error' => 'Error encontrando el area de conocimiento: ' . $errorInfo[2]);
        } 
    }

    //----------------CONSULTA GENERAL-----------------//

    //----------------ACTUALIZAR CONSULTA GENERAL----------------//

    public function updateData($table, $idField, $data) {
        $setPart = [];
        foreach ($data as $key => $value) {
            if ($key !== $idField) { // Asumiendo que tienes un campo 'id' que no debe actualizarse
                $setPart[] = "$key = :$key";
            }
        }
        $setString = implode(', ', $setPart);

        // Asumiendo que tienes un campo 'idField' para identificar el registro
        $idValue = $data[$idField];

        $query = "UPDATE $table SET $setString WHERE $idField = :$idField";
        $stmt = $this->conn->prepare($query);

        // Vincular los parámetros
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->bindValue(":$idField", $idValue);

        return $stmt->execute();
    }

    //----------------ACTUALIZAR CONSULTA GENERAL----------------//

}