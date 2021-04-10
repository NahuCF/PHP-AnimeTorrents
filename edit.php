<?php session_start();

require "admin/config.php";
require "functions.php";

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("Location: error");
}

if(isset($_GET["t"]))
{
    //Bring the torrent and check if It is mine, or the user visiter It is a Admin and exist 
    $statement = $conection->prepare("SELECT * FROM torrents WHERE ID = :id LIMIT 1");
    $statement->execute(array("id" => clean_string($_GET["t"])));
    $torrent = $statement->fetch();

    if(($torrent["userID"] == $_SESSION["userID"]) || $_SESSION["userType"] == "God" || $_SESSION["userType"] == "Admin" && !empty($torrent))
    {   
        //If request is by POST means that you can update or delete the torrent
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(isset($_POST["update_torrentbtn"])) //User want to update
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

                header("Location: single?ID=" . $torrent["ID"]);
            }
            else //User want to delete
            {
                $statement = $conection->prepare("DELETE FROM torrents WHERE ID = :torrent_id LIMIT 1");
                $statement->execute(array("torrent_id" => $torrent["ID"]));

                //Delete reports
                $statement = $conection->prepare("DELETE FROM reports WHERE torrentID = :torrent_id");
                $statement->execute(array("torrent_id" => clean_string($_GET["t"])));

                header("Location: index");
            }
        }
    }
    else
    {
        header("Location: index");
    }
}
else
{
    header("Location: index");
}

require "view/edit.view.php";

?>