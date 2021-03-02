<?php session_start();

require "admin/config.php";
require "functions.php";

$conection = conection_to_database($bd_config);

if(!$conection)
{
    header("location: error.php");
}


require "view/index.view.php";

?>