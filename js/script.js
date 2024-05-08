let docTitle = document.title;
window.addEventListener('blur', () =>{
  document.title = "Come back :)";
})
window.addEventListener("focus", () =>{
  document.title = docTitle
});

// document.getElementById("rolSelect").addEventListener("change", function() {
//     var rol = this.value;
//     var optionsForInstructorDiv = document.getElementById("optionsForInstructor");

//     if (rol === "Instructor") {
//         optionsForInstructorDiv.style.display = "block";
//     } else {
//         optionsForInstructorDiv.style.display = "none";
//     }
// });

// Obtener el enlace del usuario
var usuarioLink = document.getElementById("usuario");