<?php session_start();

require "admin/config.php";
require "functions.php";

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("Location: error.php");
}

$error = "";

if(!empty($_GET["w"]))
{
    $word = $_GET["w"];

    if(isset($_GET["c"]) && isset($_GET["o"]))
    {
        if($_GET["c"] == "size" && $_GET["o"] == "desc")
        {
            $torrents = torrents_byColumn_searchDESC($page_config["torrents_per_page"], $conection, $word, "size");
        }
        elseif($_GET["c"] == "size" && $_GET["o"] == "asc")
        {
            $torrents = torrents_byColumn_searchASC($page_config["torrents_per_page"], $conection, $word, "size");
        }
        elseif($_GET["c"] == "date" && $_GET["o"] == "desc")
        {
            $torrents = torrents_byColumn_searchDESC($page_config["torrents_per_page"], $conection, $word, "date");
        }
        elseif($_GET["c"] == "date" && $_GET["o"] == "asc")
        {
            $torrents = torrents_byColumn_searchASC($page_config["torrents_per_page"], $conection, $word, "date");
        }
        elseif($_GET["c"] == "likes" && $_GET["o"] == "desc")
        {
            $torrents = torrents_byColumn_searchDESC($page_config["torrents_per_page"], $conection, $word, "likes");
        }
        elseif($_GET["c"] == "likes" && $_GET["o"] == "asc")
        {
            $torrents = torrents_byColumn_searchASC($page_config["torrents_per_page"], $conection, $word,"likes");
        }
    }
    else
    {
        $torrents = get_torrents_in_search($page_config["torrents_per_page"], $conection, $word);
    }

    if(empty($torrents))
    {
        $error = "No results found";
    }
}
else
{
    header("Location: index.php");
}

require "view/search.view.php"

?>
