<?php session_start();

require "admin/config.php";
require "functions.php";

$conection = conection_to_database($db_config);
if(!$conection)
{
    header("Location: error");
}

if(isset($_GET["ID"]))
{
    $torrent_id = clean_string($_GET["ID"]);

    if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["comment"])) //Make a comment
    {
        $photo_name = '';
        $photo_name = $_SESSION["userType"] == "God" ? "god.jpg" : ($_SESSION["userType"] == "Admin" ? "admin.jpg" : "user.png");
        
        $statement = $conection->prepare("INSERT INTO comments values(null, :comment, :user, :user_id, :torrent_id, null, :photo_name)");
        $statement->execute(
            array(
                "comment" => clean_string($_POST["comment"]),
                "user" => $_SESSION["user"],
                "user_id" => (int)$_SESSION["userID"],
                "torrent_id" => $torrent_id,
                "photo_name" => $photo_name
            )
        );  

        header("Location: single?ID=" . $torrent_id);
    }
    else if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["reportesito"])) //Report a torrent
    {
        $text = clean_string($_POST["reportesito"]);

        $statement = $conection->prepare("INSERT INTO reports values(null, :torrent_id, :user_id, :text)");
        $statement->execute(
            array(
                "torrent_id" => $torrent_id,
                "user_id" => $_SESSION["userID"],
                "text" => $text
            )
        );

        header("Location: single?ID=" . $torrent_id);
    }

    // Bring the info of the torrent
    $statement = $conection->prepare("SELECT * FROM torrents WHERE ID = :ID LIMIT 1");
    $statement->execute(array("ID" => $torrent_id));
    $torrent = $statement->fetch();

    if(empty($torrent))
    {
        header("Location: index");
    }
    else
    {
        $statement = $conection->prepare("SELECT * FROM comments WHERE torrentID = :torrent_id");
        $statement->execute(array("torrent_id" => $torrent_id));
        $comments = $statement->fetchAll();
    }
}
else
{
    header("Location: index");
}

require "view/single.view.php";

?>