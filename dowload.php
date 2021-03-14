<?php

require "admin/config.php";
require "functions.php";

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("Location: error.php");
}

$torrent_id = clean_string($_GET["f"]);

$statement = $conection->prepare("SELECT * FROM torrents WHERE ID = :id LIMIT 1");
$statement->execute(array("id" => $torrent_id));
$torrent = $statement->fetch();

header("Content-Disposition: attachment; filename=" . $torrent["name"]);
echo $torrent["data"];

?>