<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cronograma</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css" />
    <style>
        #calendar {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5 ficha-item">
        <br><br><br> <!-- toca borrar y arreglar con CSS-->
        <h2>Fichas disponibles</h2>
        <div class="row">
            <?php
            include_once "../controller/calendarController.php";
            $calendarController = new CalendarController();
            $fichas = $calendarController->getFichaCalendar();

            if (!empty($fichas)):
                foreach ($fichas as $ficha):
            ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($ficha['number_file']); ?></h5>
                            <p class="card-text">Ficha ID: <?php echo htmlspecialchars($ficha['id_auto_fil']); ?></p>
                            <a href="#" class="btn btn-primary ver-cronograma" data-ficha-id="<?php echo htmlspecialchars($ficha['id_auto_fil']); ?>" data-ficha-number="<?php echo htmlspecialchars($ficha['number_file']); ?>">Ver Cronograma</a>
                        </div>
                    </div>
                </div>
            <?php
                endforeach;
            else:
            ?>
                <p>No hay fichas disponibles.</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="container">
        <div id="calendar"></div>
    </div>

    <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="titulo">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="eventForm" action="../routes/Registros/registerCalendar.php" method="POST">
                    <div class="modal-body">
                        <label for="start">Ficha Tecnica: </label>
                        <input type="text" name="calendarfile" id="fileId" disabled><br><br>
                        <label for="start" class="form-label">FECHA: </label>
                        <input type="date" class="form-control" id="start" name="calendarDate"><br>
                        <label for="start">Competencia: </label>
                        <select name="calendarCompetition" id="comptSelect"></select><br><br>
                        <label for="start">Instructor: </label>
                        <select name="calendarInstructor" id="instructorSelect"></select><br><br>
                        <label for="">Resultado de Aprendizaje: </label>
                        <select name="calendarResult" id="resultadoSelect"></select>
                        <input type="hidden" id="areaId" name="areaId">
                        <input type="hidden" id="calendarId" name="calendarId">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Guardar Evento</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log("Document ready!");

            function cargarCalendario(fichaId, numeroFicha) {
                console.log("Cargando calendario para ficha ID: " + fichaId);
                $('.ficha-item').hide();
                $('#calendar').show();
                $('#fileId').val(numeroFicha);

                fetch('../routes/Consultas/getCalendar.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        action: 'getCalendarByFicha',
                        fichaId: fichaId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Respuesta del servidor', data);
                    if (Array.isArray(data) && data.length > 0) {
                        const firstEvent = data[0];
                        console.log('Primer evento:', firstEvent); // Verifica que firstEvent contiene id_auto_cal
                        const calendarId = 5;
                        console.log('ID del calendario:', calendarId);
                        $('#calendarId').val(calendarId);
                        cargarEventos(calendarId);
                    } else {
                        console.error('Error: La respuesta recibida no contiene un ID de calendario válido.');
                    }
                })
                .catch(error => console.error('Error al cargar el calendario:', error));
            }

            document.querySelectorAll('.ver-cronograma').forEach(item => {
                item.addEventListener('click', event => {
                    event.preventDefault();
                    const fichaId = event.target.getAttribute('data-ficha-id');
                    const numeroFicha = event.target.getAttribute('data-ficha-number');
                    cargarCalendario(fichaId, numeroFicha);
                });
            });

            function cargarOpcionesSelect(action, selectElementId, textField, valueField, additionalFields = {}) {
                var selectElement = document.getElementById(selectElementId);
                selectElement.innerHTML = "";

                if (selectElementId === "comptSelect") {
                    var defaultOption = document.createElement('option');
                    defaultOption.value = '';
                    defaultOption.text = "Seleccione una competencia";
                    selectElement.appendChild(defaultOption);
                }

                fetch("../routes/Consultas/getCalendar.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        action: action
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (Array.isArray(data)) {
                        data.forEach(item => {
                            var option = document.createElement("option");
                            option.text = item[textField];
                            option.value = item[valueField];

                            for (let key in additionalFields) {
                                option.dataset[key] = item[additionalFields[key]];
                            }

                            selectElement.appendChild(option);
                        });
                    } else {
                        console.error('Error: La respuesta no es un array:', data);
                    }
                })
                .catch(error => console.error('Error fetching data:', error));
            }

            cargarOpcionesSelect("getCompetition", "comptSelect", "name_comp", "id_auto_comp", { areaId: "id_area_comp" });
            cargarOpcionesSelect("getResultados", "resultadoSelect", "name_res", "id_auto_res");

            $('#comptSelect').change(function() {
                var compId = $(this).val();
                var areaId = $(this).find(':selected').data('areaId');
                console.log('Competencia seleccionada:', compId);
                console.log('Área seleccionada:', areaId);

                $('#areaId').val(areaId);

                cargarInstructoresPorCompetencia(compId, areaId);
            });

            function cargarInstructoresPorCompetencia(compId, areaId) {
                fetch("../routes/Consultas/getCalendar.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        action: 'getInstructorsByCompetition',
                        compId: compId,
                        areaId: areaId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    var instructorSelect = document.getElementById('instructorSelect');
                    instructorSelect.innerHTML = "";

                    data.forEach(instructor => {
                        var option = document.createElement("option");
                        option.text = instructor.name_user + " " + instructor.lastname_user;
                        option.value = instructor.id_auto_user;
                        instructorSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error al obtener instructores por competencia:', error));
            }

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                dateClick: function(info) {
                    $('#start').val(info.dateStr);
                    $('#myModal').modal('show');
                },
                events: [] // Los eventos se cargarán dinámicamente más adelante
            });

            calendar.render();

            function cargarEventos(calendarId) {
                console.log('Cargando eventos para el calendarId:', calendarId);
                fetch("../routes/Consultas/getCalendar.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        action: 'getEventsByCalendarId',
                        calendarId: calendarId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Eventos recibidos:', data);
                    if (Array.isArray(data)) {
                        var eventos = data.map(event => ({
                            title: event.title,
                            start: event.start,
                        }));

                        calendar.getEventSources().forEach(source => source.remove());
                        calendar.addEventSource(eventos);
                    } else {
                        console.error('Error: La respuesta no es un array:', data);
                    }
                })
                .catch(error => console.error('Error al cargar los eventos:', error));
            }
        });
    </script>
</body>
</html>
