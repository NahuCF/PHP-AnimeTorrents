<?php session_start();

require "admin/config.php";
require "functions.php";

if(!isset($_SESSION["user"]))
{
    header("Location: index.php");
}

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("Location: error.php");
}

$statement = $conection->prepare("SELECT * FROM users WHERE id = :user_id LIMIT 1");
$statement->execute(array("user_id" => $_SESSION["userID"]));
$user = $statement->fetch();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updatebtn_password"]))
{
    $current_password_error = "";
    $password_error = "";
    $password_error_list = "";

    $current_password = clean_string($_POST["current_password"]);
    $password = clean_string($_POST["password"]);
    $password_confirm = clean_string($_POST["password__confirm"]);

    if($user["password"] !== $current_password)
    {
        $current_password_error = "Wrong password.";
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

    if(empty($current_password_error) && empty($password_error) && empty($password_error_list))
    {
        $statement = $conection->prepare("UPDATE users SET password = :password WHERE ID = :user_id");
        $statement->execute(
            array(
                "user_id" => $_SESSION["userID"],
                "password" => $password
            )
        );
    }
}
elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updatebtn_email"]))
{   
    $password_error_email = "";
    $email_error = "";
    $email_error_list = "";

    $current_password = clean_string($_POST["current_password"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    $statement = $conection->prepare("SELECT email FROM users WHERE email = :email");
    $statement->execute(array("email" => $email));
    $result = $statement->fetch();

    if($user["password"] != $_POST["current_password"])
    {
        $password_error_email = "Wrong Password";
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

    if(empty($password_error_email) && empty($email_error) && empty($email_error_list))
    {
        $statement = $conection->prepare("UPDATE users SET email = :email WHERE ID = :user_id");
        $statement->execute(
            array(
                "user_id" => $_SESSION["userID"],
                "email" => $email
            )
        );
    }
}

require "view/profile.view.php";

?>