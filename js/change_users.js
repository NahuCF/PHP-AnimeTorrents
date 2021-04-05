var promoteBtn = document.getElementsByClassName("promote");
var table = document.getElementsByTagName("tbody")[0];

function getUsers()
{
    var petition = new XMLHttpRequest();
    petition.open("GET", "get_users.php");
    petition.send();

    petition.onload = function()
    {
        let userData = JSON.parse(petition.responseText);
        table.innerHTML = '';
        
        for(let i = 0; i < userData.length; i++)
        {
            let row = document.createElement("tr");
            row.innerHTML += ("<td>" + userData[i].user + "</td>");
            row.innerHTML += ("<td>" + '<button class="promote"' + ' value="' + userData[i].ID  + '"' + ">Promote</button>" + "</td>");

            table.appendChild(row);
        }

        updateTable();
    }
}

function updateTable()
{
    for(let i = 0; i < promoteBtn.length; i++)
    {
        promoteBtn[i].addEventListener("click", function()
        {
            var petition = new XMLHttpRequest();
            petition.open("POST", "change_users.php");
            petition.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            var parameter = "ID=" + promoteBtn[i].value;
            petition.send(parameter);
            
            getUsers();
        }); 
    }
}

updateTable();