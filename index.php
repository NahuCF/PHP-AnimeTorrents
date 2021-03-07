<?php session_start();

require "admin/config.php";
require "functions.php";

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("location: error.php");
}

if(isset($_GET["c"]) && isset($_GET["o"]))
{
    if($_GET["c"] == "size" && $_GET["o"] == "desc")
    {
        $torrents = torrents_byColumn_indexDESC($page_config["torrents_per_page"], $conection, "size");
    }
    elseif($_GET["c"] == "size" && $_GET["o"] == "asc")
    {
        $torrents = torrents_byColumn_indexASC($page_config["torrents_per_page"], $conection, "size");
    }
    elseif($_GET["c"] == "date" && $_GET["o"] == "desc")
    {
        $torrents = torrents_byColumn_indexDESC($page_config["torrents_per_page"], $conection, "date");
    }
    elseif($_GET["c"] == "date" && $_GET["o"] == "asc")
    {
        $torrents = torrents_byColumn_indexASC($page_config["torrents_per_page"], $conection, "date");
    }
    elseif($_GET["c"] == "likes" && $_GET["o"] == "desc")
    {
        $torrents = torrents_byColumn_indexDESC($page_config["torrents_per_page"], $conection, "likes");
    }
    elseif($_GET["c"] == "likes" && $_GET["o"] == "asc")
    {
        $torrents = torrents_byColumn_indexASC($page_config["torrents_per_page"], $conection, "likes");
    }
}
else
{
    $torrents = get_torrents($page_config["torrents_per_page"], $conection);
}

require "view/index.view.php";

?>