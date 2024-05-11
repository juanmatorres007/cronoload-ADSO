<?php
include "../conexion/conexion.php";
include "../model/UserModel.php";
include_once "../controller/rolController.php";
include_once "../model/rolModel.php";

class UserController{

   public function showRegistrationForm(){
      $rolController = new RolController();
      $roles = $rolController->getRoles();
      include_once "../view/headerContenido.php";
   }

   public function validarRegistro($name, $lastname, $tipoid, $noid, $aredc, $fromlvl)
   {
      $userReg = new UserModel();
      $rta = $userReg->reGUSer($name, $lastname, $tipoid, $noid, $aredc, $fromlvl);
      return $rta;
   }

   public function update($name, $lastname, $tipoid, $noid, $aredc, $fromlvl, $datosregistrado){
      $usuarioModel = new UserModel();
      $update = $usuarioModel->update($name, $lastname, $tipoid, $noid, $aredc, $fromlvl, $datosregistrado);
      include "../view/headerContenido.php";
    }

   public function registroVinculacion($tipo_contrato, $fecha_I_contrato, $fecha_F_contrato, $datosregistrado)
   {
      $regisvcl = new UserModel();
      $rta =  $regisvcl->reVINg($tipo_contrato, $fecha_I_contrato, $fecha_F_contrato, $datosregistrado);
      return $rta;
   }

   public function regArea($nombreArea, $var_date, $estado)
   {
      $regisArea = new UserModel();
      $rta = $regisArea->rArea($nombreArea, $var_date, $estado);
      echo "registro exitoso";
   }

   public function registroproyect($idarea)
   {
      include "../view/regProyecto.php";
   }

   public function proyectoReg($name, $number, $estado, $var_fecha, $id_area)
   {
      $proyect = new UserModel();
      $rta = $proyect->reGPro($name, $number, $estado, $var_fecha, $id_area);
      echo "Registro exitoso";
   }

   public function registroFicha($idproyect)
   {
      include "../view/reg_ficha.php";
   }
}
