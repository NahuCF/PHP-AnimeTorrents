<?php session_start();

require "admin/config.php";
require "functions.php";

if(isset($_SESSION["user"]))
{
    header("Location: index.php");
}

$user_error = "";
$email_error = "";
$email_error_list = "";
$password_error = "";
$password_error_list = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $user = clean_string($_POST["username"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $password = clean_string($_POST["password"]);
    $password_confirm = clean_string($_POST["password__confirm"]);

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
            $user_error = "Obligatory field.";
        }
        else if(!empty($result["user"]))
        {
            $user_error = "Username not avaible.";
        }
        else if(strlen($user) < 3 || strlen($user) > 20)
        {
            $user_error = "Field must be between 3 and 20 characters long.";
        }

        if(empty($email))
        {
            $email_error = "Obligatory field.";
        }
        else if(!empty($result["email"]))
        {
            $email_error = "Email not avaible.";
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($email) < 5 || strlen($email) > 30)
        {
            $email_error_list = "<li> Invalid email address. </li> <li> Field must be between 5 and 30 characters long. </li>";
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $email_error = "Invalid email address.";
        }

        if(empty($password))
        {
            $password_error = "Obligatory field.";
        }
        elseif($password != $password_confirm && strlen($password) < 6 || strlen($password) > 20 && strlen($password_confirm) < 6 || strlen($password_confirm) > 20)
        {
            $password_error_list = "<li> Passwords must match. </li> <li> Password must be between 6 and 20 characters long.";
        }
        elseif(strlen($password) < 6 || strlen($password) > 20 && strlen($password_confirm) < 6 || strlen($password_confirm) > 20)
        {
            $password_error = "Password must be between 6 and 20 characters long.";
        }
        elseif($password != $password_confirm)
        {
            $password_error = "Passwords must match.";
        }

        // Register user if It's all ok
        if(empty($user_error) && empty($email_error) && empty($email_error_list) && empty($password_error) && empty($password_error_list) && !empty($_POST["g-recaptcha-response"]))
        {
            $statement = $conection->prepare("INSERT INTO users values(null, :user, :email, :password, null, 'User')");
            $statement->execute(
                array(
                    "user" => $user,
                    "email" => $email,
                    "password" => $password
                )
            );
            
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