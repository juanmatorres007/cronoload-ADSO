<style>
  input[type=text],
  input[type=number],
  input[type=date],
  input[type=email],
  select {
    padding: 4px;
    width: 220px;
  }

  #fotoPerfil{
    border-radius: 45px; 
    border: 1px solid black;
    }
</style>

<div class="perfilContent">
  <div>
    <form action="../routes/Registros/user.php?action=update" method="POST" enctype="multipart/form-data">
      <label class="label" for=""><strong>FOTO DE PERFIL: </strong>
        <div class="contenedor">
          <div class="foto_perfil">
            <img id="fotoPerfil" src="
            <?php 
            if(isset($_SESSION['usuario']['photo_user'])){
              echo $_SESSION['usuario']['photo_user'];
            }else{
              ?> ../img/imgPrueba/default.png <?php
            }
            ?>"
            height="90" width="90" alt="" loading="lazy" onclick="cambiarFotoPerfil();" style="cursor: pointer;"/>
            <input type="file" id="newPhoto" name="newPhoto" style="display: none;" accept="image/*" onchange="mostrarNuevaFoto(this);">
            <input type="hidden" id="urlImagen" name="imageUrl">
          </div>
        </div>
      </label>
      <br><br>

      <input type="hidden" name="id" value="<?php echo $_SESSION['usuario']['id_auto_user']; ?>"><br><br>

      <label for=""><strong>NOMBRES: </strong></label>
      <input type="text" name="name_user" value="<?php echo $_SESSION['usuario']['name_user']; ?>"><br><br>

      <label for=""><strong>APELLIDOS: </strong></label>
      <input type="text" name="lastname" value="<?php echo $_SESSION['usuario']['lastname_user']; ?>"><br><br>

      <label for=""><strong>TIPO DE DOCUMENTO: </strong></label>
      <input type="text" name="type_id" id="tipo_documento" placeholder=""><br><br>

      <label for=""><strong>NÚMERO DE DOCUMENTO: </strong></label>
      <input type="number" name="number_id" value="<?php echo $_SESSION['usuario']['number_id_user']; ?>"><br><br>

      <label for=""><strong>GÉNERO: </strong></label>
      <select name="genero_id" id="genero"></select><br><br>

      <label for=""><strong>FECHA DE NACIMIENTO: </strong></label>
      <input type="date" name="birth_id" id="birth" placeholder="" value="<?php echo $_SESSION['usuario']['birth_user']; ?>"><br><br>

      <label for=""><strong>NÚMERO DE CELULAR: </strong></label>
      <input type="number" name="phone_id" id="phone" placeholder=""><br><br>

      <label for=""><strong>CORREO ELECTRONICO: </strong></label>
      <input type="email" name="email_id" id="email" placeholder=""><br><br>
      
      <label for=""><strong>DEPARTAMENTO: </strong></label>
      <select name="departamento_id" id="departamento"></select><br><br>

      <label for=""><strong>MUNICIPIO: </strong></label>
      <select name="municipio_id" id="municipio"></select><br><br>

      <label for=""><strong>DIRECCIÓN: </strong></label>
      <input type="" name="direccion_id" id="direccion" placeholder=""><br><br>

      <?php if($_SESSION['getSessionRol'] === "Aprendiz"){?>

      <label for=""><strong>FICHA: </strong></label>
      <input type="number" name="ficha_id" id="ficha" placeholder=""><br><br>

      <?php }?>

      <label for=""><strong>TIPO DE CONTRATO: </strong></label>
      <input type="" name="contrato_id" id="contrato" placeholder=""><br><br>

      <?php if($_SESSION['getSessionRol'] === "Coordinador" || $_SESSION['getSessionRol'] === "Instructor"){?>

      <label for=""><strong>FECHA INICIAL DEL CONTRATO: </strong></label>
      <input type="date" name="startContrato_id" id="startContrato" placeholder=""><br><br>

      <label for=""><strong>FECHA FINAL DEL CONTRATO: </strong></label>
      <input type="date" name="endContrato_id" id="endContrato" placeholder=""><br><br>

      <label for=""><strong>AREA DE CONOCIMIENTO: </strong></label>
      <input type="" name="know_id" id="know" placeholder=""><br><br>

      <label for=""><strong>NIVEL FORMATIVO: </strong></label>
      <input type="" name="lvl_id" id="lvl" placeholder=""><br><br>

      <?php }?>

      <label for=""><strong>ROL: </strong></label>
      <input type="text" name="rol_user" value="<?php echo $_SESSION['getSessionRol'] ?>"><br><br>

      <input name="btn" type="submit" class="btn btn-outline-dark" value="Guardar">
    </form>


  </div>
</div>
</body>

</html>

<script>

  //-------------------------------------------------------------//

  document.addEventListener("DOMContentLoaded", function() {
    var type_id_user = <?php echo $_SESSION['usuario']['type_id_user']; ?>;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../routes/Consultas/getData.php?type_id=" + type_id_user, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("tipo_documento").value = xhr.responseText;
      }
    };
    xhr.send();
  });

  //-------------------------------------------------------------//

  document.addEventListener("DOMContentLoaded", function() {
    var id_gen_user = <?php echo $_SESSION['usuario']['id_gen_user']; ?>;
    var generoSelect = document.getElementById("genero");

   function cargarOpcionesGenero(genero) {
        generoSelect.innerHTML = "";

        for (var generoNombre in genero) {
            if (genero.hasOwnProperty(generoNombre)) {
                var generoId = genero[generoNombre];
                var option = document.createElement("option");
                option.text = generoNombre;
                option.value = generoId;

            if (genero.id === id_gen_user) {
                option.selected = true;
            }

            generoSelect.appendChild(option);
        }
    }
  }    
    fetch("../routes/selectUser/genero.php")
        .then(response => response.json())
        .then(data => {
            cargarOpcionesGenero(data);
        })
        .catch(error => console.error('Error fetching files', error));
});

//-------------------------------------------------------------//

  document.addEventListener("DOMContentLoaded", function() {
    var id_auto_conPhone = <?php echo $_SESSION['usuario']['id_auto_user']; ?>;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../routes/Consultas/getData.php?phone_id=" + id_auto_conPhone, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("phone").value = xhr.responseText;
      }
    };
    xhr.send();
  });

  //-------------------------------------------------------------//

  document.addEventListener("DOMContentLoaded", function() {
    var id_auto_conEmail = <?php echo $_SESSION['usuario']['id_auto_user']; ?>;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../routes/Consultas/getData.php?email_id=" + id_auto_conEmail, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("email").value = xhr.responseText;
      }
    };
    xhr.send();
  });

  //-------------------------------------------------------------//

  document.addEventListener("DOMContentLoaded", function() {
    var id_auto_file = <?php echo $_SESSION['usuario']['id_auto_user']; ?>;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../routes/Consultas/getData.php?ficha_id=" + id_auto_file, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("ficha").value = xhr.responseText;
      }
    };
    xhr.send();
  });

//-------------------------------------------------------------//
    // SIN TERMINAR!!

document.addEventListener("DOMContentLoaded", function() {
    var id_auto_dept = <?php echo $_SESSION['usuario']['id_auto_user']; ?>;
    var municipioSelect = document.getElementById("municipio");
    var departamentoSelect = document.getElementById("departamento");

    // Se crea una función para cargar las opciones del departamento del usuario
    function cargarOpcionesDepartamentoUsuario(departamentoUsuario) {
        if(departamentoUsuario){
            const defaultOption = document.createElement("option");
            defaultOption.text = departamentoUsuario.departamento;
            defaultOption.value = departamentoUsuario.id_departamento;
            departamentoSelect.appendChild(defaultOption);
            console.log("ID departamento default: ", departamentoUsuario.id_departamento)

            // Disparar el evento de cambio del departamento para cargar automáticamente los municipios
            departamentoSelect.dispatchEvent(new Event('change'));
        }
    }

    // Se crea una función para cargar las opciones de los demás departamentos
    function cargarOpcionesDepartamentos(departamentos) {
        departamentos.forEach(function(departamento) {
            const option = document.createElement("option");
            option.text = departamento.departamento;
            option.value = departamento.id_departamento;
            departamentoSelect.appendChild(option);
        });
    }

    // Se realiza una petición para obtener el departamento del usuario
    fetch("../routes/Consultas/getData.php?departamento_id=" + id_auto_dept)
        .then(response => response.json())
        .then(data => {
            // Llama a la función para cargar las opciones del departamento del usuario
            cargarOpcionesDepartamentoUsuario(data[0]);
            console.log("Departamento default: ", data[0])
            // Luego, realiza una petición para obtener todos los departamentos disponibles
            fetch("../routes/selectUser/address.php")
                .then(response => response.json())
                .then(data => {
                    // Llama a la función para cargar las opciones de los demás departamentos
                    cargarOpcionesDepartamentos(data);
                })
                .catch(error => console.error('Error fetching files', error));
        })
        .catch(error => console.error('Error fetching files', error));

    // Event listener para detectar el cambio en la selección del departamento
    departamentoSelect.addEventListener("change", function() {
        // Obtener el ID del departamento seleccionado por el usuario
        var id_departamento_seleccionado = departamentoSelect.value;

        // Realizar una petición para obtener los municipios del departamento seleccionado
        fetch("../routes/selectUser/municipio.php?deptId=" + id_departamento_seleccionado)
            .then(response => response.json())
            .then(data => {
                console.log("Los municipios cargados son: ", data);
                // Limpiar la lista de municipios antes de agregar nuevos
                municipioSelect.innerHTML = '';
                // Llama a la función para cargar las opciones de los demás municipios
                cargarOpcionesMunicipio(data);
            })
            .catch(error => console.error('Error fetching files', error));
    });

//-------------------------------------------------------------//

 // Función para cargar las opciones del municipio del usuario
 function cargarOpcionesMunicipioUsuario(municipioUsuario) {

        if (municipioUsuario) {
            const defaultOption = document.createElement("option");
            defaultOption.text = municipioUsuario.municipio;
            defaultOption.value = municipioUsuario.id_municipio;
            municipioSelect.appendChild(defaultOption);
            console.log("Municipios: ", municipioUsuario.municipio)

            municipioSelect.dispatchEvent(new Event('change'));
        }
    }

    // Función para cargar las opciones de los demás municipios
    function cargarOpcionesMunicipio(municipios) {
        console.log("Otros municipios:", municipios);

        municipios.forEach(function(municipio) {
            const option = document.createElement("option");
            option.text = municipio.municipio;
            option.value = municipio.id_municipio;
            municipioSelect.appendChild(option);
            // console.log("Municipios: ", municipio.id_municipio)
        });
    }

    // Función para cargar automáticamente los municipios del departamento del usuario
    function cargarMunicipiosUsuario() {
        // Realizar una petición para obtener el municipio del usuario
        console.log("Usuario:", id_auto_dept)
        fetch("../routes/Consultas/getData.php?municipio_id=" + id_auto_dept)
            .then(response => response.json())
            .then(data => {
                console.log("El municipio del usuario es: ", data[0]);
                // Llama a la función para cargar las opciones del municipio del usuario
                cargarOpcionesMunicipioUsuario(data[0]);
            })
            .catch(error => console.error('Error fetching files', error));
    }

    // Cargar automáticamente los municipios del departamento del usuario al cargar la página
    cargarMunicipiosUsuario();
});

    //SIN TERMINAR!!  
    

  //-------------------------------------------------------------//

  document.addEventListener("DOMContentLoaded", function() {
    var id_auto_dir = <?php echo $_SESSION['usuario']['id_auto_user']; ?>;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../routes/Consultas/getData.php?direccion_id=" + id_auto_dir, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("direccion").value = xhr.responseText;
      }
    };
    xhr.send();
  });

  //-------------------------------------------------------------//

  document.addEventListener("DOMContentLoaded", function() {
    var id_auto_contract = <?php echo $_SESSION['usuario']['id_auto_user']; ?>;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../routes/Consultas/getData.php?contrato_id=" + id_auto_contract, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("contrato").value = xhr.responseText;
      }
    };
    xhr.send();
  });

  //-------------------------------------------------------------//

  document.addEventListener("DOMContentLoaded", function() {
    var id_auto_startContract = <?php echo $_SESSION['usuario']['id_auto_user']; ?>;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../routes/Consultas/getData.php?startContrato_id=" + id_auto_startContract, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var fechaTexto = xhr.responseText;

            var fecha = new Date(fechaTexto);

            var fechaFormateada = fecha.toISOString().slice(0, 10);

            document.getElementById("startContrato").value = fechaFormateada;
        }
    };
    xhr.send();
});

//-------------------------------------------------------------//

document.addEventListener("DOMContentLoaded", function() {
    var id_auto_endContract = <?php echo $_SESSION['usuario']['id_auto_user']; ?>;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../routes/Consultas/getData.php?endContrato_id=" + id_auto_endContract, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var fechaTexto = xhr.responseText;

            var fecha = new Date(fechaTexto);

            var fechaFormateada = fecha.toISOString().slice(0, 10);

            document.getElementById("endContrato").value = fechaFormateada;
        }
    };
    xhr.send();
});

//-------------------------------------------------------------//

document.addEventListener("DOMContentLoaded", function() {
    var id_auto_know = <?php echo $_SESSION['usuario']['id_auto_user']; ?>;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../routes/Consultas/getData.php?know_id=" + id_auto_know, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("know").value = xhr.responseText;
      }
    };
    xhr.send();
  });

  //-------------------------------------------------------------//

  document.addEventListener("DOMContentLoaded", function() {
    var id_auto_lvl = <?php echo $_SESSION['usuario']['id_auto_user']; ?>;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../routes/Consultas/getData.php?lvl_id=" + id_auto_lvl, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("lvl").value = xhr.responseText;
      }
    };
    xhr.send();
  });

  //-------------------------------------------------------------//

  //funciones para la Imagen:

  function cambiarFotoPerfil() {
    document.getElementById("newPhoto").click();
}

function mostrarNuevaFoto(input) {
    if (input.files && input.files[0]) {
      var extension = input.files[0].name.split('.').pop().toLowerCase();
      if (extension === 'jpg' || extension === 'png') {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("fotoPerfil").src = e.target.result;

            var imageName = input.files[0].name;
            var folderPath = '../img/imgPrueba/'; 
            var imageUrl = folderPath + imageName; 
            document.getElementById("urlImagen").value = imageUrl;
        }
        reader.readAsDataURL(input.files[0]);
      } else {
            alert("Por favor, selecciona una imagen de tipo JPG o PNG.");
      }
    }
}

//Fin de las funciones para la imagen
//-------------------------------------------------------------//

</script>

<!-- Foto de perfil terminada continuar con el proceso de las fichas -->