var demoteBtn = document.getElementsByClassName("demote"),
    table = document.getElementsByTagName("table")[0],
    tableBody = document.getElementsByTagName("tbody")[0],
    input = document.getElementsByClassName("input_search")[0],
    inputButton = document.getElementsByClassName("header__submitbtn")[0];

table.style.width = "unset";

/////////////
// DEFAULT //
/////////////

function addEvents(parameter)
{
    parameter();
}

function reloadTable()
{
    for(let i = 0; i < demoteBtn.length; i++)
    {
        demoteBtn[i].addEventListener("click", function()
        {
            //Change rights of the user
            var petition = new XMLHttpRequest();
            petition.open("POST", "change_admins.php");
            petition.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            petition.send("ID=" + demoteBtn[i].value);
            
            //Remake the table
            var petition = new XMLHttpRequest();
            petition.open("GET", "get_admins.php");
            petition.send();

            petition.onload = function()
            { 
                var rows = JSON.parse(petition.responseText);
                tableBody.innerHTML = '';
                
                for(let i = 0; i < rows.length; i++)
                {
                    var element = document.createElement("tr");
                    element.innerHTML += ("<td>" + rows[i].user + "</td>");
                    element.innerHTML += ("<td><button class='demote' value='" + rows[i].ID + "'" + ">Demote</button></td>");

                    tableBody.appendChild(element);
                }
                
                reloadTable();
            }
        });
    }
}

addEvents(reloadTable);


//////////////////////////
// SCROLL TO THE BOTTOM //
//////////////////////////

var scroll_times = 1;

function reloadTableScroll()
{
    //Remake the table
    var petition = new XMLHttpRequest();
    petition.open("POST", "get_admins.php");
    petition.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    petition.send("scroll_times=" + scroll_times);

    petition.onload = function()
    { 
        var rows = JSON.parse(petition.responseText);
        tableBody.innerHTML = '';
        
        for(let i = 0; i < rows.length; i++)
        {
            var element = document.createElement("tr");
            element.innerHTML += ("<td>" + rows[i].user + "</td>");
            element.innerHTML += ("<td><button class='demote' value='" + rows[i].ID + "'" + ">Demote</button></td>");

            tableBody.appendChild(element);
        }

        for(let i = 0; i < demoteBtn.length; i++)
        {
            demoteBtn[i].addEventListener("click", function()
            {
                //Change rights of the user
                var petition = new XMLHttpRequest();
                petition.open("POST", "change_admins.php");
                petition.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                petition.send("ID=" + demoteBtn[i].value);
                
                //Remake the table
                var petition = new XMLHttpRequest();
                petition.open("POST", "get_admins.php");
                petition.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                petition.send("scroll_times=" + scroll_times);

                petition.onload = function()
                { 
                    var rows = JSON.parse(petition.responseText);
                    tableBody.innerHTML = '';
                    
                    for(let i = 0; i < rows.length; i++)
                    {
                        var element = document.createElement("tr");
                        element.innerHTML += ("<td>" + rows[i].user + "</td>");
                        element.innerHTML += ("<td><button class='demote' value='" + rows[i].ID + "'" + ">Demote</button></td>");

                        tableBody.appendChild(element);
                    }
                    
                    reloadTableScroll();
                }
            });
        }
    }
}

window.onscroll = function()
{
    if(window.innerHeight + window.scrollY >= document.body.offsetHeight) 
    {
        scroll_times++;
        reloadTableScroll();
    }
}

/////////////////
// Input field //
/////////////////

function reloadTableInput(inputValue)
{
    for(let i = 0; i < demoteBtn.length; i++)
        {
            demoteBtn[i].addEventListener("click", function()
            {
                //Change rights of the user
                var petition = new XMLHttpRequest();
                petition.open("POST", "change_admins.php");
                petition.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                petition.send("ID=" + demoteBtn[i].value);
                
                //Remake the table
                var petition = new XMLHttpRequest();
                petition.open("POST", "get_admins.php");
                petition.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                petition.send("user_name=" + inputValue);

                petition.onload = function()
                { 
                    var rows = JSON.parse(petition.responseText);
                    tableBody.innerHTML = '';
                    
                    for(let i = 0; i < rows.length; i++)
                    {
                        var element = document.createElement("tr");
                        element.innerHTML += ("<td>" + rows[i].user + "</td>");
                        element.innerHTML += ("<td><button class='demote' value='" + rows[i].ID + "'" + ">Demote</button></td>");

                        tableBody.appendChild(element);
                    }
                    
                    reloadTableInput(inputValue);
                }
            });
        }
}

input.addEventListener("keyup", function()
{
    var inputValue = String(input.value);

    var petition = new XMLHttpRequest();
    petition.open("POST", "get_admins.php");
    petition.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    petition.send("user_name=" + inputValue);

    petition.onload = function()
    {
        var rows = JSON.parse(petition.responseText);
        tableBody.innerHTML = '';

        for(let i = 0; i < rows.length; i++)
        {
            var element = document.createElement("tr");
            element.innerHTML += ("<td>" + rows[i].user + "</td>");
            element.innerHTML += ("<td><button class='demote' value='" + rows[i].ID + "'" + ">Demote</button></td>");

            tableBody.appendChild(element);
        }

        //Add events
        reloadTableInput(inputValue);
    }
});