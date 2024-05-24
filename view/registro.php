<style>
    input[type=text],
    input[type=number],
    input[type=date],
    input[type=email],
    select {
        padding: 8px;
        width: 240px;
        margin-bottom: 10px;
    }

    select {
        width: 240px;
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

    /* .form-row {
    }

    .form-row label {
        margin-right: 10px;
    } */

    @media only screen and (max-width: 600px) {
        .form-columns-2 {
            flex-direction: column;
        }
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

        <label><strong>Número de celular: </strong></label>
        <input type="number" name="phone_user" placeholder="Ingrese Numero de Celular"><br><br>

        <label><strong>Correo Electronico: </strong></label>
        <input type="email" name="email_user" placeholder="Ingrese su Correo Electronico"><br><br>

        <label><strong>Número de celular: </strong></label>
        <input type="number" name="phone_user" placeholder="Ingrese Numero de Celular"><br><br>

            <label><strong>Departamento de Recidencia: </strong></label>
            <select name="id_dept_user" id="DeptSelect">
            </select>

        <div class="form-row">
            <label><strong>Municipio de Recidencia: </strong></label>
            <select name="id_mun_user" id="munSelect">
            </select>
        </div>

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
                <input type="date" id="fechaInicio" name="FI">
            </div>

            <div class="form-row">
                <label><strong>Fecha de finalización de contrato: </strong></label>
                <input type="date" id="fechaFin" name="FF">
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

    function loadFile() {
        fetch("../routes/consultaFicha.php")
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

    function loadContractType() {
        fetch("../routes/contractType.php")
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

    function loadKnow() {
        fetch('../routes/areaReg.php')
            .then(response => response.json())
            .then(data => {
                const areaSelect = document.getElementById('knowSelect');
                areaSelect.innerHTML = '';

                for (const areaName in data) {
                    if (data.hasOwnProperty(areaName)) {
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

    function loadLvlForm() {
        fetch('../routes/lvlForm.php')
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

    function loadDeptAndMun(){
        fetch("../routes/address.php")
        .then(response => response.json())
        .then(data => {
            const deptSelect = document.getElementById('DeptSelect')
            const munSelect = document.getElementById('munSelect')

            deptSelect.innerHTML = "";
            munSelect.innerHTML = "";

            for(const deptName in data){
                if(data.hasOwnProperty(deptName)){
                    const deptInfo = data[deptName];
                    const deptSelectId = deptInfo.id;
                    const munList = deptInfo.municipios

                    const deptOption = document.createElement('option');
                    deptOption.value = deptSelectId;
                    deptOption.text = deptName;
                    deptSelect.appendChild(deptOption);

                    for(const munName in munList){
                        if(munList.hasOwnProperty(munName)){
                            const munSelectId = munList[munName];
                            const munOption = document.createElement('option');
                            munOption.value = munSelectId;
                            munOption.text = munName;
                            munSelect.appendChild(munOption);
                        }
                    }
                }
            }
            deptSelect.dispatchEvent(new Event('change'))
            munSelect.dispatchEvent(new Event('change'));
        })
        .catch(error => console.error('Error fetching departament:', error));
    }

    loadDeptAndMun();

    // function loadMun(){
    //     fecth("../routes/address.php")
    //     .then(response => response.json())
    //     then(data => {
    //         const munSelect = documento.getElementById('munSelect')
    //         munSelect.innerHTML = "";

    //         for(const munName in data){
    //             if(data.hasOwnProperty(munName)){
    //                 const munSelectId = data[munName];
    //                 const option = document.createElement('option')
    //                 option.value = munSelectId;
    //                 option.text = munName;
    //                 munSelect.appendChild(option)
    //             }
    //         }
    //         munSelect.dispatchEvent(new Event('change'))
    //     })
    //     .catch(erro => console.error('Error fecthing municipio:', error))
    // }

    // loadMun();
</script>