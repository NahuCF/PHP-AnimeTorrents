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

$begin = get_page() > 1 ? get_page() * $rows_per_page - $rows_per_page : 0;
$end = $page_config["rows_per_page"];
$statement = $conection->query("SELECT SQL_CALC_FOUND_ROWS * FROM users WHERE userType = 'Admin' LIMIT $begin, $end");
$users = $statement->fetchAll();

require "../view/admin.view/admins.view.php";

?>