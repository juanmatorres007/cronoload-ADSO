<div class="usersContent">
        <h2>Formato de Consulta de Usuarios</h2>

        <?php if($_SESSION['getSessionRol'] === "Administrador"){?>

        <form action="../routes/Consultas/consultaAllUser.php" method="POST">
            <label for="rol">Rol que quiere consultar:</label>
                <select name="rol" id="rolSelect">
                    <option value="1">Aprendices</option>
                    <option value="4">Instructores</option>
                    <option value="7">Coordinador</option>
                </select>
        </form><br>
        <?php }elseif($_SESSION['getSessionRol'] === "Coordinador"){?>

            <form action="../routes/Consultas/consultaAllUser.php" method="POST">
            <label for="rol">Rol que quiere consultar:</label>
                <select name="rol" id="rolSelect">
                    <option value="1">Aprendices</option>
                    <option value="4">Instructores</option>
                </select>
        </form><br>
        <?php } ?>
        <div class="table-const">
            <table class="table table-dark table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Numero de identidad</th>
                        <th>INFO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>-------</td>
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

    document.addEventListener("DOMContentLoaded", function() {
        loadUserData();
    });

    // Función para cargar los datos de usuarios al seleccionar un rol
    function loadUserData() {
        var rol = document.getElementById("rolSelect").value;
        loadData(rol);
    }

    // Listener de eventos para el cambio de rol
    document.getElementById("rolSelect").addEventListener("change", function() {
    loadUserData();
    });


    // Función para realizar la solicitud AJAX y actualizar la tabla con los datos devueltos
    function loadData(rol) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../routes/Consultas/consultaAllUser.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                var tableBody = document.querySelector(".table-const tbody");
                tableBody.innerHTML = ""; // Limpiar la tabla antes de agregar nuevos datos
                data.forEach(function(user) {
                    var row = document.createElement("tr");
                    row.innerHTML = "<td>" + user.id_auto_user + "</td><td>" + user.name_user + "</td><td>" + user.lastname_user + "</td><td>" + user.number_id_user + "</td><td>" + user.info;
                    tableBody.appendChild(row);
                });
            }
        };
        xhr.send("rol=" + rol);
    }
</script>