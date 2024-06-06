<div class="usersContent">
        <h2>Formato de Consulta Generales de Datos</h2><br>

        <?php if($_SESSION['getSessionRol'] === "Administrador"){?>

        <form action="../routes/Consultas/consultaAllUser.php" method="POST">
            <label for="data">Datos que quiere consultar:</label>
                <select name="consulta" id="consultaSelect">
                    <option value="">Seleccione un dato</option>
                    <option value="areaConocimiento">area de Conocimiento</option>
                    <option value="programa">Programa</option>
                    <option value="ficha">Ficha</option>
                </select>
        </form><br>
        <?php }?>
        <div class="table-const">
            <table class="table table-dark table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>FECHA DE REGISTRO</th>
                        <th>ESTADO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>-------</td>
                        <td>-------</td>
                        <td>-------</td>
                        <td>-------</td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>

<script>

document.getElementById('consultaSelect').addEventListener('change', function() {
    var selectedValue = this.value;
    console.log("Var:", selectedValue)

    // Realizar una solicitud AJAX al servidor
    fetch('../routes/Consultas/generalConsulta.php?consulta=' + selectedValue, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        },
    })
    .then(response => response.json())
    .then(data => {
        // Aquí puedes manejar la respuesta del servidor y actualizar la tabla HTML
        console.log('Respuesta del servidor:', data);
        // Por ejemplo, podrías actualizar la tabla con los datos recibidos
        updateTable(data);
    })
    .catch(error => console.error('Error fetching data:', error));
});

function updateTable(data) {
    // Obtener el cuerpo de la tabla y los encabezados de columna
    var tableBody = document.querySelector('.table-const tbody');
    var tableHeader = document.querySelector('.table-const thead tr');

    // Limpiar el contenido actual de la tabla y los encabezados de columna
    tableBody.innerHTML = '';
    tableHeader.innerHTML = '';

    // Obtener el valor seleccionado en el menú desplegable
    var selectedValue = document.getElementById('consultaSelect').value;

    // Definir los nombres de las columnas y las celdas correspondientes
    var columnNames = [];
    var cellFunctions = [];

    // Definir las columnas y celdas dependiendo del valor seleccionado
    switch(selectedValue) {
        case 'areaConocimiento':
            columnNames = ['ID', 'Nombre', 'Fecha de Registro', 'Estado'];
            cellFunctions = [
                function(rowData) { return rowData.id_auto_know; },
                function(rowData) { return rowData.area_name_know; },
                function(rowData) { return rowData.date_register_know; },
                function(rowData) { return rowData.state_know; }
            ];
            break;
        case 'programa':
            // Definir nombres de columna y celdas para la consulta de programa
            columnNames = ['ID', 'Nombre', 'Fecha de Registro', 'Codigo', 'Version', 'Tipo de programa', 'Estado'];
            cellFunctions = [
                function(rowData) { return rowData.id_auto_prog; },
                function(rowData) { return rowData.name_prog; },
                function(rowData) { return rowData.date_register_prog; },
                function(rowData) { return rowData.code_prog; },
                function(rowData) { return rowData.version_prog; },
                function(rowData) { return rowData.type_prog; },
                function(rowData) { return rowData.state_prog; }
            ];
            break;
        case 'ficha':
            // Definir nombres de columna y celdas para la consulta de ficha
            columnNames = ['ID', 'Numero', 'Estado', 'Fecha de registro', 'Fecha de finalización'];
            cellFunctions = [
                function(rowData) { return rowData.id_auto_fil; },
                function(rowData) { return rowData.number_file; },
                function(rowData) { return rowData.state_file; },
                function(rowData) { return rowData.start_date_file; },
                function(rowData) { return rowData.end_date_file; }
            ];
            break;
        default:
            // Si no se selecciona ninguna opción válida, no se agrega ninguna celda
            break;
    }

    // Agregar los nombres de columna al encabezado de la tabla
    columnNames.forEach(function(columnName) {
        var th = document.createElement('th');
        th.textContent = columnName;
        tableHeader.appendChild(th);
    });

    // Iterar sobre los datos recibidos y crear filas de tabla para cada objeto
    data.forEach(function(rowData) {
        // Crear una nueva fila de tabla
        var row = tableBody.insertRow();

        // Agregar celdas a la fila según la función correspondiente
        cellFunctions.forEach(function(cellFunction) {
            var cell = row.insertCell();
            cell.textContent = cellFunction(rowData);
        });
    });
}



</script>