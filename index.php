<?php session_start();

require "admin/config.php";
require "functions.php";

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("Location: error.php");
}

if(isset($_GET["c"]) && isset($_GET["o"]))
{
    if($_GET["c"] == "size" && $_GET["o"] == "desc")
    {
        $torrents = torrents_byColumn_index($page_config["torrents_per_page"], $conection, "DESC", "size");
    }
    elseif($_GET["c"] == "size" && $_GET["o"] == "asc")
    {
        $torrents = torrents_byColumn_index($page_config["torrents_per_page"], $conection, "ASC", "size");
    }
    elseif($_GET["c"] == "date" && $_GET["o"] == "desc")
    {
        $torrents = torrents_byColumn_index($page_config["torrents_per_page"], $conection, "DESC", "date");
    }
    elseif($_GET["c"] == "date" && $_GET["o"] == "asc")
    {
        $torrents = torrents_byColumn_index($page_config["torrents_per_page"], $conection, "ASC", "date");
    }
    elseif($_GET["c"] == "likes" && $_GET["o"] == "desc")
    {
        $torrents = torrents_byColumn_index($page_config["torrents_per_page"], $conection, "DESC", "likes");
    }
    elseif($_GET["c"] == "likes" && $_GET["o"] == "asc")
    {
        $torrents = torrents_byColumn_index($page_config["torrents_per_page"], $conection, "ASC", "likes");
    }
}
else
{
    $torrents = torrents_byColumn_index($page_config["torrents_per_page"], $conection, "DESC", "date");
}

require "view/index.view.php";

?>