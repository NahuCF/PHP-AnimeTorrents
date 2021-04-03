<?php session_start();

require "admin/config.php";
require "functions.php";

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("Location: error");
}

if(isset($_SESSION["user"]))
{
    header("Location: index");
}

$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $user = clean_string($_POST["username"]);
    $password = clean_string($_POST["password"]);

    $statement = $conection->prepare("SELECT * FROM users WHERE user = :user AND password = :password LIMIT 1");
    $statement->execute(
        array(
            "user" => $user,
            "password" => $password
        )
    );  
    $result = $statement->fetch();

    if(!empty($result))
    {
        $_SESSION["user"] = $user;
        $_SESSION["userID"] = $result["ID"];
        $_SESSION["userType"] = $result["userType"];
    }

    if(empty($result["user"]) || empty($result["password"]))
    {
        $error = "<strong>Login failed!</strong> Incorrect username or password.";
    }
    else
    {
        header ("Location: index");
    }
}

require "view/login.view.php";

?>