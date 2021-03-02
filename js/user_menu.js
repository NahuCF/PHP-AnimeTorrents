var active = false;
var btn = document.getElementById("user__type");
var subMenu = document.getElementById("switch");

btn.addEventListener("click", function()
{
    if(active == true)
    {
        active = false;

        subMenu.style.opacity = 0;
        subMenu.style.pointerEvents = "none";
    }
    else
    {
        active = true;

        subMenu.style.opacity = 1;
        subMenu.style.pointerEvents = "auto";
    }
});