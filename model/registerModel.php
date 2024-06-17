<?php

class registerModel{
    private $conn;

    public function __construct() {
        $this->db();
    }

    public function db() {
        $this-> conn = conectaDb();
    }

    public function getProyectosOptions(){

        $stmt = $this->conn->prepare("SELECT id_auto_proj, name_proj FROM project");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAreasConocimientoOptions(){

        $stmt = $this->conn->prepare("SELECT id_auto_know, area_name_know FROM knowledge_area");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFasesOptions(){

        $stmt = $this->conn->prepare("SELECT id_auto_pha, name_pha FROM phase");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getActividadesOptions(){

        $stmt = $this->conn->prepare("SELECT id_auto_acti, name_acti FROM activity");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCompeticionesOptions(){

        $stmt = $this->conn->prepare("SELECT id_auto_comp, name_comp FROM competition");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStatesOptions(){ 

        $stmt = $this->conn->prepare("SELECT id_auto_sta, name_state FROM states");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    //------------------------REGISTROS GENERALES------------------------//

    public function registerAreaKnow($nameAreaKnow, $registerDate, $state){

        $sql = $this->conn->prepare("INSERT INTO knowledge_area(area_name_know, date_register_know, state_know) VALUES(?,?,?)");
        $sql->bindParam(1, $nameAreaKnow);
        $sql->bindParam(2, $registerDate);
        $sql->bindParam(3, $state);
        $sql->execute();
        $rta = $sql->rowCount();
        return $rta;
    }

    public function registerProgram($name_program, $registerDate, $code, $version, $programType, $state, $projectId){
        $sql = $this->conn->prepare("INSERT INTO program(name_prog, date_register_prog, code_prog, version_prog, type_prog, state_prog, id_project_prog) VALUES(?,?,?,?,?,?,?)");
        $sql->bindParam(1, $name_program);
        $sql->bindParam(2, $registerDate);
        $sql->bindParam(3, $code);
        $sql->bindParam(4, $version);
        $sql->bindParam(5, $programType);
        $sql->bindParam(6, $state);
        $sql->bindParam(7, $projectId);
        $sql->execute();
        $rta = $sql->rowCount();
        return $rta;
    }

    public function registerFile($numberFicha, $state, $startDate, $endDate, $projectId){
        $sql = $this->conn->prepare("INSERT INTO ficha(number_file, state_file, start_date_file, end_date_file, id_proj_file) VALUES(?,?,?,?,?,?)");
        $sql->bindParam(1, $numberFicha);
        $sql->bindParam(2, $state);
        $sql->bindParam(3, $startDate);
        $sql->bindParam(4, $endDate);
        $sql->bindParam(5, $projectId);
        $sql->execute();
        $rta = $sql->rowCount();
        return $rta;
    }

    public function registerProject($nameProject, $numberProject, $state, $registerDate, $areaKnowId){
        $sql = $this->conn->prepare("INSERT INTO project(name_proj, number_proj, state_proj, register_date_proj, id_knowledge_area_proj)
        VALUES(?,?,?,?,?)");
        $sql->bindParam(1, $nameProject);
        $sql->bindParam(2, $numberProject);
        $sql->bindParam(3, $state);    
        $sql->bindParam(4, $registerDate);
        $sql->bindParam(5, $areaKnowId);
        $sql->execute();
        $rta = $sql->rowCount();
        return $rta;
    }

    public function registerContract($nameContract){
        $sql = $this->conn->prepare("INSERT INTO contracts(name_cont) VALUES (?)");
        $sql->bindParam(1,$nameContract);
        $sql->execute();
        $rta = $sql->rowCount();
        return $rta;
    }

    public function registerGenero($nameGenero, $state){
        $sql = $this->conn->prepare("INSERT INTO genero(name_gen, estate_gen) VALUES (?,?)");
        $sql->bindParam(1, $nameGenero);
        $sql->bindParam(2, $state);
        $sql->execute();
        $rta = $sql->rowCount();
        return $rta;
    }

    public function registerPhase($namePhase, $registerDate, $state, $projectId){
        $sql = $this->conn->prepare("INSERT INTO phase(name_pha, date_register_pha, state_pha, id_project_pha ) VALUES (?,?,?,?)");
        $sql->bindParam(1, $namePhase);
        $sql->bindParam(2, $registerDate);
        $sql->bindParam(3, $state);
        $sql->bindParam(4, $projectId);
        $sql->execute();
        $rta = $sql->rowCount();
        return $rta;
    }

    public function registerFormationLvl($nameFormationLvl){
        $sql = $this->conn->prepare("INSERT INTO formation_lvl(name_flvl) VALUES (?)");
        $sql->bindParam(1, $nameFormationLvl);
        $sql->execute();
        $rta = $sql->rowCount();
        return $rta;
    }

    public function registerActivity($nameActivity, $registerDate, $state, $phaseId){
        $sql = $this->conn->prepare("INSERT INTO activity(name_acti, date_register_acti, state_acti, id_pha_acti ) VALUES (?,?,?,?)");
        $sql->bindParam(1, $nameActivity);
        $sql->bindParam(2, $registerDate);
        $sql->bindParam(3, $state);
        $sql->bindParam(4, $phaseId);
        $sql->execute();
        $rta = $sql->rowCount();
        return $rta;
    }

    public function registerCompetition($nameCompetition, $numberCompetition, $registerDate, $state, $activityId){
        $sql = $this->conn->prepare("INSERT INTO competition(name_comp, number_comp, date_register_comp, state_comp, id_acti_comp ) VALUES (?,?,?,?,?)");
        $sql->bindParam(1, $nameCompetition);
        $sql->bindParam(2, $numberCompetition);
        $sql->bindParam(3, $registerDate);
        $sql->bindParam(4, $state);
        $sql->bindParam(5, $activityId);
        $sql->execute();
        $rta = $sql->rowCount();
        return $rta;
    }

    public function registerResult($nameResult, $registerDate, $state, $competitionId, $knowAreaId){
        $sql = $this->conn->prepare("INSERT INTO result(name_res, date_register_res, state_res, id_comp_res, id_know_res) VALUES (?,?,?,?,?)");
        $sql->bindParam(1, $nameResult);
        $sql->bindParam(2, $registerDate);        
        $sql->bindParam(3, $state);
        $sql->bindParam(4, $competitionId);
        $sql->bindParam(5, $knowAreaId);
        $sql->execute();
        $rta = $sql->rowCount();
        return $rta;
    }


    //------------------------REGISTROS GENERALES------------------------//

}
?>
