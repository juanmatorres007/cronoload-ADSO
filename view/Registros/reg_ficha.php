<h2>Formulario de regfistro de Ficha</h2>

<form action="../../routes/registrouser/registrarFicha.php" method="POST">

<input type="hidden" name="IdProyect" value="<?php echo $idproyect?>">

<label for="">Numero de Ficha: </label>
<input type="int" name="num_ficha" placeholder="Ingrese numero de ficha"><br>

<input type="hidden" name="estado" value="1"><br>

<label for="">Fecha de inicio: </label>
<input type="date" name="f_inicio"><br><br>

<label for="">Fecha de finalizacion: </label>
<input type="date" name="f_fin"><br><br>

<button type="submit">Guardar</button>

</form>