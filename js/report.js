var reportBtn = document.getElementById("report-btn"),
     closeBtn = document.getElementById("button_close"),
     exitIcon = document.getElementsByClassName("fa-times")[0],
     reportContainer = document.getElementById("report-container"),
     textArea = document.getElementById("report-area"),
     submitBtn = document.getElementsByClassName("button_report")[0];

//Close or open when click
reportBtn.addEventListener("click", function(){ reportContainer.classList.toggle("report-container--active"); });
exitIcon.addEventListener("click", function(){ reportContainer.classList.toggle("report-container--active"); });
closeBtn.addEventListener("click", function(){ reportContainer.classList.toggle("report-container--active"); });

//Only allow to send when the there is content in the textArea
textArea.addEventListener("keyup", function()
{   
    if(textArea.value != '')
        submitBtn.classList.add("button_report--active");
    else
        submitBtn.classList.remove("button_report--active");
});