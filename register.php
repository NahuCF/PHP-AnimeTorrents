<?php

require "admin/config.php";
require "functions.php";

$user_error = "";
$email_error = "";
$password_error = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $user = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_confirm = $_POST["password__confirm"];

    $conection = conection_to_database($db_config);
    if($conection)
    {
        // Check for errors
        $statement = $conection->prepare("SELECT * FROM users WHERE user = :user or email = :email");
        $statement->execute(
            array(
                "user" => $user,
                "email" => $email
        ));
        $result = $statement->fetch();

        if(!empty($result["user"]))
        {
            $user_error .= "User in use. <br>";
        }

        if(!empty($result["email"]))
        {
            $email_error .= "Email in use. <br>";
        }

        if($password != $password_confirm)
        {
            $password_error .= "Passwords must match. <br>";
        }
        echo $error;
    }
    else
    {
        header("Location: error.php");
    }
}

require "view/register.view.php";

?>