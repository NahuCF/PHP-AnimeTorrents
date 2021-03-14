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

$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_FILES["torrent_data"]["name"]))
    {
        $error .= "Obligatory field.";
    }
    else if(!empty($_POST["g-recaptcha-response"]))
    {
        $file_name = !empty($_POST["optional_display_name"]) ? clean_string($_POST["optional_display_name"]) : clean_string($_FILES["torrent_data"]["name"]);
        $file_type = clean_string($_FILES["torrent_data"]["type"]);
        $file_data = file_get_contents($_FILES["torrent_data"]["tmp_name"]);
        $user_id = $_SESSION["userID"];
        $torrent_magnet = clean_string($_POST["torrent_magnet"]);
        $file_size = clean_string(get_torrentsize_byts($_FILES["torrent_data"]["tmp_name"]));
        $file_description = clean_string($_POST["description"]);

        $statement = $conection->prepare("INSERT INTO torrents VALUES(null, :name, :type, :data, :userName, :userID, null, :magnet, :size, :likes, :dislikes, :description)");
            $statement->execute(
                array(
                    "name" => $file_name,
                    "type" => $file_type,
                    "data" => $file_data,
                    "userName" => $_SESSION["user"],
                    "userID" => $user_id,
                    "magnet" => $torrent_magnet,
                    "size" => $file_size,
                    "likes" => 1,
                    "dislikes" => 2,
                    "description" => $file_description
                )
            );  
        
        header("Location: index.php");
    }
}

require "view/upload.view.php";

?>