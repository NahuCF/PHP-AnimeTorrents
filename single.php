<?php session_start();

require "admin/config.php";
require "functions.php";

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("Location: error.php");
}

if(isset($_GET["ID"]))
{
    $torrent_id = clean_string($_GET["ID"]);

    $statement = $conection->prepare("SELECT * FROM torrents WHERE ID = :ID LIMIT 1");
    $statement->execute(
        array(
            "ID" => $torrent_id
        )
    );
    $torrent = $statement->fetch();
}
else
{
    header("Location: index.php");
}

require "view/single.view.php";

?>