let docTitle = document.title;
window.addEventListener("blur", () => {
  document.title = "Vuelveeee :)";
});
window.addEventListener("focus", () => {
  document.title = docTitle;
});