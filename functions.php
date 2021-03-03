<?php

function conection_to_database($db_config)
{
    try
    {
        $conection = new PDO("mysql:host=localhost;dbname=" . $db_config["database"], $db_config["user"], $db_config["password"]);
        return $conection;
    }
    catch(PDOexception $e)
    {
        return false;
    }
}

function get_page()
{
    return isset($_GET["p"]) ? $_GET["p"] : 1;
}

function get_torrents($post_per_page, $conection)
{

}

function clean_string($word)
{
    
}

function check_user_session()
{
    if(isset($_SESSION["user"]))
    {
        header("Location: index.php");
    }
}

?>