var promoteBtn = document.getElementsByClassName("promote");
var table = document.getElementsByTagName("table")[0];
var tableBody = document.getElementsByTagName("tbody")[0];

table.style.width = "unset";

/////////////
// DEFAULT //
/////////////

function reloadTable()
{
    for(let i = 0; i < promoteBtn.length; i++)
    {
        promoteBtn[i].addEventListener("click", function()
        {
            //Change rights of the user
            var petition = new XMLHttpRequest();
            petition.open("POST", "change_users.php");
            petition.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            petition.send("ID=" + promoteBtn[i].value);
            
            //Remake the table
            var petition = new XMLHttpRequest();
            petition.open("GET", "get_users.php");
            petition.send();

            petition.onload = function()
            { 
                var rows = JSON.parse(petition.responseText);
                tableBody.innerHTML = '';
                
                for(let i = 0; i < rows.length; i++)
                {
                    var element = document.createElement("tr");
                    element.innerHTML += ("<td>" + rows[i].user + "</td>");
                    element.innerHTML += ("<td><button class='promote' value='" + rows[i].ID + "'" + ">Promote</button></td>");

                    tableBody.appendChild(element);
                }
                
                reloadTable();
            }
        });
    }
}

reloadTable();


//////////////////////////
// SCROLL TO THE BOTTOM //
//////////////////////////

var scroll_times = 1;

function reloadTableScroll()
{
    //Remake the table
    var petition = new XMLHttpRequest();
    petition.open("POST", "get_users.php");
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
            element.innerHTML += ("<td><button class='promote' value='" + rows[i].ID + "'" + ">Promote</button></td>");

            tableBody.appendChild(element);
        }

        for(let i = 0; i < promoteBtn.length; i++)
        {
            promoteBtn[i].addEventListener("click", function()
            {
                //Change rights of the user
                var petition = new XMLHttpRequest();
                petition.open("POST", "change_users.php");
                petition.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                petition.send("ID=" + promoteBtn[i].value);
                
                //Remake the table
                var petition = new XMLHttpRequest();
                petition.open("POST", "get_users.php");
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
                        element.innerHTML += ("<td><button class='promote' value='" + rows[i].ID + "'" + ">Promote</button></td>");

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