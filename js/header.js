var hamburguerBtn = document.getElementById("hamburger-btn");
var headerNav = document.getElementById("header-bottom-container");

// Hamburguer menu

hamburguerBtn.addEventListener("click", function()
{
    headerNav.classList.toggle("header-bottom-container--active");
});