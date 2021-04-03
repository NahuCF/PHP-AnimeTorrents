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

$statement = $conection->query("SELECT * FROM users WHERE userType = 'Admin'");
$admins = $statement->fetchAll();

require "../view/admin.view.php";

?>