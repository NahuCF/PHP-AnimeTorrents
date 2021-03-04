var inputFile = document.getElementById("upload__torrent");

inputFile.addEventListener("change", function()
{
    let inputToChange = document.getElementById("torrent__file");
    let fileName = inputFile.value;

    inputToChange.value = fileName.split(/((\\|\/))/g).pop(); ;
});
