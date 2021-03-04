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

function get_file_size($file_name)
{
    define("LENGTH_WORD", 7); // lengthi
    define("kb", 1000);
    define("mb", 1000000);
    define("gb", 1000000000);
    define("tb", 1000000000000);

    $size = "";
    $file_content = file_get_contents($file_name);

    $begin = strpos($file_content, "lengthi") + LENGTH_WORD;
    $end = strpos($file_content, "e4:name");

    for($begin; $begin < $end; $begin++)
    {
        $size .= $file_content[$begin];
    }

    if($size < mb)
    {
        return round((int)$size / kb, 1) . "KB";
    }
    elseif($size >= mb && $size < gb) 
    {
        return round((int)$size / mb, 1) . "MB";
    }
    elseif($size >= gb && $size < tb)  
    {
        return round((int)$size / gb, 1) . "GB";
    }
    else
    {
        return round((int)$size / tb, 1) . "TB";
    }
}

?>