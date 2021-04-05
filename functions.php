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

function clean_string($word)
{
    $word = trim($word);
    $word = htmlspecialchars($word);
    $word = stripslashes($word);

    return $word;
}

// This function will only be uses in pagination.php // 
function number_of_pages($rows_per_page, $conection)
{
    $total_rows = $conection->prepare("SELECT FOUND_ROWS() as total");
    $total_rows->execute();
    $total_rows = $total_rows->fetch()["total"];

    $number_of_pages = ceil($total_rows / $rows_per_page);

    return $number_of_pages;
}

function check_o_and_c($path)
{
    if($_GET['o'] != "desc" && $_GET['o'] != "asc") // Check o
    {
        header("Location: " . $path);
    }

    if($_GET['c'] != "size" && $_GET['c'] != "date" && $_GET['c'] != "likes" && $_GET['c'] != "dislikes") // Check c
    {
        header("Location: " . $path);
    }
    
}

// This is thw worst shit of this page, but it works... //
function get_rows($rows_per_page, $db, $conection, $optional)
{   
    $begin = get_page() > 1 ? get_page() * $rows_per_page - $rows_per_page : 0;

    if(isset($optional["order"]) && isset($optional["column"]) && isset($optional["word"]) && isset($optional["user_name"]))  // In torrents with word and filters
    {
        $column = $optional["column"];
        $order = $optional["order"];
        $word = $optional["word"];

        $statement = $conection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM $db WHERE name LIKE :word and torrentOwnerName = :user_name ORDER BY $column $order LIMIT $begin, $rows_per_page");
        $statement->execute(array("word" => "%$word%","user_name" => $optional["user_name"]));

        return $statement->fetchAll();
    }
    else if(isset($optional["order"]) && isset($optional["column"]) && isset($optional["user_name"]))  // In torrents
    {
        $column = $optional["column"];
        $order = $optional["order"];
        
        $statement = $conection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM $db WHERE torrentOwnerName = :user_name ORDER BY $column $order LIMIT $begin, $rows_per_page");
        $statement->execute(array("user_name" => $optional["user_name"],));
        
        return $statement->fetchAll();
    }
    else if(isset($optional["order"]) && isset($optional["column"]) && isset($optional["word"])) // In search
    {
        $column = $optional["column"];
        $order = $optional["order"];
        $word = $optional["word"];
    
        $statement = $conection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM $db WHERE name LIKE :word ORDER BY $column $order LIMIT $begin, $rows_per_page");
        $statement->execute(array("word" => "%$word%"));

        return $statement->fetchAll();
    }
    else if(isset($optional["order"]) && isset($optional["column"])) // In index
    {
        $column = $optional["column"];
        $order = $optional["order"];

        $statement = $conection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM $db ORDER BY $column $order LIMIT $begin, $rows_per_page");
        $statement->execute();
        
        return $statement->fetchAll();
    }
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

    return $size;
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
    else if($bytes >= $mb && $bytes < $gb) 
    {
        return round($bytes / $mb, 1) . " MB";
    }
    else if($bytes >= $gb && $bytes < $tb)  
    {
        return round($bytes / $gb, 1) . " GB";
    }
    else
    {
        return round($bytes / $tb, 1) . " TB";
    }
}

function retrive_comment_date($comment)
{
    $time = time() - strtotime($comment["date"]) - 18000; 

    $days = date("d", $time) - 1;
    $hours = date("H", $time);
    $minutes = date("i", $time);
    $secs = date("s", $time);
    
    if($days >= 1)
    {
        return $days . " days " . $hours . " hours " . $minutes . " minutes " . $secs . " seconds ago";
    }
    else if($hours >= 1)
    {
        return $hours . " hours " . $minutes . " minutes " . $secs . " seconds ago";
    }
    else if($minutes >= 1) 
    {
        return $minutes . " minutes " . $secs . " seconds ago";
    }
    else
    {
        return $secs . " seconds ago";
    }
}

?>