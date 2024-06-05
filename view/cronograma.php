
  <div class="container">
    <div id="calendar"></div>
  </div>
  <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h5 class="modal-title" id="titulo">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>

        <form action="">
          <div class="modal-body">
            <input type="date" class="from-control" id="start">
            <label for="start" class="from-label">Fecha</label><br><br>
            <select name="dateform" id="">

            </select>
            <label for="start">Instructor</label><br><br>
            <select name="ins" id="instructorSelect">

            </select>
            <label for="start">Area de Formacion</label><br><br>
            <select name="area" id="">

            <!-- </select>
            <label for="start">Ficha Tecnica</label><br><br>
            <select name="ficha" id=""> -->

            </select>
            <label for="">Resultado de Aprendizaje</label>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Guardar Evento</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
            </div>
          </div>
        </form>

      </div>

    </div>
  </div>

  <script>




function loadInstructor() {
        fetch("../routes/consultasuser.php/getCalendar.php?instructor=")
            .then(response => response.json())
            .then(data => {
                const instructorSelect = document.getElementById('instructorSelect')
                instructorSelect.innerHTML = '';

                for (const instructorId in data) {
                    if (data.hasOwnProperty(instructorId)) {
                        const instructorName = data[instructorId];
                        const option = document.createElement('option');
                        option.value = instructorName;
                        option.text = generoId;
                        instructorSelect.appendChild(option);
                    }
                }
                instructorSelect.dispatchEvent(new Event('change'));
            })
            .catch(error => console.error('Error fetching files', error))
    }

    loadInstructor();
  </script>