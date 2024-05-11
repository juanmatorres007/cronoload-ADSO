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

<div class="registerContent">
    <form id="registrationForm" action="../routes/user.php" method="POST">
        <h2>Formulario de Registro</h2>

        <label><strong>Nombre: </strong></label>
        <input type="text" name="name_user" placeholder="Ingrese su Nombre"><br><br>

        <label><strong>Apellido: </strong></label>
        <input type="text" name="lastname_user" placeholder="Ingrese su Apellido"><br><br>

        <label><strong>Tipo de documento: </strong></label>
        <select name="type_id_user">
            <option value="1">CC</option>
            <option value="2">TI</option>
        </select><br><br>

        <label><strong>Número de identidad: </strong></label>
        <input type="number" name="munber_id_user" placeholder="Ingrese Numero de Identidad"><br><br>

        <label><strong>Rol: </strong></label>
        <select name="rol" id="rolSelect">

        </select><br><br>

        <div id="optionsForInstructor" style="display: none;">
            <div id="tipoContratoDiv">
                <label><strong>Tipo de contrato: </strong></label>
                <select id="tipoContratoSelect" name="tcontrato">
                    <option value="1">Planta</option>
                    <option value="2">Contratista</option>
                </select>
            </div><br>

            <label><strong>Fecha inicial de contrato: </strong></label>
            <input type="date" id="fechaInicio" name="FI"><br><br>

            <label><strong>Fecha de finalización de contrato: </strong></label>
            <input type="date" id="fechaFin" name="FF"><br><br>

            <label><strong>Area de conocimiento: </strong></label>
            <input type="text" name="id_know_user" placeholder="Ingrese are de conocimiento"><br><br>

            <label><strong>Nivel formativo: </strong></label>
            <input type="text" name="id_information_lvl_user" placeholder="Ingrese nivel formativo"><br><br>
        </div>
        <button type="submit">Registrar</button>
    </form>
</div>

<script>
document.getElementById("rolSelect").addEventListener("change", function () {
  var rol = this.value;
  var optionsForInstructorDiv = document.getElementById("optionsForInstructor");

  if (rol === "Instructor") {
    optionsForInstructorDiv.style.display = "block";
  } else {
    optionsForInstructorDiv.style.display = "none";
  }
});

     // Función para cargar los roles dinámicamente
     function loadRoles() {
        fetch('../routes/Rol.php')
            .then(response => response.json())
            .then(data => {
                const roleSelect = document.getElementById('rolSelect');
                roleSelect.innerHTML = ''; // Limpia opciones anteriores

                data.forEach(role => {
                    const option = document.createElement('option');
                    option.value = role;
                    option.text = role;
                    roleSelect.appendChild(option);
                });

                // Llamada al evento change después de cargar los roles para asegurar la correcta visualización de los campos
                roleSelect.dispatchEvent(new Event('change'));
            })
            .catch(error => console.error('Error fetching roles:', error));
    }

    // Cargar roles al cargar la página
    loadRoles();

//  // Función para cargar los roles dinámicamente
</script>