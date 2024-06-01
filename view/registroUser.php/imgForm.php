<h2>Formulario de imagenes</h2>
<form action="../routes\registrouser.php\imgRegister.php" method="POST" enctype="multipart/form-data">
  <label><h4><strong>Ingrese la foto que quiere cargar:</strong></h4></label>
  <input type="file" name="photo"><br><br>
  <input type="submit" value="Guardar" name="submit">
</form>
<?php 

if(!empty($get_img)){
  include "pruebaImg.php";
}else{
  echo "Procesando";
}
?>