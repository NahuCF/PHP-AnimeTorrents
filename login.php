<?php session_start();

require "admin/config.php";
require "functions.php";

if(isset($_SESSION["user"]))
{
    header("Location: index.php");
}

$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $user = clean_string($_POST["username"]);
    $password = clean_string($_POST["password"]);

    $conection = conection_to_database($db_config);
    if($conection)
    {
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
        }

        if(empty($result["user"]) || empty($result["password"]))
        {
            $error = "<strong>Login failed!</strong> Incorrect username or password.";
        }
        else
        {
            header ("Location: index.php");
        }
    }
    else
    {
        header("Location: error.php");
    }
}

require "view/login.view.php";

?>