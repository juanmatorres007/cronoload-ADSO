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
                    <!-- Actualizacion dinamica ;D -->
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>



<!-- ---------------------MODAL PARA EL USUARIO--------------------- -->


<div class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="updateUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateUserModalLabel">Actualizar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="updateUserForm">
                    <input type="hidden" id="userId" name="userId">

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
                        <input type="text" class="form-control" id="userTypeId" name="userTypeId">
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
                        <label for="userGenero" class="form-label">Genero</label>
                        <input type="text" class="form-control" id="userGenero" name="userGenero">
                    </div>
                    <div class="mb-3">
                        <label for="userEstado" class="form-label">Estado</label>
                        <input type="text" class="form-control" id="userEstado" name="userEstado">
                    </div>
                    <div class="mb-3">
                        <label for="userTypeContract" class="form-label">Tipo de contrato</label>
                        <input type="text" class="form-control" id="userTypeContract" name="userTypeContract">
                    </div>
                    <div class="mb-3">
                        <label for="userknowArea" class="form-label">Area de conocimiento</label>
                        <input type="text" class="form-control" id="userknowArea" name="userknowArea">
                    </div>
                    <div class="mb-3">
                        <label for="userFormationLvl" class="form-label">Nivel formativo</label>
                        <input type="text" class="form-control" id="userFormationLvl" name="userFormationLvl">
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- ---------------------MODAL PARA EL USUARIO--------------------- -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<Script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></Script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

<script>    
$(document).ready(function() {
    var role = $('#rolSelect').val();

    function getColumnsDefsByRole(role){

        var columnDefs = [];

        if (role == "1") {
            columnDefs = [
                {"data": "id_auto_user", "title": "ID"},
                { "data": "name_user", "title": "Nombre" },
                { "data": "lastname_user", "title": "Apellido" },
                {
                    "data": "type_id_user",
                    "title": "Tipo de documento",
                    "render": function(data, type, row) {
                        return data == "1" ? "T.I" : data == "2" ? "C.C" : data == "3" ? "C.E" : data;
                    }
                },
                { "data": "number_id_user", "title": "Numero de identidad" },
                { "data": "birth_user", "title": "Fecha de nacimiento" },
                { 
                    "data": "id_gen_user",
                    "title": "Genero",
                    "render": function(data, type, row){
                        return data == "1" ? "MASCULINO" : data == "2" ? "FEMENINO" : data;
                    }
                },
                { 
                    "data": "state_user",
                    "title": "Estado",
                    "render": function(data, type, row){
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
        } else if(role == "4") {
            columnDefs = [
                {"data": "id_auto_user", "title": "ID"},
                { "data": "name_user", "title": "Nombre" },
                { "data": "lastname_user", "title": "Apellido" },
                {
                    "data": "type_id_user",
                    "title": "Tipo de documento",
                    "render": function(data, type, row) {
                        return data == "1" ? "T.I" : data == "2" ? "C.C" : data == "3" ? "C.E" : data;
                    }
                },
                { "data": "number_id_user", "title": "Numero de identidad" },
                { "data": "birth_user", "title": "Fecha de nacimiento" },
                { 
                    "data": "id_gen_user",
                    "title": "Genero",
                    "render": function(data, type, row){
                        return data == "1" ? "MASCULINO" : data == "2" ? "FEMENINO" : data;
                    }
                },
                { 
                    "data": "state_user",
                    "title": "Estado",
                    "render": function(data, type, row){
                        return data == "1" ? "ACTIVO" : data == "2" ? "INACTIVO" : data;
                    }
                },
                { "data": "type_contract_name", "title": "Tipo de Contrato" },
                { "data": "know_area_name", "title": "Area de conocimiento"},
                { "data": "formation_lvl_name", "title": "Nivel formativo"},
                {
                    "data": null,
                    "title": "Actualizar",
                    "render": function(data, type, row) {
                        return '<button type="button" class="btn btn-sm btn-secondary btn-edit" data-userid="' + row.id_auto_user + '">Actualizar</button>';
                    }
                }
            ];  
        } else if(role == "7"){
            columnDefs = [
                {"data": "id_auto_user", "title": "ID"},
                { "data": "name_user", "title": "Nombre" },
                { "data": "lastname_user", "title": "Apellido" },
                {
                    "data": "type_id_user",
                    "title": "Tipo de documento",
                    "render": function(data, type, row) {
                        return data == "1" ? "T.I" : data == "2" ? "C.C" : data == "3" ? "C.E" : data;
                    }
                },
                { "data": "number_id_user", "title": "Numero de identidad" },
                { "data": "birth_user", "title": "Fecha de nacimiento" },
                { 
                    "data": "id_gen_user",
                    "title": "Genero",
                    "render": function(data, type, row){
                        return data == "1" ? "MASCULINO" : data == "2" ? "FEMENINO" : data;
                    }
                },
                { 
                    "data": "state_user",
                    "title": "Estado",
                    "render": function(data, type, row){
                        return data == "1" ? "ACTIVO" : data == "2" ? "INACTIVO" : data;
                    }
                },
                { "data": "type_contract_name", "title": "Tipo de Contrato" },
                { "data": "know_area_name", "title": "Area de conocimiento"},
                { "data": "formation_lvl_name", "title": "Nivel formativo"},
                {
                    "data": null,
                    "title": "Actualizar",
                    "render": function(data, type, row) {
                        return '<button type="button" class="btn btn-sm btn-dark btn-edit" data-userid="' + row.id_auto_user + '">Actualizar</button>';
                    }
                }
            ];
        }

        return columnDefs;
    }

    function updateTableHeader(columns){
        var tableHeader = $('#tableHeader');
        tableHeader.empty();
        columns.forEach(function(column){
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

                $(document).on('click', '.btn-edit', function(){
                    var userId = $(this).data('userid');
                    console.log('Botón de actualizar clickeado para el usuario con ID: ' + userId);

                    $.ajax({
                        url: '../routes/Consultas/consultaAllUser.php',
                        method: 'GET',
                        data: { userId: userId },
                        dataType: 'json',
                        success: function(data) {
                            $('#updateUserForm')[0].reset();

                            $('#userId').val(data.id_auto_user);
                            $('#userName').val(data.name_user);
                            $('#userLastName').val(data.lastname_user);
                            $('#userTypeId').val(data.type_id_user);
                            $('#userNumberId').val(data.number_id_user);
                            $('#userBirth').val(data.birth_user);
                            $('#userGenero').val(data.id_gen_user);
                            $('#userEstado').val(data.state_user);
                            $('#userTypeContract').val(data.id_type_contract_user );
                            $('#userknowArea').val(data.id_know_user );
                            $('#userFormationLvl').val(data.id_formation_lvl_user );

                            if (role == "1") {
                                $('#userTypeContract, #userKnowArea, #userFormationLvl').parent().hide();
                            } else if (role == "4" || role == "7") {  
                                $('#userTypeContract, #userKnowArea, #userFormationLvl').parent().show();                   
                            }

                            $('#updateUserModal').modal('show');
                        },
                        error: function(xhr, status, error){
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

    // Maneja el envío del formulario de actualización de usuario
    $('#updateUserForm').on('submit', function(event) {
        event.preventDefault();
        var formData = $(this).serialize();

        // Lógica para enviar los datos actualizados del usuario al servidor
        $.ajax({
            url: '../routes/Consultas/updateUser.php',
            method: 'POST',
            data: formData,
            success: function(response) {
                // Actualiza la tabla de usuarios después de la actualización
                table.ajax.reload(null, false);
                // Cierra el modal de actualización de usuario
                $('#updateUserModal').modal('hide');
            },
            error: function(xhr, status, error) {
                console.error('Error al actualizar usuario', error);
            }
        });
    });
});


</script>
