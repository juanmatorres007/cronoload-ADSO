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
    select{
        padding: 10px;
        width: 250px;
    }
</style>

<h1><strong>FORMULARIO DE CREACION DE ROLES</strong></h1>
<form action="../routes/registerRol.php" method="POST">
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
// Agregar un evento al input para validar mientras el usuario escribe
document.getElementById("name_rol").addEventListener("input", function() {
    // Obtener el valor del input
    var valor = this.value;
    // Reemplazar todos los caracteres que no son letras o espacios con una cadena vacía
    valor = valor.replace(/[0-9]/g, '');
    // Verificar si el valor ha cambiado
    if (valor !== this.value) {
        // Mostrar una alerta si se ingresaron números
        alert("El campo no permite números.");
        // Actualizar el valor del input sin los números
        this.value = valor;
    }
});
</script>

</body>
</html>