<?php session_start();

require "admin/config.php";
require "functions.php";

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("Location: error");
}

if(isset($_GET["c"]) && isset($_GET["o"]))
{
    check_o_and_c("index");

    $optional = array(
        "order" => clean_string($_GET["o"]), 
        "column" => clean_string($_GET["c"])
    );
    $rows = get_rows($page_config["rows_per_page"], "torrents", $conection, $optional);
}
else
{   
    $optional = array("order" => "DESC", "column" => "date");
    $rows = get_rows($page_config["rows_per_page"], "torrents", $conection, $optional);
}

require "view/index.view.php";

?>