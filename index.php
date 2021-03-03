<?php session_start();

require "admin/config.php";
require "functions.php";

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("location: error.php");
}

$statement = $conection->prepare("SELECT * FROM torrents ORDER BY date DESC");
$statement->execute();
$torrents = $statement->fetchAll();

require "view/index.view.php";

?>