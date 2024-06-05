<?php
include "../../conexion/conexion.php";
include "../../model/UserModel.php";
include_once "../../controller/rolController.php";
include_once "../../model/rolModel.php";

class UserController{

   public function registerUser($name, $lastname, $type_id, $number_id, $know, $form_lvl, $genero, $birth){
      $userModel = new UserModel();
      $registerUser = $userModel->registerUser($name, $lastname, $type_id, $number_id, $know, $form_lvl, $genero, $birth);
      return $registerUser;
   }

   public function registerRolUser($rol, $registerUser){
      $userModel = new UserModel();
      $rolReg = $userModel->registerRolUser($rol, $registerUser);
      return $rolReg;
   }

   public function registerVinculation($start_date, $end_date, $contract_type, $registerUser){
      $regisVinculation = new UserModel();
      $rta =  $regisVinculation->registerVinculation($start_date, $end_date, $contract_type, $registerUser);
      return $rta;
   }

   public function registerArea($nombreArea, $var_date, $estado){
      $userModel = new UserModel();
      $regisArea = $userModel->registerArea($nombreArea, $var_date, $estado);
      return $regisArea;
   }

   public function registerFile($registerUser, $file){
      $userModel = new UserModel();
      $registerFile = $userModel->registerFile($registerUser, $file);
      return $registerFile;
   }

   public function registerContract($contract_name){
      $userModel = new UserModel();
      $registerContract = $userModel->registerContract($contract_name);
      return $registerContract;
   }

   public function registerContact($email_user, $phone_user, $registerUser){
      $userModel = new UserModel();
      $registerContact = $userModel->registerContact($email_user, $phone_user, $registerUser);
      return $registerContact;
   }

   public function registerAccess($number_id, $registerUser){
      $userModel = new UserModel();
      $registerAccess = $userModel->registerAccess($number_id, $registerUser);

      return $registerAccess;
   }
   public function registerAddress($departament, $city, $address, $registerUser){
      $userModel = new UserModel();
      $registerAddress = $userModel->registerAddress($departament, $city, $address, $registerUser);

      return $registerAddress;
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
      $municipio = $userModel->getMunicipioByDeptId($deptId);

      return $municipio;
    }

    public function getGenero(){
      $userModel = new UserModel(); 
      $genero = $userModel->getGenero();
      return $genero;
    }

    public function getTypeId(){

      $userModel = new UserModel();
      $typeId = $userModel->getTypeId();

      return $typeId;
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

   public function getUserDocumentType($type_id, $phone_user, $email_user, $genero){
      $x = new UserModel();
      $actu = $x -> updateUser($type_id,$phone_user, $email_user, $genero);
      echo"actualizacion exitosa";

   }

   public function updateUserPhoto($imagen, $id_user){
      $userModel = new UserModel();
      $updateUserPhoto = $userModel->updateUserPhoto($imagen, $id_user);

      return $updateUserPhoto;
   }

   public function updateUser($id_user, $name, $lastname, $number_id, $birth){
      $userModel = new UserModel();
      $updateUser = $userModel->updateUser($id_user, $name, $lastname, $number_id, $birth);

      return $updateUser;
   }
}