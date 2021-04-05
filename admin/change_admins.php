<?php session_start();

require "config.php";
require "../functions.php";

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("Location: ../error");
}

if(!isset($_SESSION["user"]) && $_SESSION["userType"] != "God" && $_SESSION["userType"] != "Admin")
{
    header("Location: ../index");
}

$statement = $conection->prepare("UPDATE users SET userType = 'User' WHERE ID = :ID");
$statement->execute(array("ID" => $_POST["ID"]));

?>
