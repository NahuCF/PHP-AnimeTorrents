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
$users = $statement->fetchAll();

$rows = [];

foreach($users as $user)
{
    $user =
    [
        "ID" => $user["ID"],
        "user" => $user["user"],
        "userType" => $user["userType"]
    ];

    array_push($rows, $user);
}

echo json_encode($rows);

?>