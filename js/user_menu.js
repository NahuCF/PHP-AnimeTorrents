var btn = document.getElementById("user__type");
var subMenu = document.getElementById("sub__menu");

// Sub menu

btn.addEventListener("click", function()
{
    subMenu.classList.toggle("sub-menu--active");
    btn.classList.toggle("user__type--active");
});