<?php session_start();

require "config.php";
require "../functions.php";

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("Location: ../error");
}

if(!isset($_SESSION["user"]) && $_SESSION["userType"] != "God" || $_SESSION["userType"] == "Admin")
{
    header("Location: ../index");
}

if(isset($_POST["user_name"]))
{
    $username = $_POST["user_name"];

    $statement = $conection->prepare("SELECT * FROM users WHERE user LIKE :user AND userType = 'User'");
    $statement->execute(array("user" => "%$username%"));
    $users = $statement->fetchAll();
}
else if(isset($_POST["scroll_times"]))
{
    $end = $page_config["users_per_page"] * $_POST["scroll_times"];

    $statement = $conection->query("SELECT * FROM users WHERE userType = 'User' LIMIT 0, $end");
    $users = $statement->fetchAll();
}
else
{

    $end = $page_config["users_per_page"];
    $statement = $conection->query("SELECT * FROM users WHERE userType = 'User' LIMIT 0, $end");
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