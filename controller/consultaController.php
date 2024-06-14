<?php
include_once "../../conexion/conexion.php";
include_once "../../model/consultaModel.php";

class ConsultaController
{

  public function getUserDocumentType($type_id){
    $consultaModel = new ConsultaModel();
    $getUserDocumentType = $consultaModel->getUserDocumentType($type_id);

    return $getUserDocumentType;
  }

  public function getUserGenero($genero_id){
    $consultaModel = new ConsultaModel();
    $getUserGenero = $consultaModel->getUserGenero($genero_id);

    return $getUserGenero;
  }

  public function getUserPhone($phone_id){
    $consultaModel = new ConsultaModel();
    $getUserPhone = $consultaModel->getUserPhone($phone_id);

    return $getUserPhone;
  }

  public function getUserEmail($email_id){
    $consultaModel = new ConsultaModel();
    $getUserEmail = $consultaModel->getUserEmail($email_id);

    return $getUserEmail;
  }

  public function getUserFicha($ficha_id){
    $consultaModel = new ConsultaModel();
    $getUserFicha = $consultaModel->getUserFicha($ficha_id);

    return $getUserFicha;
  }

  public function getUserDepartamento($departamento_id){
    $consultaModel = new ConsultaModel();
    $getUserDepartamento = $consultaModel->getUserDepartamento($departamento_id);

    return $getUserDepartamento;
  }

  public function getUserMunicipio($municipio_id){
    $consultaModel = new ConsultaModel();
    $getUserMunicipio = $consultaModel->getUserMunicipio($municipio_id);

    return $getUserMunicipio;
  }
    
  public function getUserDireccion($direccion_id){
    $consultaModel = new ConsultaModel();
    $getUserDireccion = $consultaModel->getUserDireccion($direccion_id);

    return $getUserDireccion;
  }

  public function getUserContrato($contrato_id){
    $consultaModel = new ConsultaModel();
    $getUserContrato = $consultaModel->getUserContrato($contrato_id);

    return $getUserContrato;
  }

  public function getUserStartContrato($startContrato_id){
    $consultaModel = new ConsultaModel();
    $getUserStartContrato = $consultaModel->getUserStartContrato($startContrato_id);

    return $getUserStartContrato;
  }

  public function getUserEndContrato($endContrato_id){
    $consultaModel = new ConsultaModel();
    $getUserEndContrato = $consultaModel->getUserEndContrato($endContrato_id);

    return $getUserEndContrato;
  }

  public function getUserKnow($know_id){
    $consultaModel = new ConsultaModel();
    $getUserKnow = $consultaModel->getUserKnow($know_id);

    return $getUserKnow;
  }

  public function getUserLvl($lvl_id){
    $consultaModel = new ConsultaModel();
    $getUserLvl = $consultaModel->getUserLvl($lvl_id);

    return $getUserLvl;
  }

  public function getUserPhoto($photo_id){
    $consultaModel = new ConsultaModel();
    $getUserPhoto = $consultaModel->getUserPhoto($photo_id);

    return $getUserPhoto;
  }

  public function getAllDataUser($rol){
    $consultaModel = new ConsultaModel();
    $getAllDataUser = $consultaModel->getAllDataUser($rol);

    return $getAllDataUser;
  }

  //-----------------CONSULTA GENERAL-------------------//

  public function getKnowArea(){
    $consultaModel = new ConsultaModel();
    $getKnowFile = $consultaModel->getKnowArea();

    return $getKnowFile;
  }

  public function getProgram(){
    $consultaModel = new ConsultaModel();
    $getProgram = $consultaModel->getProgram();

    return $getProgram;
  }

  public function getFile(){
    $consultaModel = new ConsultaModel();
    $getFile = $consultaModel->getFile();

    return $getFile;
  }

  public function getProject(){
    $consultaModel = new ConsultaModel();
    $getProject = $consultaModel->getProject();

    return $getProject;
  }

  public function getContract(){
    $consultaModel = new ConsultaModel();
    $getContract = $consultaModel->getContract();

    return $getContract;
  }

  public function getGenero(){
    $consultaModel = new ConsultaModel();
    $getGenero = $consultaModel->getGenero();

    return $getGenero;
  }

  public function getPhase(){
    $consultaModel = new ConsultaModel();
    $getPhase = $consultaModel->getPhase();

    return $getPhase;
  }

  public function getFormation_lvl(){
    $consultaModel = new ConsultaModel();
    $getFormation_lvl = $consultaModel->getFormation_lvl();

    return $getFormation_lvl;
  }

  public function getCompetition(){
    $consultaModel = new ConsultaModel();
    $getCompetition = $consultaModel->getCompetition();

    return $getCompetition;
  }

  public function getActivity(){
    $consultaModel = new ConsultaModel();
    $getActivity = $consultaModel->getActivity();

    return $getActivity;
  }

  public function getResult(){
    $consultaModel = new ConsultaModel();
    $getResult = $consultaModel->getResult();

    return $getResult;
  }


  //-----------------CONSULTA GENERAL-------------------//

  //-----------------ACTUALIZAR CONSULTA GENERAL-----------------//


      public function updateData($table, $idField, $data) {
        $consultaModel = new ConsultaModel();
        $updateData = $consultaModel->updateData($table, $idField, $data);
        
        return $updateData;
      }

    
  //-----------------ACTUALIZAR CONSULTA GENERAL-----------------//

}