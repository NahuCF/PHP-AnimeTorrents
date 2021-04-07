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

if(isset($_POST["scroll_times"]))
{
    $end = $page_config["users_per_page"] * $_POST["scroll_times"];
    $statement = $conection->query("SELECT SQL_CALC_FOUND_ROWS * FROM users WHERE userType = 'Admin' LIMIT 0, $end");
    $users = $statement->fetchAll();
}
else
{
    $end = $page_config["users_per_page"];
    $statement = $conection->query("SELECT SQL_CALC_FOUND_ROWS * FROM users WHERE userType = 'Admin' LIMIT 0, $end");
    $users = $statement->fetchAll();
}

$rows = [];

foreach($users as $user)
{
    $user =
    [
        "ID" => $user["ID"],
        "user" => $user["user"]
    ];

    array_push($rows, $user);
}

echo json_encode($rows);

?>