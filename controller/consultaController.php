<?php
include_once "../../conexion/conexion.php";
include_once "../../model/consultaModel.php";

class ConsultaController
{
  public function aConsultarAre()
  {
    $consultar = new ConsultaModel();
    $rta = $consultar->ConsultAr();

    include "../view/consutaUser.php/consultaArea.php";
  }

  public function  consultarProyect($idarea)
  {
    $consultarProyecto = new ConsultaModel();
    $rta = $consultarProyecto->consulproyect($idarea);

    include "../view/consutaUser.php/consultaProyecto.php";
  }

  public function consultaficha($idproyect)
  {
    $consultarFicha = new ConsultaModel();
    $rta = $consultarFicha->consultarFichaModel($idproyect);
    echo $idproyect;
    include "../view/consutaUser.php/consultarFichas.php";
  }

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
    $GetUserDireccion = $consultaModel->getUserDireccion($direccion_id);

    return $GetUserDireccion;
  }
}
