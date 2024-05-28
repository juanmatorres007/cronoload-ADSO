<?php
include_once "../conexion/conexion.php";
include_once "../model/consultaModel.php";

class ConsultaController
{
  public function aConsultarAre()
  {
    $consultar = new ConsultaModel();
    $rta = $consultar->ConsultAr();

    include "../view/consultaArea.php";
  }

  public function  consultarProyect($idarea)
  {
    $consultarProyecto = new ConsultaModel();
    $rta = $consultarProyecto->consulproyect($idarea);

    include "../view/consultaProyecto.php";
  }

  public function consultaficha($idproyect)
  {
    $consultarFicha = new ConsultaModel();
    $rta = $consultarFicha->consultarFichaModel($idproyect);
    echo $idproyect;
    include "../view/consultarFichas.php";
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
}
