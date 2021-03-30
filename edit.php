<?php session_start();

require "admin/config.php";
require "functions.php";

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("Location: error.php");
}

if(isset($_GET["t"]))
{
    //Bring the torrent and check if It is mine and exist
    $statement = $conection->prepare("SELECT * FROM torrents WHERE ID = :id LIMIT 1");
    $statement->execute(array("id" => clean_string($_GET["t"])));
    $torrent = $statement->fetch();

    if($torrent["userID"] == $_SESSION["userID"] && !empty($torrent))
    {   
        //If request if by POST mean that you can update or delete the torrent
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(isset($_POST["update_torrentbtn"]))
            {
                $statement = $conection->prepare("UPDATE torrents SET name = :torrent_name, magnet = :torrent_magnet, description = :torrent_description WHERE ID = :torrent_id LIMIT 1");
                $statement->execute(
                    array(
                        "torrent_name" => !empty($_POST["optional_display_name"]) ? $_POST["optional_display_name"] : $torrent["name"],
                        "torrent_magnet" => $_POST["torrent_magnet"],
                        "torrent_description" => $_POST["description"],
                        "torrent_id" => $torrent["ID"]
                    )
                );

                header("Location: index.php");
            }
            else
            {
                $statement = $conection->prepare("DELETE FROM torrents WHERE ID = :torrent_id LIMIT 1");
                $statement->execute(array("torrent_id" => $torrent["ID"]));

                header("Location: index.php");
            }
        }
    }
    else
    {
        header("Location: index.php");
    }
}
else
{
    header("Location: index.php");
}

require "view/edit.view.php";

?>