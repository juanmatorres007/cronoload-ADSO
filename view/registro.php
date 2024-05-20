<style>
    input[type=text], input[type=number], input[type=date]{
        padding: 8px;
        width: 240px;
    }

    select {
        padding: 8px;
        width: 240px;
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
        <input type="number" name="number_id_user" placeholder="Ingrese Numero de Identidad"><br><br>

        <label><strong>Rol: </strong></label>
        <select name="rol" id="rolSelect">

        </select><br><br>

        <div id="optionsForAprentice" style="display: none;">
            <label><strong>Ficha: </strong></label>
            <select name="file_user" id="fileSelect">

            </select><br><br>
        </div>

        <div id="optionsForInstructor" style="display: none;">
            <div id="tipoContratoDiv">

                <label><strong>Tipo de contrato: </strong></label>
                <select name="tcontrato" id="ContractTypeSelect">
                    
                </select>
            </div><br>

            <label><strong>Fecha inicial de contrato: </strong></label>
            <input type="date" id="fechaInicio" name="FI"><br><br>

            <label><strong>Fecha de finalización de contrato: </strong></label>
            <input type="date" id="fechaFin" name="FF"><br><br>

            <label><strong>Area de conocimiento: </strong></label>
            <select name="id_know_user" id="knowSelect">

            </select><br><br>
            
            <label><strong>Nivel formativo: </strong></label>
            <select name="id_formation_lvl_user" id="lvlFormSelect">

            </select><br><br>
        </div>
        <button type="submit">Registrar</button>
    </form>
</div>

<script>
    document.getElementById("rolSelect").addEventListener("change", function() {
        var rol = this.options[this.selectedIndex].text;
        var optionsForInstructorDiv = document.getElementById("optionsForAprentice");

        if (rol === "Aprendiz") {
            optionsForInstructorDiv.style.display = "block";
        } else {
            optionsForInstructorDiv.style.display = "none";
        }
    });

    document.getElementById("rolSelect").addEventListener("change", function() {
        var rol = this.options[this.selectedIndex].text;
        var optionsForInstructorDiv = document.getElementById("optionsForInstructor");

        if (rol === "Instructor" || rol === "Coordinador") {
            optionsForInstructorDiv.style.display = "block";
        } else {
            optionsForInstructorDiv.style.display = "none";
        }
    });

    function loadRoles() {
        fetch('../routes/Rol.php')
            .then(response => response.json())
            .then(data => {
                const roleSelect = document.getElementById('rolSelect');
                roleSelect.innerHTML = ''; 

                for (const roleName in data) {
                    if (data.hasOwnProperty(roleName)) {
                        const roleId = data[roleName];
                        const option = document.createElement('option');
                        option.value = roleId; 
                        option.text = roleName;
                        roleSelect.appendChild(option);
                    }
                }
                roleSelect.dispatchEvent(new Event('change'));
            })
            .catch(error => console.error('Error fetching roles:', error));
    }

    loadRoles();

    function loadFile(){
        fetch("../routes/consultaFicha.php")
        .then(response => response.json())
        .then(data => {
            const fileSelect = document.getElementById('fileSelect')
            fileSelect.innerHTML = '';

            for(const fileId in data){
                if(data.hasOwnProperty(fileId)){
                    const fileName = data[fileId];
                    const option = document.createElement('option');
                    option.value = fileName;
                    option.text = fileId;
                    fileSelect.appendChild(option);
                }
            }
            fileSelect.dispatchEvent(new Event('change'));
        })
        .catch(error => console.error('Error fetching files', error))
    }

    loadFile();

    function loadContractType(){
        fetch("../routes/contractType.php")
        .then(response => response.json())
        .then(data =>{
            const contractTypeSelect = document.getElementById('ContractTypeSelect');
            contractTypeSelect.innerHTML = '';

            for(const contractName in data){
                if (data.hasOwnProperty(contractName)){
                    const contractId = data[contractName];
                    const option = document.createElement('option');
                    option.value = contractId;
                    option.text = contractName;
                    contractTypeSelect.appendChild(option);
                }
            }
            contractTypeSelect.dispatchEvent(new Event('change'));
        })
        .catch(error => console.error('Error fetching Contract type', error));
    }

    loadContractType();

    function loadKnow(){
        fetch('../routes/areaReg.php')
        .then(response => response.json())
        .then(data => {
            const areaSelect = document.getElementById('knowSelect');
            areaSelect.innerHTML = '';

            for(const areaName in data){
                if(data.hasOwnProperty(areaName)){
                const areaId = data[areaName];
                const option = document.createElement('option')
                option.value = areaId
                option.text = areaName;
                areaSelect.appendChild(option);
                }
            }
            areaSelect.dispatchEvent(new Event('change'))
        })
        .catch(error => console.error('Error fetching Area Knowledge:', error))

    }

    loadKnow();

    function loadLvlForm(){
        fetch('../routes/lvlForm.php')
        .then(response => response.json())
        .then(data =>{
            const lvlFormSelect = document.getElementById('lvlFormSelect')
            lvlFormSelect.innerHTML = "";

            for(const lvlFormName in data){
                const lvlFormId = data[lvlFormName];
                const option = document.createElement('option');
                option.value = lvlFormId;
                option.text = lvlFormName;
                lvlFormSelect.appendChild(option);
            }
            lvlFormSelect.dispatchEvent(new Event('change'))
        })
        .catch(error => console.error('Error fetching Area Knowledge:', error)) 

    }

    loadLvlForm();

</script>