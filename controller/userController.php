<?php
include "../conexion/conexion.php";
include "../model/UserModel.php";
include_once "../controller/rolController.php";
include_once "../model/rolModel.php";

class UserController{

   public function validarRegistro($name, $lastname, $type_id, $number_id, $know, $form_lvl){
      $userModel = new UserModel();
      $userReg = $userModel->registerUser($name, $lastname, $type_id, $number_id, $know, $form_lvl);
      return $userReg;
   }

   public function registerRolUser($rol,$userInfo){
      $userModel = new UserModel();
      $rolReg = $userModel->registerRolUser($rol,$userInfo);
      return $rolReg;
   }

   public function registerVinculation($start_date, $end_date, $contract_type, $userInfo){
      $regisVinculation = new UserModel();
      $rta =  $regisVinculation->registerVinculation($start_date, $end_date, $contract_type, $userInfo);
      return $rta;
   }

   public function registerArea($nombreArea, $var_date, $estado){
      $userModel = new UserModel();
      $regisArea = $userModel->registerArea($nombreArea, $var_date, $estado);
      return $regisArea;
   }

   public function registerFile($userInfo, $file){
      $userModel = new UserModel();
      $registerFile = $userModel->registerFile($userInfo, $file);
      return $registerFile;
   }

   public function registerContract($contract_name){
      $userModel = new UserModel();
      $registerContract = $userModel->registerContract($contract_name);
      return $registerContract;
   }

   public function registerContact($email_user, $phone_user, $userInfo){
      $userModel = new UserModel();
      $registerContact = $userModel->registerContact($email_user, $phone_user, $userInfo);
      return $registerContact;
   }

   public function getKnowArea(){
      $userModel = new UserModel();
      $knowArea = $userModel->getKnowArea();

      return $knowArea;
    }

    public function getKnowFile(){
      $userModel = new UserModel();
      $file = $userModel->getKnowFile();

      return $file;
    }

    public function getLvlForm(){
      $userModel = new UserModel();
      $lvlForm = $userModel->getLvlForm();

      return $lvlForm;
    }

    public function getContractType(){
      $userModel = new UserModel();
      $contractType = $userModel->getContractType();

      return $contractType;
    }

    public function getDept(){
      $userModel = new UserModel();
      $departament = $userModel->getDept();

      return $departament;
    }

    public function getMunicipioByDeptId($deptId){
      $userModel = new UserModel();
      $municipios = $userModel->getMunicipioByDeptId($deptId);

      return $municipios;
    }

   public function registroproyect($idarea){
      include "../view/regProyecto.php";
   }

   public function registerProyect($name, $number, $estado, $var_fecha, $id_area){
      $proyect = new UserModel();
      $rta = $proyect->registerProyect($name, $number, $estado, $var_fecha, $id_area);
      echo "Registro exitoso";
   }

   public function registroFicha($idproyect){
      include "../view/reg_ficha.php";
   }
}