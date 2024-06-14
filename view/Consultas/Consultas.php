<div class="usersContent">
    <h2>Formato de Consulta Generales de Datos</h2><br>

    <?php if ($_SESSION['getSessionRol'] === "Administrador") { ?>

            <label for="data">Datos que quiere consultar:</label>
            <select name="consulta" id="consultaSelect">
                <option value="">Seleccione un dato</option>
                <option value="areaConocimiento">area de Conocimiento</option>
                <option value="programa">Programa</option>
                <option value="ficha">Ficha</option>
                <option value="proyecto">Proyecto</option>
                <option value="contract">Tipos de Contratos</option>
                <option value="genero">Genero</option>
                <option value="phase">Fases</option>
                <option value="formation_lvl">Niveles formativos</option>
                <option value="activity">Actividades</option>
                <option value="competition">Competencias</option>
                <option value="result">Resultados</option>
            </select><br>
    <?php } ?>
    <div class="table-const">
        <table class="table table-dark table-striped table-bordered table-hover" id="generalTable">
            <thead>
                <tr>
                </tr>
            </thead>
            <tbody>
                <tr>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<div id="updateModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Actualizar Datos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateForm">
                    <!-- Campos del formulario se generarán dinámicamente -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="saveChangesBtn">Guardar Cambios</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

<script>
    $(document).ready(function() {
        // Inicializar DataTable sin datos
        var generalTable = $('#generalTable').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            info: true
        });

        // Listener para el cambio de consulta
        $('#consultaSelect').on('change', function() {
            var selectedValue = this.value;
            if (selectedValue) {
                // Hacer la solicitud AJAX
                $.ajax({
                    url: "../routes/Consultas/generalConsulta.php?action=consulta",
                    type: "GET",
                    data: {consulta: selectedValue},
                    dataType: "json",
                    success: function(data) {
                        if (data.length > 0) {
                            updateTable(data);
                        } else {
                            console.warn("No se encontraron datos para la consulta seleccionada");
                            generalTable.clear().draw();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error al obtener los datos:", status, error);
                    }
                });
            } else {
                generalTable.clear().draw(); // Limpiar la tabla si no se selecciona nada
            }
        });

        // Función para actualizar la tabla con los nuevos datos
        function updateTable(data) {
            // Definir las columnas basadas en los datos recibidos
            var columns = Object.keys(data[0]).map(function(key) {
                return {
                    data: key,
                    title: key
                };
            });

            // Añadir la columna de acciones
            columns.push({
                data: null,
                title: 'Actualizar',
                render: function(data, type, row) {
                    return '<button class="btn btn-dark update-btn" data-row=\'' + JSON.stringify(row) + '\'>Actualizar</button>';
                }
            });

            // Destruir la instancia existente de DataTable
            generalTable.clear().destroy();
            $('#generalTable thead').empty();
            $('#generalTable tbody').empty();

            // Añadir nueva fila de encabezado
            var headerRow = $('<th></th>');
            $('#generalTable thead').append('<tr></tr>');
            columns.forEach(function(col) {
                $('#generalTable thead tr').append('<th>' + col.title + '</th>');
            });

            // Inicializar DataTable con nuevas columnas y datos
            generalTable = $('#generalTable').DataTable({
                data: data,
                columns: columns,
                paging: true,
                searching: true,
                ordering: true,
                info: true
            });

            $('#generalTable tbody').on('click', '.update-btn', function() {
                var rowData = $(this).data('row');
                openUpdateModal(rowData);
            });
        }

        function openUpdateModal(rowData) {
            $('#updateForm').empty();
            Object.keys(rowData).forEach(function(key) {
                $('#updateForm').append(`
                <div class="form-group">
                    <label for="${key}">${key}</label>
                    <input type="text" class="form-control" id="${key}" name="${key}" value="${rowData[key]}">
                </div>
            `);
            });
            $('#updateModal').modal('show');
        }

        $('#saveChangesBtn').on('click', function() {
            var formData = $('#updateForm').serializeArray();
            var data = {};
            formData.forEach(function(item) {
                data[item.name] = item.value;
            });

            var table = $('#consultaSelect').val();
            var idField = 'id'; // Ajusta esto según sea necesario

            $.ajax({
                url: "../routes/Consultas/generalConsulta.php?action=update",
                type: "POST",
                contentType: "application/json",
                data: JSON.stringify({
                    table: table,
                    idField: idField,
                    ...data
                }),

                success: function(response) {
                    if (response.success) {
                        console.log("Datos actualizados correctamente");
                        $('#updateModal').modal('hide');
                        $('#consultaSelect').trigger('change');
                    } else {
                        console.error("Error al actualizar los datos:", response.error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error en la solicitud de actualización:", status, error);
                }
            });
        });

        $(document).on('click', '#closeModalBtn', function(){
            $('#updateModal').modal('hide')
        });

        $('#updateModal').on('hidden.bs.modal', function(){
            $('#updateForm').trigger('reset');
        });
    });
</script>