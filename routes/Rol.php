<?php

include "../controller/rolController.php";

extract($_REQUEST);

// $name_rol = $_REQUEST['name_rol'];
// $state_rol = $_REQUEST['state_rol'];

$rolController = new RolController();
// $insertRol->insertRol($name_rol, $state_rol);
//   if($insertRol > 0 ){
//     $consultRol = $rolController->consulRol();
//     return $consultRol;
//   }

// Manejar las rutas
if (isset($action)) {
  switch ($action) {
      case 'insert': // Ruta para insertar un rol
          if (isset($name_rol, $state_rol)) {
              $rolController->insertRol($name_rol, $state_rol);
          } else {
              // Manejar el caso en el que faltan parámetros
              echo "Error: Faltan parámetros para insertar el rol.";
          }
          break;
      case 'consult': // Ruta para consultar los roles
          $consultRol = $rolController->consulRol();
          // Puedes realizar alguna acción adicional aquí si es necesario
          break;
      default:
          // Manejar el caso en el que la acción no está definida
          echo "Error: Acción no válida.";
          break;
  }
} else {
  // Manejar el caso en el que no se proporciona ninguna acción
  echo "Error: No se proporciona ninguna acción.";
}
?>