<?php
  session_start();
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
  <script src="../js/script.js"></script>
  <script src="main.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-secondary fixed-top">
    <div class="container-fluid">
      <div class="welcome">
        <div class="welcome2">
          <h3>Bienvenido usuario:
            <?php
              if (isset($_SESSION['usuario'])) {
                // Imprimir el nombre de usuario
                echo $_SESSION['usuario']['name_user']," ",$_SESSION['usuario']['lastname_user'];
              } else {
               // Si la sesión no está iniciada, redirigir al inicio de sesión
               header("Location: ../index.php");
               exit();
              }
            ?>
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
      include_once "../routes/contenido.php";
  ?>