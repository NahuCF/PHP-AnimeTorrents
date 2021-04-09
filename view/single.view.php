<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/index.css">

    <title><?php echo $torrent["name"] . " :: NyaaCopy"; ?></title>
</head>
<body style="position: relative"> 

    <div id="report-container" class="report-container">
        <div class="report">
            <div class="report__top">
                <h4><?php echo "Report torrent #" . $torrent["ID"]; ?></h4>
                <button><i class="fas fa-times"></i></button>
            </div>
            <div class="report__bottom">
                <div class="report__text">
                    Before submitting a report, please check that the torrent actually breaks
                    <a href="rules">the rules</a>. Useless reports like "download is slow" or "thanks" can get you banned from the site.
                </div>
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <label for="report-area">Report Reason</label>
                    <textarea name="reportesito" id="report-area" maxlength="500"></textarea>
                    <div class="report__butons">
                        <button id="button_close" class="button_close" type="button">Close</button>
                        <button class="button_report" type="submit">Report</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require "header.php"; ?>

    <div class="single-wrap">
        <div class="singletop-container">
            <div class="top">
                <h3>
                    <?php if(isset($_SESSION["user"]) && $_SESSION["user"] == $torrent["torrentOwnerName"]):?>
                        <a href="<?php echo "edit?t=" . $torrent["ID"]?>" style="color: black;"><i class="fas fa-pencil-alt"></i></a>
                    <?php endif; ?>
                    <?php echo $torrent["name"]; ?>
                </h3>
            </div>
            <div class="center">
                <div class="center-container">
                    <div class="center-container__row">
                        <div class="center_container__left">Submitter: </div>
                        <div><a href="<?php echo "torrents?u=" . $torrent["torrentOwnerName"]; ?>"><?php echo $torrent["torrentOwnerName"]; ?></a></div>
                    </div>
                    <div class="center-container__row">
                        <div class="center_container__left">Information: </div>
                        <div>No information</div>
                    </div>
                    <div class="center-container__row">
                        <div class="center_container__left">Size: </div>
                        <div><?php echo bytes_to_string($torrent["size"]); ?></div>
                    </div>
                </div>
                <div class="center-container">
                    <div class="center-container__row">
                        <div class="center_container__left">Date: </div>
                        <div><?php echo date('Y-m-d H:i', strtotime($torrent["date"])); ?></div>
                    </div>
                    <div class="center-container__row">
                        <div class="center_container__left">Likes: </div>
                        <div style="color: green;"><?php echo $torrent["likes"]; ?></div>
                    </div>
                    <div class="center-container__row">
                        <div class="center_container__left">Dislikes: </div>
                        <div style="color: red;"><?php echo $torrent["dislikes"]; ?></div>
                    </div>
                </div>
            </div> 
            <div class="bottom">
                <div>
                    <a href="<?php echo "dowload?f=" . $torrent["ID"]; ?>">
                        <i class="fas fa-download"></i>
                        Dowload Torrent
                    </a>
                    <div>
                        <span> or </span>
                        <?php if(!empty($torrent["magnet"])): ?>
                            <a href="<?php echo $torrent["magnet"]; ?>">
                                <i class="fas fa-magnet"></i>
                                Magnet
                            </a>
                        <?php else: ?>
                            <a id="magnet__red" href="<?php echo $torrent["magnet"]; ?>">
                                <i id="magnet__red" class="fas fa-magnet"></i>
                                Magnet
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

               <?php if(isset($_SESSION["user"])): ?>
                    <button id="report-btn" class="report-btn">Report</button>
                <?php endif; ?>
            </div>
        </div>  

        <div class="singlemiddle-container">
            <?php if(empty($torrent["description"])): ?>
                <h3>No description</h3>
            <?php else: ?>
                <p><?php echo $torrent["description"]; ?></p>
            <?php endif; ?>
        </div>

        <div class="comments-container">
            <div class="comments-container__top">
                <h3><?php echo "Comments - " . sizeof($comments); ?></h3>
            </div>

            <?php if(!empty($comments)): ?>
                <div class="wrap-container">
                    <?php $comments_size = sizeof($comments)?>
                    <?php for($i = 0; $i < $comments_size; $i++): ?>
                        <div class="comment" id="<?php echo "com-" . $i + 1 ?>">
                            <div class="comment-photo">
                                <div class="comment-user"><a href="<?php echo "torrents?u=" . $comments[$i]["commentOwnerName"]; ?>"><?php echo $comments[$i]["commentOwnerName"]; ?></a></div>
                                <img src="<?php echo "./imgs/" . $comments[$i]["photo_name"]; ?>" alt="avatar">
                            </div>
                            <div class="comment-container">
                                <div><a href="<?php echo "#com-" . $i + 1 ?>"><?php echo retrive_comment_date($comments[$i]); ?></a></div>
                                <div class="comment-text"><?php echo $comments[$i]["comment"]; ?></div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>

            <?php if(isset($_SESSION["user"])): ?>
                <form class="comment__form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
                    <label for="comment">Make a comment</label>
                    <textarea name="comment" id="comment"></textarea>
                    <button class="comment__form-button" type="submit">Submit</button>
                </form>
            <?php endif; ?>
            
        </div>
    </div>
    
    <?php echo '<script type="text/javascript" src="js/header.js"></script>'; ?>
    <?php echo '<script type="text/javascript" src="js/user_menu.js"></script>'; ?>
    <?php echo '<script type="text/javascript" src="js/report.js"></script>'; ?>
</body>
</html>
