<?php session_start();

require "admin/config.php";
require "functions.php";

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("Location: error.php");
}

if(isset($_GET["u"]))
{
    $user_name = clean_string($_GET["u"]);
}
else
{
    header("Location: index.php");
}

if(isset($_GET["u"]) && isset($_GET["c"]) && isset($_GET["o"]))
{
    if($_GET["c"] == "size" && $_GET["o"] == "desc")
    {
        $torrents = torrents_byColumn_torrents($page_config["torrents_per_page"], $conection, "date", "DESC", $user_name);
    }
    elseif($_GET["c"] == "size" && $_GET["o"] == "asc")
    {
        $torrents = torrents_byColumn_torrents($page_config["torrents_per_page"], $conection, "size", "ASC", $user_name);
    }
    elseif($_GET["c"] == "date" && $_GET["o"] == "desc")
    {
        $torrents = torrents_byColumn_torrents($page_config["torrents_per_page"], $conection, "date", "DESC", $user_name);
    }
    elseif($_GET["c"] == "date" && $_GET["o"] == "asc")
    {
        $torrents = torrents_byColumn_torrents($page_config["torrents_per_page"], $conection, "date", "ASC", $user_name);
    }
    elseif($_GET["c"] == "likes" && $_GET["o"] == "desc")
    {
        $torrents = torrents_byColumn_torrents($page_config["torrents_per_page"], $conection, "likes", "DESC",$user_name);
    }
    elseif($_GET["c"] == "likes" && $_GET["o"] == "asc")
    {
        $torrents = torrents_byColumn_torrents($page_config["torrents_per_page"], $conection, "likes", "ASC", $user_name);
    }
}
else
{
    $torrents = torrents_byColumn_torrents($page_config["torrents_per_page"], $conection, "date", "DESC", $user_name);
}

require "view/torrents.view.php";

?>