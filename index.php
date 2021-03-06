<?php session_start();

require "admin/config.php";
require "functions.php";

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("location: error.php");
}

if(isset($_GET["c"]) && isset($_GET["o"]))
{
    if($_GET["c"] == "size" && $_GET["o"] == "desc")
    {
        $statement = $conection->prepare("SELECT * FROM torrents ORDER BY size DESC");
        $statement->execute();
        $torrents = $statement->fetchAll();
    }
    elseif($_GET["c"] == "size" && $_GET["o"] == "asc")
    {
        $statement = $conection->prepare("SELECT * FROM torrents ORDER BY size ASC");
        $statement->execute();
        $torrents = $statement->fetchAll();
    }
    elseif($_GET["c"] == "date" && $_GET["o"] == "desc")
    {
        $statement = $conection->prepare("SELECT * FROM torrents ORDER BY date DESC");
        $statement->execute();
        $torrents = $statement->fetchAll();
    }
    elseif($_GET["c"] == "date" && $_GET["o"] == "asc")
    {
        $statement = $conection->prepare("SELECT * FROM torrents ORDER BY date ASC");
        $statement->execute();
        $torrents = $statement->fetchAll();
    }
    elseif($_GET["c"] == "likes" && $_GET["o"] == "desc")
    {
        $statement = $conection->prepare("SELECT * FROM torrents ORDER BY likes DESC");
        $statement->execute();
        $torrents = $statement->fetchAll();
    }
    elseif($_GET["c"] == "likes" && $_GET["o"] == "asc")
    {
        $statement = $conection->prepare("SELECT * FROM torrents ORDER BY likes ASC");
        $statement->execute();
        $torrents = $statement->fetchAll();
    }
}
else
{
    $statement = $conection->prepare("SELECT * FROM torrents ORDER BY date DESC");
    $statement->execute();
    $torrents = $statement->fetchAll();
}

require "view/index.view.php";

?>