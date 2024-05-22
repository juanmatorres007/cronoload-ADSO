<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link rel="stylesheet" href="../Assets/css/">
  <link href="<?php echo base_url ?>Assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url ?>Assets/css/main.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <div id="calendar"></div>
  </div>
  <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h5 class="modal-title" id="titulo">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>

        <form action="">
          <div class="modal-body">
            <input type="date" class="from-control" id="start">
            <label for="start" class="from-label">Fecha</label><br><br>
            <select name="dateform" id="">

            </select>
            <label for="start">Instructor</label><br><br>
            <select name="ins" id="">

            </select>
            <label for="start">Area de Formacion</label><br><br>
            <select name="area" id="">

            </select>
            <label for="start">Ficha Tecnica</label><br><br>
            <select name="ficha" id="">

            </select>
            <label for="">Resultado de Aprendizaje</label>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Guardar Evento</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
            </div>
          </div>
        </form>

      </div>

    </div>
  </div>
  <script src="<?php echo base_url ?>Assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url ?>Assets/js/main.js"> </script>
  <script src="<?php echo base_url ?>Assets/js/moment.js"> </script>
  <script src="<?php echo base_url ?>Assets/js/sweetalert2@11.js"> </script>
  <script src="<?php echo base_url ?>Assets/js/es.js"> </script>
  <script src="<?php echo base_url ?>Assets/js/app.js"> </script>

</body>

</html>