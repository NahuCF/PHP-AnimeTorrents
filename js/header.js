var hamburguerBtn = document.getElementById("hamburger-btn");
var headerNav = document.getElementById("header-bottom-container");

// THIS CODE WILL ONLY GOING TO EXECUTE WHEN THE SIZE OF THE SCREEN IS < 768px width 

// Change nav display state when click hamburger menu
hamburguerBtn.addEventListener("click", function()
{
    if(headerNav.style.display != "none")
    {
        headerNav.style.display = "none";
    }
    else
    {
        headerNav.style.display = "flex";
    }
})

// Make the hamburguer visible if resize manualy
window.addEventListener("resize", function()
{
    if(window.innerWidth >= 678)
    {
        headerNav.style.display = "flex";
    }
})

// Make the hamburguer invisible when openning the page
if(window.innerWidth <= 768)
{
    headerNav.style.display = "none";
}