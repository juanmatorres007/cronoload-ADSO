let docTitle = document.title;
window.addEventListener("blur", () => {
  document.title = "Come back :)";
});
window.addEventListener("focus", () => {
  document.title = docTitle;
});

document.getElementById("rolSelect").addEventListener("change", function() {
  var rol = this.options[this.selectedIndex].text;
  var optionsForInstructorDiv = document.getElementById("optionsForInstructor");

  if (rol === "Instructor" || rol === "Coordinador") {
      optionsForInstructorDiv.style.display = "block";
  } else {
      optionsForInstructorDiv.style.display = "none";
  }
});

// Función para cargar los roles y mostrar campos según el rol seleccionado
function loadRolesAndFields() {
  // Realiza una petición AJAX para obtener los roles y campos desde el servidor
  fetch("../model/rolModel.php")
    .then((response) => response.json())
    .then((data) => {
      const roleSelect = document.getElementById("roleSelect");
      const optionsForInstructorDiv = document.getElementById(
        "optionsForInstructor"
      );
      roleSelect.innerHTML = ""; // Limpia opciones anteriores

      data.forEach((role) => {
        const option = document.createElement("option");
        option.value = role.id;
        option.text = role.name;
        roleSelect.appendChild(option);
      });

      // Event listener para cambiar campos según el rol seleccionado
      roleSelect.addEventListener("change", function () {
        const selectedRoleId = this.value;
        const selectedRole = data.find((role) => role.id === selectedRoleId);

        // Lógica para mostrar u ocultar campos según el rol seleccionado
        if (selectedRole && selectedRole.name === "Instructor") {
          optionsForInstructorDiv.style.display = "block";
        } else {
          optionsForInstructorDiv.style.display = "none";
        }
      });
    })
    .catch((error) => console.error("Error fetching roles and fields:", error));
}

// Cargar roles  y campos al cargar la página
loadRolesAndFields();

// Obtener el enlace del usuario
var usuarioLink = document.getElementById("usuario");
