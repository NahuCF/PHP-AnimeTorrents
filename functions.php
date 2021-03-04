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

function check_if_user_session()
{
    if(isset($_SESSION["user"]))
    {
        header("Location: index.php");
    }
}

function check_ifnot_user_session()
{
    if(!isset($_SESSION["user"]))
    {
        header("Location: index.php");
    }
}

function get_user_id($conection)
{   
    $user_id = $_SESSION["user"];
    if(empty($user_id))
    {
        header("Location: error.php");
    }

    $statement = $conection->prepare("SELECT * FROM users WHERE user = :user LIMIT 1");
    $statement->execute(array(
        "user" =>  $user_id
    ));
    $resutlado = $statement->fetch();

    return $resutlado["ID"];
}

function get_torrent_size($file_name)
{
    define("LENGTH_WORD", 7); // lengthi
    define("kb", 1000);
    define("mb", 1000000);
    define("gb", 1000000000);
    define("tb", 1000000000000);

    $size = null;
    $file_content = file_get_contents($file_name);
    $particion1 = explode("lengthi", $file_content);

    for($i = 1; $i < sizeof($particion1) - 1; $i++)
    {
        $temporal_content = $particion1[$i];

        $number_in_array = explode("e", $particion1[$i]);
        $first_file_size = $number_in_array[0];
        
        $size += (int)$first_file_size;
    }

    if($size < mb)
    {
        return round($size / kb, 1) . " KB";
    }
    elseif($size >= mb && $size < gb) 
    {
        return round($size / mb, 1) . " MB";
    }
    elseif($size >= gb && $size < tb)  
    {
        return round($size / gb, 1) . " GB";
    }
    else
    {
        return round($size / tb, 1) . " TB";
    }
}

?>