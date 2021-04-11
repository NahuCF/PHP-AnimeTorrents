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

    // Bring the info of the torrent
    $statement = $conection->prepare("SELECT * FROM torrents WHERE ID = :ID LIMIT 1");
    $statement->execute(array("ID" => $torrent_id));
    $torrent = $statement->fetch();

    if(!empty($torrent))
    {
        $statement = $conection->prepare("SELECT * FROM comments WHERE torrentID = :torrent_id");
        $statement->execute(array("torrent_id" => $torrent_id));
        $comments = $statement->fetchAll();

        if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["comment"])) //Make a comment
        {
            $photo_name = '';
            $photo_name = $_SESSION["userType"] == "God" ? "god.jpg" : ($_SESSION["userType"] == "Admin" ? "admin.jpg" : "user.png");
            
            $statement = $conection->prepare("INSERT INTO comments values(null, :comment, :user, :user_id, :torrent_id, null, :photo_name)");
            $statement->execute(
                array(
                    "comment" => clean_string($_POST["comment"]),
                    "user" => $_SESSION["user"],
                    "user_id" => $_SESSION["userID"],
                    "torrent_id" => $torrent_id,
                    "photo_name" => $photo_name
                )
            );  

            //header("Location: single?ID=" . $torrent_id);
        }
        else if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["reportesito"])) //Report a torrent
        {
            $text = clean_string($_POST["reportesito"]);

            //If this torrent has already been reported, bring them and add 1 to reported_times
            $statement = $conection->prepare("SELECT reported_times FROM reports where torrentID = :torrent_id LIMIT 1");
            $statement->execute(array("torrent_id" => $torrent_id));
            $coincidences = $statement->fetchAll();

            if(!empty($coincidences))
            {
                //Add 1 to all the torrents
                $statement = $conection->prepare("UPDATE reports SET reported_times = reported_times + 1 WHERE torrentID = :torrent_id");
                $statement->execute(array("torrent_id" => $torrent_id));

                //Insert the report
                $statement = $conection->prepare("INSERT INTO reports values(null, :torrent_name, :torrent_id, :user_id, :text, null, :reported_times)");
                $statement->execute(
                    array(
                        "torrent_name" => $torrent["name"],
                        "torrent_id" => $torrent_id,
                        "user_id" => $_SESSION["userID"],
                        "text" => $text,
                        "reported_times" => $coincidences[0]["reported_times"] + 1
                    )
                );
            }
            else
            {
                $statement = $conection->prepare("INSERT INTO reports values(null, :torrent_name, :torrent_id, :user_id, :text, null, 1)");
                $statement->execute(
                    array(
                        "torrent_name" => $torrent["name"],
                        "torrent_id" => $torrent_id,
                        "user_id" => $_SESSION["userID"],
                        "text" => $text
                    )
                );
            }

            header("Location: single?ID=" . $torrent_id);
        }

        if(isset($_GET["report_mode"]) && $_GET["report_mode"] == "true")
        {
            $statement = $conection->prepare("SELECT * FROM reports WHERE torrentID = :torrent_id");
            $statement->execute(array("torrent_id" => $torrent_id));
            $reports = $statement->fetchAll();

            if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["solved-button"]) && !empty($reports))
            {
                //Substract 1 to all the reports and delete the report solved
                $statement = $conection->prepare("UPDATE reports SET reported_times = reported_times - 1 WHERE torrentID = :torrent_id");
                $statement->execute(array("torrent_id" => $torrent_id));

                $statement = $conection->prepare("DELETE FROM reports WHERE ID = :report_id LIMIT 1");
                $statement->execute(array("report_id" => clean_string($_POST["report-id"])));
                
                header("Location: single?ID=" . $torrent_id . "&report_mode=true");
            }
        }
    }
    else
    {
        header("Location: index");
    }
}
else
{
    header("Location: index");
}

require "view/single.view.php";

?>