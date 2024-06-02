<?php    
include_once "../../controller/userController.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $registro_area = new UserController();
    $nombreArea = $_POST['area'];
    $estado = $_POST['estado'];
    date_default_timezone_set('America/Bogota');
    $var_date = date("Y-m-d");

    $registro_area->registerArea($nombreArea, $var_date, $estado);
// Devuelve una respuesta de éxito si es necesario
    // echo json_encode(array("message" => "Área de conocimiento registrada exitosamente"));
}else{  
  $consulta_area = new UserController();
  $areas = $consulta_area->getKnowArea();

  header('Content-Type: application/json');
  echo json_encode($areas); 
}