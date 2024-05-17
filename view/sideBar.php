<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejemplo de AJAX</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

  <div class="capa"></div>
  <input type="checkbox" id="btn-menu">

  <div class="container-menu">

    <div class="cont-menu" id="miSidebar">
      <nav>
        <a id="calendar" href="#"><strong>
            <h5>Calendario</h5>
          </strong></a>
        <a id="usuario" href="#"><strong>
            <h5>Usuario</h5>
          </strong></a>
        <a id="registro" href="#"><strong>
            <h5>Registro</h5>
          </strong></a>
        <a href=""><strong>
            <h5>Quiza</h5>
          </strong></a>
      </nav>
      <label for="btn-menu" class="bi bi-x"></label>
    </div>
  </div>

  <script>
    document.getElementById("usuario").addEventListener("click", function() {
      var vista = "usuario";
      window.location.href = "../routes/contenido.php?dato=" + vista;
    });

    document.getElementById("registro").addEventListener("click", function() {
      var vista = "registro";
      window.location.href = "../routes/contenido.php?dato=" + vista;
    });

    document.getElementById("calendar").addEventListener("click", function() {
      var vista = "calendar";
      window.location.href = "../routes/contenido.php?dato=" + vista;
    })
  </script>