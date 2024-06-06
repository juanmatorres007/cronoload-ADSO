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
    // Obtener el cuerpo de la tabla
    var tableBody = document.querySelector('.table-const tbody');

    // Limpiar el contenido actual de la tabla
    tableBody.innerHTML = '';

    // Iterar sobre los datos recibidos y crear filas de tabla para cada objeto
    data.forEach(function(rowData) {
        // Crear una nueva fila de tabla
        var row = tableBody.insertRow();

        // Verificar el valor seleccionado en el menú desplegable
        var selectedValue = document.getElementById('consultaSelect').value;

        // Agregar celdas a la fila dependiendo del valor seleccionado
        switch(selectedValue) {
            case 'areaConocimiento':
                var idCell = row.insertCell(0);
                idCell.textContent = rowData.id_auto_know;

                var nameCell = row.insertCell(1);
                nameCell.textContent = rowData.area_name_know;

                var infoCell = row.insertCell(2);
                infoCell.textContent = rowData.date_register_know;

                var stateCell = row.insertCell(3);
                stateCell.textContent = rowData.state_know;
                break;
            case 'programa':
                var nameCell = row.insertCell(0);
                nameCell.textContent = rowData.area_name_know;

                var infoCell = row.insertCell(1);
                infoCell.textContent = rowData.date_register_know;                
                break;
            case 'ficha':
                // Agregar celdas específicas para la consulta de ficha
                break;
            default:
                // Si no se selecciona ninguna opción válida, no se agrega ninguna celda
                break;
        }
    });
}



</script>