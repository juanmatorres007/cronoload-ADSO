<?php

class ConsultaModel{
    private $conn;

    public function __construct() {
        $this->db();
    }

    public function db() {
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

    public function getAllDataUser($rol) {
        $sql = $this->conn->prepare("SELECT user.id_auto_user,
            user.name_user,
            user.lastname_user,
            user.type_id_user,
            user.number_id_user,
            user.birth_user,
            user.id_gen_user,
            user.state_user,
            knowledge_area.area_name_know AS know_area_name,
            formation_lvl.name_flvl AS formation_lvl_name
        FROM user
            INNER JOIN relation_rol_user ON user.id_auto_user = relation_rol_user.id_user_relaru
            LEFT JOIN knowledge_area ON user.id_know_user = knowledge_area.id_auto_know
            LEFT JOIN formation_lvl ON user.id_formation_lvl_user  = formation_lvl.id_auto_flvl
        WHERE relation_rol_user.id_rol_relaru = ?
        ");
        $sql->bindParam(1, $rol);
        $sql->execute();
    
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    
        return $resultados;
    }    

    //----------------CONSULTA GENERAL-----------------//

    public function getTypeId(){
        $typeId = "SELECT * FROM type_id";
        $stmt = $this->conn->prepare($typeId);
        
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


        //-------FOREIGN KEYS-------//

        public function getContractType(){
            $contractType = "SELECT * FROM contracts";
            $stmt = $this->conn->prepare($contractType);
            $stmt->execute();
    
            $contractType = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
            return $contractType;
        }

        public function getKnowArea(){
            $knowArea = "SELECT * FROM knowledge_area";
            $stmt = $this->conn->prepare($knowArea);
            $stmt->execute();
    
            $knowArea = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
            return $knowArea;
        }

        public function getFormationLvl(){
            $formationLvl = "SELECT * FROM formation_lvl";
            $stmt = $this->conn->prepare($formationLvl);
            $stmt->execute();
    
            $formationLvl = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
            return $formationLvl;
        }

        public function getState(){
            $state = "SELECT * FROM states";
            $stmt = $this->conn->prepare($state);
            $stmt->execute();
    
            $state = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
            return $state;
        }

         //-------FOREIGN KEYS-------//


    //----------------CONSULTA GENERAL-----------------//

    //----------------ACTUALIZAR CONSULTA GENERAL----------------//

    public function updateData($table, $idField, $data) {
        $setPart = [];
        foreach ($data as $key => $value) {
            if ($key !== $idField) { // Hacer que un campo no se modifique
                $setPart[] = "$key = :$key";
            }
        }
        $setString = implode(', ', $setPart);

        $idValue = $data[$idField];

        $query = "UPDATE $table SET $setString WHERE $idField = :$idField";
        $stmt = $this->conn->prepare($query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->bindValue(":$idField", $idValue);

        return $stmt->execute();
    }

    //----------------ACTUALIZAR CONSULTA GENERAL----------------//


    //----------------CONSULTA USUARIO MEDIANTE ID----------------//

    public function getUserData($userId){
        $sql = $this->conn->prepare("SELECT user.id_auto_user,
            user.name_user,
            user.lastname_user,
            user.type_id_user,
            user.number_id_user,
            user.birth_user,
            user.id_gen_user,
            user.state_user,
            contracts.name_cont AS type_contract_name,
            knowledge_area.area_name_know AS know_area_name,
            formation_lvl.name_flvl AS formation_lvl_name,
            rol.name_rol AS rol_name,
            rol.id_auto_rol AS rol_id
        FROM user
            INNER JOIN relation_rol_user ON user.id_auto_user = relation_rol_user.id_user_relaru
            LEFT JOIN rol ON relation_rol_user.id_rol_relaru = rol.id_auto_rol 
            LEFT JOIN contracts ON user.id_type_contract_user = contracts.id_auto_cont
            LEFT JOIN knowledge_area ON user.id_know_user = knowledge_area.id_auto_know
            LEFT JOIN formation_lvl ON user.id_formation_lvl_user  = formation_lvl.id_auto_flvl
        WHERE user.id_auto_user = ?
        ");
        $sql->bindParam(1, $userId);
        $sql->execute();
    
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    
        return $resultados;
    }


    //----------------CONSULTA USUARIO MEDIANTE ID----------------//

}