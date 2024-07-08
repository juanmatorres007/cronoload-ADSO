<style>
    input[type=text],
    input[type=number],
    input[type=date],
    input[type=email],
    select {
        padding: 8px;
        width: 255px;
        height: 38px;
        margin-bottom: 10px;
    }

    .registerContent {
        display: flex;
    }

    .form-columns {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .form-columns-2 {
        flex-direction: column;
        display: flex;
        margin-left: 95%;
        margin-top: -115%;
    }

    @media only screen and (max-width: 600px) {
        .form-columns-2 {
            flex-direction: column;
        }
    }
</style>

<div class="registerContent">
    <form id="registrationForm" action="../routes/Registros/user.php?action=register" method="POST">
        <h2>Formulario de Registro</h2>

        <label><strong>Nombre: </strong></label>
        <input type="text" name="name_user" placeholder="Ingrese su Nombre"><br><br>

        <label><strong>Apellido: </strong></label>
        <input type="text" name="lastname_user" placeholder="Ingrese su Apellido"><br><br>

        <label><strong>Tipo de documento: </strong></label>
        <select name="type_id_user" id="typeIdSelect">
        </select><br><br>

        <label><strong>Número de identidad: </strong></label>
        <input type="number" name="number_id_user" placeholder="Ingrese Numero de Identidad"><br><br>

        <label><strong>Genero: </strong></label>
        <select name="genero_user" id="generoSelect">
        </select><br><br>

        <div class="form-row">
            <label><strong>Fecha de nacimiento: </strong></label>
            <input type="date" id="birth_id" name="birth">
        </div><br>

        <input type="hidden" name="state" value="1">

        <label><strong>Correo Electronico: </strong></label>
        <input type="email" name="email_user" placeholder="Ingrese su Correo Electronico"><br><br>

        <label><strong>Número de celular: </strong></label>
        <input type="number" name="phone_user" placeholder="Ingrese Numero de Celular"><br><br>

        <label><strong>Departamento de Recidencia: </strong></label>
        <select name="id_dept_user" id="deptSelect">
        </select><br><br>

        <div class="form-row">
            <label><strong>Municipio de Recidencia: </strong></label>
            <select name="id_mun_user" id="munSelect">
            </select>
        </div><br>

        <label><strong>Dirección: </strong></label>
        <input type="text" name="address_user" placeholder="Ingrese su dirección"><br><br>

        <label><strong>Rol: </strong></label>
        <select name="rol" id="rolSelect">
        </select><br><br>

        <div id="optionsForAprentice" class="form-columns" style="display: none;">
            <div class="form-row">
                <label><strong>Ficha: </strong></label>
                <select name="file_user" id="fileSelect">
                </select>
            </div>
        </div>

        <div id="optionsForInstructor" class="form-columns-2" style="display: none;">
            <div class="form-row">
                <div id="tipoContratoDiv">
                    <label><strong>Tipo de contrato: </strong></label>
                    <select name="tcontrato" id="ContractTypeSelect">
                    </select>
                </div>
            </div>

            <div class="form-row">
                <label><strong>Fecha inicial de contrato: </strong></label>
                <input type="date" id="fechaInicio" name="startDate">
            </div>

            <div class="form-row">
                <label><strong>Fecha de finalización de contrato: </strong></label>
                <input type="date" id="fechaFin" name="endDate">
            </div>

            <div class="form-row">
                <label><strong>Area de conocimiento: </strong></label>
                <select name="id_know_user" id="knowSelect">
                </select>
            </div>

            <div class="form-row">
                <label><strong>Nivel formativo: </strong></label>
                <select name="id_formation_lvl_user" id="lvlFormSelect">
                </select>
            </div>
        </div>
        <button type="submit">Registrar</button>
    </form>
</div>

<script>
    document.getElementById("rolSelect").addEventListener("change", function() {
        var rol = this.options[this.selectedIndex].text;
        var optionsForAprenticeDiv = document.getElementById("optionsForAprentice");
        var optionsForInstructorDiv = document.getElementById("optionsForInstructor");

        if (rol === "Aprendiz") {
            optionsForAprenticeDiv.style.display = "flex";
            optionsForInstructorDiv.style.display = "none";
        } else if (rol === "Instructor" || rol === "Coordinador") {
            optionsForAprenticeDiv.style.display = "none";
            optionsForInstructorDiv.style.display = "flex";
        } else {
            optionsForAprenticeDiv.style.display = "none";
            optionsForInstructorDiv.style.display = "none";
        }
    });

    //Hace que el formulario muestre diferentes campos dependiendo del rol del usuario

    function loadRoles() {
        fetch('../routes/selectUser/Rol.php')
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

    //Carga de forma dinamica los roles en el campo de rolSelect

    function loadGenero() {
        fetch("../routes/selectUser/genero.php")
            .then(response => response.json())
            .then(data => {
                const generoSelect = document.getElementById('generoSelect')
                generoSelect.innerHTML = '';

                for (const generoId in data) {
                    if (data.hasOwnProperty(generoId)) {
                        const generoName = data[generoId];
                        const option = document.createElement('option');
                        option.value = generoName;
                        option.text = generoId;
                        generoSelect.appendChild(option);
                    }
                }
                generoSelect.dispatchEvent(new Event('change'));
            })
            .catch(error => console.error('Error fetching files', error))
    }

    loadGenero();

        //Carga de forma dinamica los generos en el campo de generoSelect


    function loadFile() {
        fetch("../routes/consultasuser/consultaFicha.php")
            .then(response => response.json())
            .then(data => {
                const fileSelect = document.getElementById('fileSelect')
                fileSelect.innerHTML = '';

                for (const fileId in data) {
                    if (data.hasOwnProperty(fileId)) {
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

        //Carga de forma dinamica las fichas en el campo de fileSelect

    function loadContractType() {
        fetch("../routes/selectUser/contractType.php")
            .then(response => response.json())
            .then(data => {
                const contractTypeSelect = document.getElementById('ContractTypeSelect');
                contractTypeSelect.innerHTML = '';

                for (const contractName in data) {
                    if (data.hasOwnProperty(contractName)) {
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

        //Carga de forma dinamica los tipos de contratos en el campo de ContractTypeSelect

    function loadKnow() {
        fetch('../routes/selectUser/areaReg.php')
            .then(response => response.json())
            .then(data => {
                const areaSelect = document.getElementById('knowSelect');
                areaSelect.innerHTML = '';

                for (const areaName in data) {
                    if (data.hasOwnProperty(areaName)) {
                        const areaId = data[areaName];
                        const option = document.createElement('option');
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

        //Carga de forma dinamica las areas de conocimiento en el campo de knowSelect

    function loadLvlForm() {
        fetch('../routes/selectUser/lvlForm.php')
            .then(response => response.json())
            .then(data => {
                const lvlFormSelect = document.getElementById('lvlFormSelect')
                lvlFormSelect.innerHTML = "";

                for (const lvlFormName in data) {
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

        //Carga de forma dinamica los niveles formativos en el campo de lvlFormSelect

    function loadDept() {
        fetch('../routes/selectUser/address.php')
            .then(response => response.json())
            .then(data => {
                const deptSelect = document.getElementById('deptSelect');
                deptSelect.innerHTML = '';

                const emptyOption = document.createElement('option');
                emptyOption.value = '';
                emptyOption.text = "Seleccione un Departamento";
                deptSelect.appendChild(emptyOption);

            data.forEach(dept => {
                const option = document.createElement('option');
                option.value = dept.id_departamento; 
                option.text = dept.departamento; 
                deptSelect.appendChild(option);
            });
                console.log('Departamentos cargados correctamente', data)
            })
            .catch(error => console.error('Error fetching Departament:', error))
    }

    loadDept();

        //Carga de forma dinamica los departamentos en el campo de deptSelect

    function loadMun() {
    const deptSelect = document.getElementById('deptSelect');
    const munSelect = document.getElementById('munSelect');

    deptSelect.addEventListener('change', function() {
        const deptId = this.value;

        if (deptId !== '') {
            fetch(`../routes/selectUser/municipio.php?deptId=` + deptId)
                .then(response => response.json())
                .then(data => {
                    munSelect.innerHTML = '';

                    for (const munId in data) {
                        if (data.hasOwnProperty(munId)) {
                            const munName = data[munId].municipio;
                            const option = document.createElement('option');
                            option.value = munId;
                            option.text = munName;
                            munSelect.appendChild(option);
                        }
                    }
                    munSelect.dispatchEvent(new Event('change'));
                })
                .catch(error => console.error('Error fetching Area Knowledge:', error));
        } else {
            munSelect.innerHTML = '';
        }
    });
}

loadMun();

        //Carga de forma dinamica los municipios dependiendo del departamento en el campo de munSelect

    function loadTypeId() {
        fetch('../routes/selectUser/typeId.php')
            .then(response => response.json())
            .then(data => {
                const typeIdSelect = document.getElementById('typeIdSelect');                
                typeIdSelect.innerHTML = "";

                for (const typeIdName in data){
                    const typeId = data[typeIdName];
                    const option = document.createElement('option');
                    option.value = typeId;
                    option.text = typeIdName;
                    typeIdSelect.appendChild(option);
                }
                typeIdSelect.dispatchEvent(new Event('change'))
            })
            .catch(error => console.error('Error fetching Ident type', error))

    }

    loadTypeId();

        //Carga de forma dinamica los tipos de documento en el campo de typeIdSelect

</script>