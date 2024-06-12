<div class="usersContent">
    <h2>Formato de Consulta Generales de Datos</h2><br>

    <?php if ($_SESSION['getSessionRol'] === "Administrador") { ?>

        <form action="../routes/Consultas/consultaAllUser.php" method="POST">
            <label for="data">Datos que quiere consultar:</label>
            <select name="consulta" id="consultaSelect">
                <option value="">Seleccione un dato</option>
                <option value="areaConocimiento">area de Conocimiento</option>
                <option value="programa">Programa</option>
                <option value="ficha">Ficha</option>
                <option value="proyecto">Proyecto</option>
                <option value="contract">Tipos de Contratos</option>
                <option value="genero">Genero</option|>
                <option value="phase">Fases</option>
                <option value="formation_lvl">Niveles formativos</option>
                <option value="activity">Actividades</option>
                <option value="competition">Competencias</option>
                <option value="result">Resultados</option>
            </select>
        </form><br>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<Script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></Script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

<script>
$(document).ready(function() {
    // Definir la tabla DataTable
    var generalTable = $('#generalTable').DataTable({
        "ajax": {
            "url": "../routes/Consultas/generalConsulta.php?consulta=" + $('#consultaSelect').val(), // Pasar el valor seleccionado como parámetro 'consulta' en la URL
            "dataSrc": ""
        },
        "columns": [] // Las columnas se definirán dinámicamente después de recibir la respuesta del servidor
        
    });
    

    // Listener de eventos para el cambio de consulta
    $('#consultaSelect').on('change', function() {
        var selectedValue = this.value;
        console.log("Consulta seleccionada", selectedValue);
        // Actualizar la URL con el nuevo valor de consulta y recargar la tabla
        generalTable.ajax.url("../routes/Consultas/generalConsulta.php?consulta=" + selectedValue).load();
    });

    // Función para actualizar la tabla con los nuevos datos
    function updateTable(data) {
        // Limpiar las columnas de la tabla
        generalTable.columns().remove();

        // Definir las columnas basadas en los datos recibidos
        var columns = Object.keys(data[0]).map(function(key) {
            return { "data": key, "title": key }; // Utiliza las claves de los datos como títulos de columna
        });

        // Añadir las columnas al DataTable
        generalTable.columns().add(columns);

        // Actualizar los datos de la tabla
        generalTable.clear().rows.add(data).draw();
    }
    
});

</script>