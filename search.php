<?php session_start();

require "admin/config.php";
require "functions.php";

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("Location: error.php");
}

$error = "";

if(isset($_GET["u"]) && isset($_GET["w"])) // Using a word to find torrent of a user
{
    $user_name = clean_string($_GET["u"]);
    $word = clean_string($_GET["w"]);

    if(isset($_GET["c"]) && isset($_GET["o"]))
    {
        if($_GET["c"] == "size" && $_GET["o"] == "desc")
        {
            $torrents = user_torrents_search($page_config["torrents_per_page"], $conection, $word, "size", "DESC", $user_name);
        }
        elseif($_GET["c"] == "size" && $_GET["o"] == "asc")
        {
            $torrents = user_torrents_search($page_config["torrents_per_page"], $conection, $word, "size", "ASC", $user_name);
        }
        elseif($_GET["c"] == "date" && $_GET["o"] == "desc")
        {
            $torrents = user_torrents_search($page_config["torrents_per_page"], $conection, $word, "date", "DESC", $user_name);
        }
        elseif($_GET["c"] == "date" && $_GET["o"] == "asc")
        {
            $torrents = user_torrents_search($page_config["torrents_per_page"], $conection, $word, "date", "ASC", $user_name);
        }
        elseif($_GET["c"] == "likes" && $_GET["o"] == "desc")
        {
            $torrents = user_torrents_search($page_config["torrents_per_page"], $conection, $word, "likes", "DESC", $user_name);
        }
        elseif($_GET["c"] == "likes" && $_GET["o"] == "asc")
        {
            $torrents = user_torrents_search($page_config["torrents_per_page"], $conection, $word, "likes", "ASC", $user_name);
        }
    }
    else
    {
        $torrents = user_torrents_search($page_config["torrents_per_page"], $conection, $word, "date", "DESC", $user_name);
    }
}
else if(isset($_GET["w"])) // Search without u
{
    $word = clean_string($_GET["w"]);

    if(isset($_GET["c"]) && isset($_GET["o"]))
    {
        if($_GET["c"] == "size" && $_GET["o"] == "desc")
        {
            $torrents = torrents_byColumn_search($page_config["torrents_per_page"], $conection, $word, "DESC", "size");
        }
        elseif($_GET["c"] == "size" && $_GET["o"] == "asc")
        {
            $torrents = torrents_byColumn_search($page_config["torrents_per_page"], $conection, $word, "ASC", "size");
        }
        elseif($_GET["c"] == "date" && $_GET["o"] == "desc")
        {
            $torrents = torrents_byColumn_search($page_config["torrents_per_page"], $conection, $word, "DESC", "date");
        }
        elseif($_GET["c"] == "date" && $_GET["o"] == "asc")
        {
            $torrents = torrents_byColumn_search($page_config["torrents_per_page"], $conection, $word, "ASC", "date");
        }
        elseif($_GET["c"] == "likes" && $_GET["o"] == "desc")
        {
            $torrents = torrents_byColumn_search($page_config["torrents_per_page"], $conection, $word, "DESC","likes");
        }
        elseif($_GET["c"] == "likes" && $_GET["o"] == "asc")
        {
            $torrents = torrents_byColumn_search($page_config["torrents_per_page"], $conection, $word, "ASC", "likes");
        }
    }
    else
    {
        $torrents = torrents_byColumn_search($page_config["torrents_per_page"], $conection, $word, "DESC", "date");
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
