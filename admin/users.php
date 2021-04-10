<?php session_start();

require "config.php";
require "../functions.php";

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("Location: ../error");
}

if(!isset($_SESSION["user"]) || $_SESSION["userType"] != "God")
{
    header("Location: ../index");
}

$end = $page_config["users_per_page"];
$statement = $conection->query("SELECT SQL_CALC_FOUND_ROWS * FROM users WHERE userType = 'User' LIMIT 0, $end");
$users = $statement->fetchAll();

require "../view/admin.view/users.view.php";

?>