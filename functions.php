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

///////////////////////////////////////////////////
// THIS FUNCTIONS WILL ONLY BE USED IN INDEX.PHP //
///////////////////////////////////////////////////

function torrents_byColumn_indexDESC($post_per_page, $conection, $column)
{
    $begin = get_page() > 1 ? get_page() * $post_per_page - $post_per_page : 0;
    $statement = $conection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM torrents ORDER BY $column DESC LIMIT $begin, $post_per_page");
    $statement->execute();

    return $torrents = $statement->fetchAll();
}

function torrents_byColumn_indexASC($post_per_page, $conection, $column)
{
    $begin = get_page() > 1 ? get_page() * $post_per_page - $post_per_page : 0;
    $statement = $conection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM torrents ORDER BY $column ASC LIMIT $begin, $post_per_page");
    $statement->execute();

    return $torrents = $statement->fetchAll();
}

////////////////////////////////////////////////////
// THIS FUNCTIONS WILL ONLY BE USED IN SEARCH.PHP //
////////////////////////////////////////////////////

function torrents_byColumn_searchDESC($post_per_page, $conection, $word, $column)
{
    $begin = get_page() > 1 ? get_page() * $post_per_page - $post_per_page : 0;
    $statement = $conection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM torrents WHERE name LIKE :word ORDER BY $column DESC LIMIT $begin, $post_per_page");
    $statement->execute(array("word" => "%$word%"));

    return $torrents = $statement->fetchAll();
}

function torrents_byColumn_searchASC($post_per_page, $conection, $word, $column)
{
    $begin = get_page() > 1 ? get_page() * $post_per_page - $post_per_page : 0;
    $statement = $conection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM torrents WHERE name LIKE :word ORDER BY $column ASC LIMIT $begin, $post_per_page");
    $statement->execute(array("word" => "%$word%"));

    return $torrents = $statement->fetchAll();
}

// This function will only be uses in pagination.php // 
function number_of_pages($post_per_page, $conection)
{
    $total_torrents = $conection->prepare("SELECT FOUND_ROWS() as total");
    $total_torrents->execute();
    $total_torrents = $total_torrents->fetch()["total"];

    $number_of_pages = ceil($total_torrents / $post_per_page);

    return $number_of_pages;
}

function clean_string($word)
{
    $word = trim($word);
    $word = htmlspecialchars($word);
    $word = stripslashes($word);

    return $word;
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

function get_torrentsize_byts($file_name)
{
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

    return (int)$size;
}

function bytes_to_string($bytes)
{
    $kb = 1000;
    $mb = 1000000;
    $gb = 1000000000;
    $tb = 100000000000;

    if($bytes < $mb)
    {
        return round($bytes / $kb, 1) . " KB";
    }
    elseif($bytes >= $mb && $bytes < $gb) 
    {
        return round($bytes / $mb, 1) . " MB";
    }
    elseif($bytes >= $gb && $bytes < $tb)  
    {
        return round($bytes / $gb, 1) . " GB";
    }
    else
    {
        return round($bytes / $tb, 1) . " TB";
    }
}

?>