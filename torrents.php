<?php session_start();

require "admin/config.php";
require "functions.php";

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("Location: error");
}

if(isset($_GET["u"]))
{
    $user_name = clean_string($_GET["u"]); // Variable to show the owner of the torrents

    if(isset($_GET["w"]))
    {
        if(isset($_GET["c"]) && isset($_GET["o"]))
        {
            check_o_and_c("index");

            $optional = array(
                "order" => clean_string($_GET["o"]), 
                "column" => clean_string($_GET["c"]),
                "word" => clean_string($_GET["w"]),
                "user_name" => $user_name
            );
            $rows = get_rows($page_config["rows_per_page"], "torrents", $conection, $optional);
        }
        else
        {
            $optional = array(
                "order" => "DESC", 
                "column" => "date",
                "word" => clean_string($_GET["w"]),
                "user_name" => $user_name
            );
            $rows = get_rows($page_config["rows_per_page"], "torrents", $conection, $optional);
        }
    }
    else if(isset($_GET["c"]) && isset($_GET["o"]))
    {
        check_o_and_c("index");

        $optional = array(
            "order" => clean_string($_GET["o"]), 
            "column" => clean_string($_GET["c"]),
            "user_name" => $user_name
        );
        $rows = get_rows($page_config["rows_per_page"], "torrents", $conection, $optional);
    }
    else
    {
        $optional = array("order" => "DESC", "column" => "date", "user_name" => $user_name);
        $rows = get_rows($page_config["rows_per_page"], "torrents", $conection, $optional);
    }
}
else
{
    header("Location: index");
}

require "view/torrents.view.php";

?>