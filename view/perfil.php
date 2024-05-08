<div class="perfilContent">
<div>
<form action="../routes/user.php">
    <label class="label" for=""><strong>FOTO DE PERFIL: </strong>
      <div class="contenedor">
        <div class="foto_perfil">
          <img src="" height="80" width="90" alt="" loading="lazy" />
        </div>
      </div>
    </label>
    <br><br><br>
    <label for=""><strong>NOMBRES: </strong></label>
    <input type="text" name="name" placeholder="<?php echo $_SESSION['usuario']['name_user'] ?>"><br><br>
    <label for=""><strong>APELLIDOS: </strong></label>
    <input type="text" name="lastname" placeholder="<?php echo $_SESSION['usuario']['lastname_user'] ?>"><br><br>
    <label for=""><strong>TIPO DE DOCUMENTO: </strong></label>
    <input type="text" name="type_id" placeholder="<?php if($_SESSION['usuario']['type_id_user'] == 1){
        echo "C.C";
      }else{
        echo "T.I";
      }
    ?>">
    <br><br>
    <label for=""><strong>NÚMERO DE DOCUMENTO: </strong></label>
    <input type="number" name="number_id" placeholder="<?php echo $_SESSION['usuario']['number_id_user'] ?>"><br><br><br>
    <input name="btn" type="submit" class="btn btn-outline-dark" value="Actualizar">
  </form>

</div>
</div>
</body>
</html>