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

$begin = get_page() > 1 ? get_page() * $page_config["rows_per_page"] - $page_config["rows_per_page"] : 0;
$end = $page_config["rows_per_page"];

$statement = $conection->query("SELECT * FROM reports GROUP BY torrentID ORDER BY reported_times DESC LIMIT $begin, $end");
$reports = $statement->fetchAll();

require "../view/admin.view/reports.view.php";

?>
