<?php session_start();

require "admin/config.php";
require "functions.php";

check_ifnot_user_session();

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("Location: error.php");
}

$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $file_name = "";
    $file_type = "";
    $file_data = "";
    $user_id = get_user_id($conection);
    $torrent_magnet = "asd";
    $file_size = "hola";

    if(empty($_FILES["torrent_data"]["name"]))
    {
        $error .= "Obligatory field.";
    }
    else 
    {
        $file_name = !empty($_POST["optional_display_name"]) ? $_POST["optional_display_name"] : $_FILES["torrent_data"]["name"];
        $file_type = $_FILES["torrent_data"]["type"];
        $file_data = file_get_contents($_FILES["torrent_data"]["tmp_name"]);
        $torrent_magnet = $_POST["torrent_magnet"];
        $file_size = get_torrentsize_byts($_FILES["torrent_data"]["tmp_name"]);

        $statement = $conection->prepare("INSERT INTO torrents VALUES(null, :name, :type, :data, :userID, null, :magnet, :size)");
            $statement->execute(
                array(
                    "name" => $file_name,
                    "type" => $file_type,
                    "data" => $file_data,
                    "userID" => $user_id,
                    "magnet" => $torrent_magnet,
                    "size" => $file_size
                )
            );  

        header("Location: index.php");
    }
}

require "view/upload.view.php";

?>