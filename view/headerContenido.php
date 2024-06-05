<?php
include "../routes/ifRol.php";
<<<<<<< HEAD
session_start();
=======
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
>>>>>>> 4bdc9845ecbe3ee5a41f909c33bf67f6396d71d7
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagina principal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/calendar.css">
  <script src="../js/script.js"></script>
  <script src="main.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

  <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-secondary fixed-top">
    <div class="container-fluid">
      <div class="welcome">
        <div class="welcome2">
          <h3>Bienvenido                
          <span id="rol_usuario"><?php echo $getSessionRol, ": "; ?></span>
            <?php
            if (isset($_SESSION['usuario'])) {
<<<<<<< HEAD
              // Imprimir el nombre de usuario
             echo $_SESSION['usuario']['name_user'], " ", $_SESSION['usuario']['lastname_user'];
            } else {
             //Si la sesión no está iniciada, redirigir al inicio de sesión
             header("Location:../index.php");
              exit();
            }
           ?>
=======
              echo $_SESSION['usuario']['name_user'], " ", $_SESSION['usuario']['lastname_user'];
            } else {
              header("Location: ../index.php");
              exit();
            }
            ?>
>>>>>>> 4bdc9845ecbe3ee5a41f909c33bf67f6396d71d7
          </h3>
        </div>
      </div>
      <div class="container" id="pg">
        <div class="btn-menu" id="malo">
          <label for="btn-menu" class=""><img src="../img/s.png" height="60" alt="MDB Logo" loading="lazy" /></label>
        </div>
      </div>
  </nav>


  <?php
<<<<<<< HEAD
  include "cronograma.php";
  ?>

  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/main.js"> </script>
  <script src="../js/moment.js"> </script>
  <script src="../js/sweetalert2@11.js"> </script>
  <script src="../js/es.js"> </script>
  <script src="../js/app.js"> </script>
</body>

</html>
=======
  include_once "../routes/contenido.php";
  ?>
>>>>>>> 4bdc9845ecbe3ee5a41f909c33bf67f6396d71d7
