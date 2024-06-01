<h1>REGISTRO DE PROYECTO FORMATIVO</h1>
<form action="../routes/registrouser.php/proyectoRegistro.php" method="POST">

<input type="hidden" name="IdArea" value="<?php echo $idarea; ?>">
<label>Nombre de proyecto</label>
<input type="text" name="nombre_proyec" placeholder="ingrese el nombre de proyecto">

<label>Numero de proyecto</label>
<input type="number" name="numero_proyec" placeholder="ingrese numero de proyecto">

<input type="hidden" name="estado" value="1">
<button type="submit">Guardar</button>
</form>