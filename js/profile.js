var passwordTab = document.getElementById("profile__tabs-password");
var emailTab = document.getElementById("profile__tabs-email");
var passwordForm = document.getElementsByClassName("profile__form-password")[0];
var emailForm = document.getElementsByClassName("profile__form-email")[0];

var profile__tabs = document.getElementsByClassName("profile__tabs")[0];

passwordTab.addEventListener("click", function()
{
    passwordForm.style.display = "block";
    emailForm.style.display = "none";
    
    profile__tabs.children[0].classList.add("active");
    profile__tabs.children[1].classList.remove("active");
})

emailTab.addEventListener("click", function()
{
    passwordForm.style.display = "none";
    emailForm.style.display = "block";  

    profile__tabs.children[0].classList.remove("active");
    profile__tabs.children[1].classList.add("active");
})