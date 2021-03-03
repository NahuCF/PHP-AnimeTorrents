<?php session_start();

require "admin/config.php";
require "functions.php";

check_user_session();

$user_error = "";
$email_error = "";
$password_error = "";
$password_error_confirm = "";

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

        if(empty($user))
        {
            $user_error .= "Obligatory field.";
        }
        else if(!empty($result["user"]))
        {
            $user_error .= "Username not avaible. ";
        }

        if(empty($email))
        {
            $email_error .= "Obligatory field.";
        }
        else if(!empty($result["email"]))
        {
            $email_error .= "Email not avaible.";
        }

        if(empty($password))
        {
            $password_error = "Obligatory field.";
        }

        if(empty($password_confirm))
        {
            $password_error_confirm = "Obligatory field.";
        }

        if(!empty($password) && !empty($password_confirm) && $password != $password_confirm)
        {
            $password_error = "Passwords must match.";
        }

        // Register user if It's all ok
        if(empty($user_error) && empty($email_error) && empty($password_error))
        {
            $statement = $conection->prepare("INSERT INTO users values(null, :user, :email, :password)");
            $statement->execute(
                array(
                    "user" => $user,
                    "email" => $email,
                    "password" => $password
            ));
            
            header("Location: login.php");
        }
    }
    else
    {
        header("Location: error.php");
    }
}

require "view/register.view.php";

?>