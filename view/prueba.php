<div class="usersContent">
    <h2>Formato de Consulta de Usuarios</h2>

    <form id="consultaForm" action="../routes/Consultas/consultaAllUser.php" method="GET">
        <label for="rol">Rol que quiere consultar:</label>
        <select name="rol" id="rolSelect">
            <?php if($_SESSION['getSessionRol'] === "Administrador"): ?>
                <option value="1">Aprendices</option>
                <option value="4">Instructores</option>
                <option value="7">Coordinador</option>
            <?php elseif($_SESSION['getSessionRol'] === "Coordinador"): ?>
                <option value="1">Aprendices</option>
                <option value="4">Instructores</option>
            <?php endif; ?>
        </select>
    </form><br>

    <div class="table-const">
        <table class="table table-dark table-striped table-bordered table-hover" id="myTable">
            <thead>
                <tr id="tableHeader">
                    <!-- Columnas de la tabla se insertarán dinámicamente -->
                </tr>
            </thead>
            <tbody>
                <!-- Filas de la tabla se insertarán dinámicamente -->
            </tbody>
        </table>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

<!----------------------------- MODAL PARA ACTUALIZAR LOS USUARIOS ---------l-------------------->
<div class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="updateUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateUserModalLabel">Actualizar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- <p id="selectedRol">Rol seleccionado: <span id="selectedRolValue"></span></p> -->
            <div class="modal-body">
                <form id="updateUserForm" action="../routes/Registros/user.php?action=updates">
                    <input type="hidden" id="userId" name="userId">
                    <input type="hidden" id="rolId" name="rolId" value="">
                    <div class="mb-3">
                        <label for="userName" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="userName" name="userName">
                    </div>
                    <div class="mb-3">
                        <label for="userLastName" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="userLastName" name="userLastName">
                    </div>
                    <div class="mb-3">
                        <label for="userTypeId" class="form-label">Tipo de documento</label>
                        <select class="form-select" id="userTypeId" name="userTypeId">
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="userNumberId" class="form-label">Número de documento</label>
                        <input type="text" class="form-control" id="userNumberId" name="userNumberId">
                    </div>
                    <div class="mb-3">
                        <label for="userBirth" class="form-label">Fecha de nacimiento</label>
                        <input type="text" class="form-control" id="userBirth" name="userBirth">
                    </div>
                    <div class="mb-3">
                        <label for="userGenero" class="form-label">Género</label>
                        <select class="form-select" id="userGenero" name="userGenero">
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="userEstado" class="form-label">Estado</label>
                        <select class="form-select" id="userEstado" name="userEstado">
                        </select>
                    </div>
                    <div class="mb-3" id="userTypeContractDiv">
                        <label for="userTypeContract" class="form-label">Tipo de contrato</label>
                        <select class="form-select" id="userTypeContract" name="userTypeContract">
                        </select>
                    </div>
                    <div class="mb-3" id="userknowAreaDiv">
                        <label for="userknowArea" class="form-label">Área de conocimiento</label>
                        <select class="form-select" id="userknowArea" name="userknowArea">
                        </select>
                    </div>
                    <div class="mb-3" id="userFormationLvlDiv">
                        <label for="userFormationLvl" class="form-label">Nivel formativo</label>
                        <select class="form-select" id="userFormationLvl" name="userFormationLvl">
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!----------------------------- MODAL PARA ACTUALIZAR LOS USUARIOS ---------l-------------------->


<script>

$(document).ready(function() {
    // Función para actualizar el valor seleccionado del rol

    var role = $('#rolSelect').val();

    function getColumnsDefsByRole(role) {
        var columnDefs = [];

        if (role == "1") {
            columnDefs = [
                { "data": "id_auto_user", "title": "ID" },
                { "data": "name_user", "title": "Nombre" },
                { "data": "lastname_user", "title": "Apellido" },
                {
                    "data": "type_id_user",
                    "title": "Tipo de documento",
                    "render": function(data, type, row) {
                        return data == "1" ? "C.C" : data == "2" ? "T.I" : data == "3" ? "C.E" : data;
                    }
                },
                { "data": "number_id_user", "title": "Número de identidad" },
                { "data": "birth_user", "title": "Fecha de nacimiento" },
                {
                    "data": "id_gen_user",
                    "title": "Género",
                    "render": function(data, type, row) {
                        return data == "1" ? "MASCULINO" : data == "2" ? "FEMENINO" : data;
                    }
                },
                {
                    "data": "state_user",
                    "title": "Estado",
                    "render": function(data, type, row) {
                        return data == "1" ? "ACTIVO" : data == "2" ? "INACTIVO" : data;
                    }
                },
                {
                    "data": null,
                    "title": "Actualizar",
                    "render": function(data, type, row) {
                        return '<button type="button" class="btn btn-sm btn-secondary btn-edit" data-userid="' + row.id_auto_user + '">Actualizar</button>';
                    }
                }
            ];
        } else if (role == "4" || role == "7") {
            columnDefs = [
                { "data": "id_auto_user", "title": "ID" },
                { "data": "name_user", "title": "Nombre" },
                { "data": "lastname_user", "title": "Apellido" },
                {
                    "data": "type_id_user",
                    "title": "Tipo de documento",
                    "render": function(data, type, row) {
                        return data == "1" ? "C.C" : data == "2" ? "T.I" : data == "3" ? "C.E" : data;
                    }
                },
                { "data": "number_id_user", "title": "Número de identidad" },
                { "data": "birth_user", "title": "Fecha de nacimiento" },
                {
                    "data": "id_gen_user",
                    "title": "Género",
                    "render": function(data, type, row) {
                        return data == "1" ? "MASCULINO" : data == "2" ? "FEMENINO" : data;
                    }
                },
                {
                    "data": "state_user",
                    "title": "Estado",
                    "render": function(data, type, row) {
                        return data == "1" ? "ACTIVO" : data == "2" ? "INACTIVO" : data;
                    }
                },
                { "data": "type_contract_name", "title": "Tipo de Contrato" },
                { "data": "know_area_name", "title": "Área de conocimiento" },
                { "data": "formation_lvl_name", "title": "Nivel formativo" },
                {
                    "data": null,
                    "title": "Actualizar",
                    "render": function(data, type, row) {
                        return '<button type="button" class="btn btn-sm btn-secondary btn-edit" data-userid="' + row.id_auto_user + '">Actualizar</button>';
                    }
                }
            ];
        }

        return columnDefs;
    }

    function updateTableHeader(columns) {
        var tableHeader = $('#tableHeader');
        tableHeader.empty();
        columns.forEach(function(column) {
            tableHeader.append('<th>' + column.title + '</th>');
        });
    }

    function initializeDataTable(role) {
        var columns = getColumnsDefsByRole(role);
        updateTableHeader(columns);

        var table = $('#myTable').DataTable({
            "ajax": {
                "url": "../routes/Consultas/consultaAllUser.php",
                "data": function(d) {
                    d.rol = $('#rolSelect').val();
                },
                "dataSrc": ""
            },
            "columns": columns,
            "destroy": true,
            "initComplete": function() {
                $(document).on('click', '.btn-edit', function() {
                    var userId = $(this).data('userid');
                    console.log('Botón de actualizar clickeado para el usuario con ID: ' + userId);

                    $.ajax({
                        url: '../routes/Consultas/consultaAllUser.php',
                        method: 'GET',
                        data: { userId: userId },
                        dataType: 'json',
                        success: function(data) {
                            if (Array.isArray(data) && data.length > 0) {
                                var userData = data[0];

                                $('#updateUserForm')[0].reset();

                                $('#userId').val(userData.id_auto_user);
                                $('#userName').val(userData.name_user);
                                $('#userLastName').val(userData.lastname_user);
                                $('#userTypeId').val(userData.type_id_user);
                                $('#userNumberId').val(userData.number_id_user);
                                $('#userBirth').val(userData.birth_user);
                                $('#userGenero').val(userData.id_gen_user);
                                $('#userEstado').val(userData.state_user);
                                $('#rolId').val(userData.rol_id);
                            
                                if (userData.rol_id == "1") {
                                    $('#userTypeContractDiv, #userknowAreaDiv, #userFormationLvlDiv').hide();
                                } else {
                                    $('#userTypeContractDiv, #userknowAreaDiv, #userFormationLvlDiv').show();
                                    $('#userTypeContract').val(userData.type_contract_name);
                                    $('#userknowArea').val(userData.know_area_name);
                                    $('#userFormationLvl').val(userData.formation_lvl_name);
                                }

                                $('#updateUserModal').modal('show');
                            } else {
                                console.error('La respuesta de datos está vacía o no es un array válido');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error al obtener datos del usuario', error);
                        }
                    });
                });
            }
        });

        return table;
    }

    var table = initializeDataTable(role);

    $('#rolSelect').on('change', function() {
        var selectedValue = $(this).val();
        console.log("Rol seleccionado", selectedValue);

        table.clear().destroy();
        table = initializeDataTable(selectedValue);
    });

    function fillSelectOptions(selectId, endpoint, paramName){
    $.ajax({
        url: endpoint,
        method: 'GET',
        dataType: 'json',
        data: { action: 'consulta', consulta: paramName},
        success: function(data){
            console.log('Respuesta del servidor: ', data);

            var selectElement = $('#' + selectId);
            selectElement.empty();

            if(Array.isArray(data)) {

                data.forEach(function(option) {
                    var idKey = Object.keys(option).find(key => key.toLowerCase().includes('id'));
                    var nameKey = Object.keys(option).find(key => key.toLowerCase().includes('name'));

                    if(idKey && nameKey) {
                        selectElement.append('<option value="' + option[idKey] + '">' + option[nameKey] + '</option>');
                    }else {
                        console.error('No se encontraron claves "id" y "name" válidas en el objeto:', option);
                    }
                });
            }else {
                console.error('La respuesta del servidor no es un array válido:', data);
            }
        },
        error: function(xhr, status, error){
            console.error('Error al obtener opciones para ' + selectId, error);
        }
    });
    }

    // Llenar selects al cargar el modal
    $(document).ready(function(){
        $('#updateUserModal').on('shown.bs.modal', function () {
            fillSelectOptions('userTypeId', '../routes/Consultas/generalConsulta.php', 'tipo_documento');
            fillSelectOptions('userGenero', '../routes/Consultas/generalConsulta.php', 'genero');
            fillSelectOptions('userEstado', '../routes/Consultas/generalConsulta.php', 'estado');
            fillSelectOptions('userTypeContract', '../routes/Consultas/generalConsulta.php', 'tipo_contrato');
            fillSelectOptions('userknowArea', '../routes/Consultas/generalConsulta.php', 'area_conocimiento');
            fillSelectOptions('userFormationLvl', '../routes/Consultas/generalConsulta.php', 'nivel_formativo');
        });
    });

    // Maneja el envío del formulario de actualización de usuario
    $('#updateUserForm').on('submit', function(event) {
        event.preventDefault();
        var formData = $(this).serialize();

        console.log('Datos enviados para la actualización:', formData);

        // Lógica para enviar los datos actualizados del usuario al servidor
        $.ajax({
            url: '../routes/Registros/user.php?action=updates',
            method: 'POST',
            data: formData,
            success: function(response) {
                // alert('¡Usuario actualizado correctamente!');
                table.ajax.reload(null, false);
                $('#updateUserModal').modal('hide');
            },
            error: function(xhr, status, error) {
                console.error('Error al actualizar usuario', error);
                alert('Error al actualizar usuario. Por favor, inténtalo de nuevo.');
            }
        });
    });
});
</script>
