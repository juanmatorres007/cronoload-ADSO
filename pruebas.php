<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Actions</title>
</head>
<body>
    <h2>Test getCalendar Actions</h2>
    <button id="testInstructors">Test getInstructors</button>
    <button id="testAreas">Test getAreas</button>
    <button id="testResultados">Test getResultados</button>
    <button id="testIdCalendar">Test ID calendario</button>

    <h2>Test consultaAllUser</h2>
    <button id="testConsultUsersA">Test Consultar Usuarios (APRENDIZ)</button>
    <button id="testConsultUsersI">Test Consultar Usuarios (INSTRUCTOR)</button>
    <button id="testConsultUsersC">Test Consultar Usuarios (COORDINADOR)</button>

    <h2>Test GetEvents</h2>
    <button id="testGetEvents">Test Get Events</button>

    <pre id="result"></pre>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        function testAction(action, fichaId, areaId = null, calendarId = null) {
            let url;
            let method;
            let headers = {
                'Content-Type': 'application/x-www-form-urlencoded'
            };
            let body = null;

            if (action === 'getInstructorsByArea' || action === 'getAreas' || action === 'getResultados' || action === 'getCalendarByFicha') {
                url = 'routes/Consultas/getCalendar.php';
                method = 'POST';
                body = new URLSearchParams({
                    action: action
                });
                if (action === 'getInstructorsByArea' && areaId) {
                    body.append('areaId', areaId);
                }
                else if (action === 'getCalendarByFicha' && fichaId) {
                    body.append('fichaId', fichaId);
                }
            } else if (action === 'getEvents' && calendarId) {
                url = 'routes/Consultas/getEvents.php';
                method = 'GET';
                headers = {};  // Clear headers for GET request
                url += '?calendarId=' + encodeURIComponent(calendarId);
            } else if (action === 'consultUsersA') {
                url = 'routes/Consultas/consultaAllUser.php?rol=1';
                method = 'GET';
            } else if (action === 'consultUsersI') {
                url = 'routes/Consultas/consultaAllUser.php?rol=4';
                method = 'GET';
            } else if (action === 'consultUsersC') {
                url = 'routes/Consultas/consultaAllUser.php?rol=7';
                method = 'GET';
            }

            fetch(url, {
                method: method,
                headers: headers,
                body: method === 'POST' ? body : null
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok: ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                document.getElementById('result').textContent = JSON.stringify(data, null, 2);
            })
            .catch(error => {
                document.getElementById('result').textContent = 'Error: ' + error.message;
            });
        }

        document.getElementById('testInstructors').addEventListener('click', function() {
            const areaId = prompt('Ingrese el ID del area');
            testAction('getInstructorsByArea', null, areaId);
        });

        document.getElementById('testAreas').addEventListener('click', function() {
            testAction('getAreas');
        });

        document.getElementById('testResultados').addEventListener('click', function() {
            testAction('getResultados');
        });

        document.getElementById('testIdCalendar').addEventListener('click', function() {
            const fichaId = prompt('Ingrese el ID de la ficha:');
            testAction('getCalendarByFicha', fichaId);
        });

        document.getElementById('testGetEvents').addEventListener('click', function() {
            const calendarId = prompt('Ingrese el ID del calendario:');
            testAction('getEvents', null, null, calendarId);
        });

        document.getElementById('testConsultUsersA').addEventListener('click', function() {
            testAction('consultUsersA');
        });

        document.getElementById('testConsultUsersI').addEventListener('click', function() {
            testAction('consultUsersI');
        });

        document.getElementById('testConsultUsersC').addEventListener('click', function() {
            testAction('consultUsersC');
        });
    });
    </script>
</body>
</html>
