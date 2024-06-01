<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario Rol</title>
</head>

<body>
  <style>
    input[type=text] {
      padding: 10px;
      width: 250px;
    }

    select {
      padding: 10px;
      width: 250px;
    }
  </style>

  <h1><strong>FORMULARIO DE CREACION DE ROLES</strong></h1>
  <form action="../routes/registrouser.php/Rol.php'" method="POST">
    <label for="name_rol">Nombre de rol</label><br>
    <input type="text" placeholder="Nombre de rol" name="name_rol" id="name_rol"><br><br>
    <label>Estado de rol</label><br>
    <select name="state_rol">
      <option value="2">Inactivo</option>
      <option value="1">Activo</option>
    </select><br><br>
    <button type="submit" value="Enviar">Guardar</button>
    <button><a href="../index.php">Atras</a></button>
  </form>

  <script>
    document.getElementById("name_rol").addEventListener("input", function() {

      var valor = this.value;

      valor = valor.replace(/[0-9]/g, '');
      if (valor !== this.value) {
        alert("El campo no permite números.");
        this.value = valor;
      }
    });
  </script>

</body>

</html>