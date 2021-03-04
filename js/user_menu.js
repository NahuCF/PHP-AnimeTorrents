var active = false;
var btn = document.getElementById("user__type");
var subMenu = document.getElementById("switch");
var userType = document.getElementById("user__type");

btn.addEventListener("click", function()
{
    if(active == true)
    {
        active = false;

        subMenu.style.opacity = 0;
        subMenu.style.pointerEvents = "none";
        userType.style.color = "#9D9D9D";
    }
    else
    {
        active = true;

        subMenu.style.opacity = 1;
        subMenu.style.pointerEvents = "auto";
        userType.style.color = "white";
    }
});