//MENU DESPLEGABLE
const btnMenu = document.getElementById("btn-menu");
const mainNav = document.getElementById("main-nav");

btnMenu.addEventListener("click", function() {
  mainNav.classList.toggle("show");
});
