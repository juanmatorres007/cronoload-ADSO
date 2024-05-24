<?php

include "../controller/userController.php";

if (isset($_GET["deptId"])) {

  $deptId = $_GET["deptId"];

  $userController = new UserController();
  $municipios = $userController->getMunicipioByDeptId($deptId);

  header('Content-Type: application/json');
  echo json_encode($municipios);
}else{
  echo json_encode(array('error' => 'Departamento Id no proporcionado'));
}