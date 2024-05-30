<style>
  input[type=text],
  input[type=number],
  input[type=date],
  input[type=email],
  select {
    padding: 4px;
    width: 220px;
  }
</style>

<div class="perfilContent">
  <div>
    <form action="../routes/user.php?action=update">
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
      <input type="text" name="type_id" id="tipo_documento" placeholder=""><br><br>

      <label for=""><strong>NÚMERO DE DOCUMENTO: </strong></label>
      <input type="number" name="number_id" placeholder="<?php echo $_SESSION['usuario']['number_id_user'] ?>"><br><br>

      <label for=""><strong>GÉNERO: </strong></label>
      <input type="text" name="genero_id" id="genero" placeholder=""><br><br>

      <label for=""><strong>NÚMERO DE CELULAR: </strong></label>
      <input type="number" name="phone_id" id="phone" placeholder=""><br><br>

      <label for=""><strong>CORREO ELECTRONICO: </strong></label>
      <input type="email" name="email_id" id="email" placeholder=""><br><br>
      
      <label for=""><strong>DEPARTAMENTO: </strong></label>
      <input type="" name="departamento_id" id="departamento" placeholder=""><br><br>

      <label for=""><strong>FICHA: </strong></label>
      <input type="number" name="ficha_id" id="ficha" placeholder=""><br><br>

      <input name="btn" type="submit" class="btn btn-outline-dark" value="Actualizar">
    </form>


  </div>
</div>
</body>

</html>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var type_id_user = <?php echo $_SESSION['usuario']['type_id_user']; ?>;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "getData.php?type_id=" + type_id_user, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("tipo_documento").setAttribute("placeholder", xhr.responseText);
      }
    };
    xhr.send();
  });

  document.addEventListener("DOMContentLoaded", function() {
    var id_gen_user = <?php echo $_SESSION['usuario']['id_gen_user']; ?>;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "getData.php?genero_id=" + id_gen_user, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("genero").setAttribute("placeholder", xhr.responseText);
      }
    };
    xhr.send();
  });

  document.addEventListener("DOMContentLoaded", function() {
    var id_auto_conPhone = <?php echo $_SESSION['usuario']['id_auto_user']; ?>;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "getData.php?phone_id=" + id_auto_conPhone, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("phone").setAttribute("placeholder", xhr.responseText);
      }
    };
    xhr.send();
  });

  document.addEventListener("DOMContentLoaded", function() {
    var id_auto_conEmail = <?php echo $_SESSION['usuario']['id_auto_user']; ?>;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "getData.php?email_id=" + id_auto_conEmail, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("email").setAttribute("placeholder", xhr.responseText);
      }
    };
    xhr.send();
  });

  document.addEventListener("DOMContentLoaded", function() {
    var id_auto_file = <?php echo $_SESSION['usuario']['id_auto_user']; ?>;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "getData.php?ficha_id=" + id_auto_file, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("ficha").setAttribute("placeholder", xhr.responseText);
      }
    };
    xhr.send();
  });

  document.addEventListener("DOMContentLoaded", function() {
    var id_auto_dept = <?php echo $_SESSION['usuario']['id_auto_user']; ?>;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "getData.php?departamento_id=" + id_auto_dept, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("departamento").setAttribute("placeholder", xhr.responseText);
      }
    };
    xhr.send();
  });
  
</script>