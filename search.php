<?php session_start();

require "admin/config.php";
require "functions.php";

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("Location: error.php");
}

$error = "";

if($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["s"]))
{
    $word = $_GET["s"];

    $statement = $conection->prepare("SELECT * FROM torrents WHERE name LIKE :word");
    $statement->execute(array("word" => "%$word%"));
    $torrents = $statement->fetchAll();

    if(empty($torrents))
    {
        $error = "No results found";
    }
}
else
{
    header("Location: index.php");
}

require "view/search.view.php"

?>
