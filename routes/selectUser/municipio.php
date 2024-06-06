<?php

include "../../controller/userController.php";

extract($_REQUEST);

if ($_REQUEST["deptId"] > 0) {

  $deptId = $_REQUEST["deptId"];

  $userController = new UserController();
  $municipios = $userController->getMunicipioByDeptId($deptId);

  header('Content-Type: application/json');
  echo json_encode($municipios);
}else{
  echo json_encode(array('error' => 'Departamento Id no proporcionado'));
}