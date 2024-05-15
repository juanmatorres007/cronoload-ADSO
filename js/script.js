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