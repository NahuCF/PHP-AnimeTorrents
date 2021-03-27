var btn = document.getElementById("user__type");
var subMenu = document.getElementById("sub__menu");

btn.addEventListener("click", function()
{
    if(subMenu.style.display != "none")
    {
        subMenu.style.display = "none";
        subMenu.pointerEvents = "none";

        btn.style.backgroundColor = "#222222";
        btn.style.color = "#9D9D9D";
    }
    else
    {
        subMenu.style.display = "block";
        subMenu.style.pointerEvents = "auto";

        btn.style.backgroundColor = "#080808";
        btn.style.color = "white";
    }
});