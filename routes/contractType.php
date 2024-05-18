<?php

include "../controller/userController.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $userController = new UserController();

  $contract_name = $_POST['contract_name'];
  $insertContract = $userController->registerContract($contract_name);

}else{  
  $userController = new userController();

  $contractType = $userController->getContractType();
  header('Content-Type: application/json');
  echo json_encode($contractType);
}