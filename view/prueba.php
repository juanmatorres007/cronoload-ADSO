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
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Tipo de documento</th>
                    <th>Numero de identidad</th>
                    <th>Fecha de nacimiento</th>
                    <th>Genero</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<Script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></Script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

<script>    
$(document).ready(function() {
    // Definir la tabla DataTable
    var table = $('#myTable').DataTable({
        "ajax": {
            "url": "../routes/Consultas/consultaAllUser.php",
            "data": function(d) {
                d.rol = $('#rolSelect').val(); // Pasar el valor seleccionado como parámetro 'rol'
            },
            "dataSrc": ""
        },
        "columns":[
            {"data": "id_auto_user"},
            {"data": "name_user"},
            {"data": "lastname_user"},
            {"data": "type_id_user"},
            {"data": "number_id_user"},
            {"data": "birth_user"},
            {"data": "id_gen_user"},
            {"data": "state_user"}
        ]
    });

    // Listener de eventos para el cambio de rol
    $('#rolSelect').on('change', function() {
        var selectedValue = this.value;
        console.log("Rol seleccionado", selectedValue);
        table.ajax.reload(); // Recargar la tabla con el nuevo valor de rol
    });
});


</script>
