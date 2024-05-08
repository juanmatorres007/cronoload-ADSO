<?php
include "../controller/contenidoController.php";

if(isset($_GET['dato'])) {
  // Obtiene la variable enviada desde el botón
  $miVariable = $_GET['dato'];
  // Puedes hacer lo que quieras con la variable aquí
  $view = new ContenidoController();

  if ($miVariable == "usuario") {
    $view->view1();
    $view->view2();
    $view->view4();
  } elseif ($miVariable == "registro") {
    $view->view1();
    $view->view2();
    $view->view5();

  } else {
    http_response_code(400);
    echo "Error: Vista desconocida.";
  }

} else {
  // Si no se recibió la variable vista, mostrar la vista por defecto
  $view = new ContenidoController();
  
  $view->view1(); 
  $view->view2();
  $view->view3();

}
