<?php

include_once "../conexion/conexion.php";
require_once '../model/registerModel.php';

class RegisterController{
    //-------------------------------PROCESO REGISTRO-------------------------------//

    public function registerAreaKnow($nameAreaKnow, $registerDate, $state){
        $registerModel = new RegisterModel();
        $registerAreaKnow = $registerModel->registerAreaKnow($nameAreaKnow, $registerDate, $state);

        return $registerAreaKnow;
    }

    public function registerProgram($name_program, $registerDate, $code, $version, $programType, $state, $projectId){
        $registerModel = new RegisterModel();
        $registerProgram = $registerModel->registerProgram($name_program, $registerDate, $code, $version, $programType, $state, $projectId);

        return $registerProgram;
    }

    public function registerFile($numberFicha, $state, $startDate, $endDate, $projectId){
        $registerModel = new RegisterModel();
        $registerFile = $registerModel->registerFile($numberFicha, $state, $startDate, $endDate, $projectId);

        return $registerFile;
    }

    public function registerProject($nameProject, $numberProject, $state, $registerDate, $areaKnowId){
        $registerModel = new RegisterModel();
        $registerProject = $registerModel->registerProject($nameProject, $numberProject, $state, $registerDate, $areaKnowId);

        return $registerProject;
    }

    public function registerContract($nameContract){
        $registerModel = new RegisterModel();
        $registerContract = $registerModel->registerContract($nameContract);

        return $registerContract;
    }

    public function registerGenero($nameGenero, $state){
        $registerModel = new RegisterModel();
        $registerGenero = $registerModel->registerGenero($nameGenero, $state);

        return $registerGenero;
    }

    public function registerPhase($namePhase, $registerDate, $state, $projectId){
        $registerModel = new RegisterModel();
        $registerPhase = $registerModel->registerPhase($namePhase, $registerDate, $state, $projectId);

        return $registerPhase;
    }

    public function registerFormationLvl($nameFormationLvl){
        $registerModel = new RegisterModel();
        $registerFormationLvl = $registerModel->registerFormationLvl($nameFormationLvl);

        return $registerFormationLvl;
    }

    public function registerActivity($nameActivity, $registerDate, $state, $phaseId){
        $registerModel = new RegisterModel();
        $registerActivity = $registerModel->registerActivity($nameActivity, $registerDate, $state, $phaseId);

        return $registerActivity;
    }

    public function registerCompetition($nameCompetition, $numberCompetition, $registerDate, $state, $activityId){
        $registerModel = new RegisterModel();
        $registerCompetition = $registerModel->registerCompetition($nameCompetition, $numberCompetition, $registerDate, $state, $activityId);

        return $registerCompetition;
    }

    public function registerResult($nameResult, $registerDate, $state, $competitionId, $knowAreaId){
        $registerModel = new RegisterModel();
        $registerResult = $registerModel->registerResult($nameResult, $registerDate, $state, $competitionId, $knowAreaId);

        return $registerResult;
    }

    //---------------------------PROCESO REGISTRO---------------------------//
}