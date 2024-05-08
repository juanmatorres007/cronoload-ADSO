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
}
