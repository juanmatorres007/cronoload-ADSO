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
    $view->view3();
  } else if($miVariable == "registro") {
    $view->view1();
    $view->view2();
    $view->view4();
  } else if($miVariable == "const"){
    $view->view1();
    $view->view2();
    $view->view5();
  } else if($miVariable == "consulta_general"){
    $view->view1();
    $view->view2();
    $view->view6();
  }else if($miVariable == "updateForm"){
    $view->view1();
    $view->view2();
    $view->viewUpdate($_GET);
  }else if($miVariable == "forms"){
    if(isset($_GET['tabla'])) {
      $tabla = $_GET['tabla'];
      $view->view1();
      $view->view2();
      $view->viewRegisterForm($tabla);
    }
  }else if($miVariable == "calendar"){
    $view->view1();
    $view->view2();
    // $view->showCalendar();
  }else {
    http_response_code(400);
    echo "Error: Vista desconocida.";
  }
} else {
  // Si no se recibió la variable vista, mostrar la vista por defecto
  $view = new ContenidoController();
  
  $view->view1(); 
  $view->view2();
  // $view->view3();
}