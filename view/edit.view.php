<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/index.css">
    
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <title>Upload</title>
</head>
<body>
    <?php require "header.php"; ?>

    <div class="wrap upload">
        <div class="top">
            <h1>
            Edit Torrent
            <a id="torrentID-edit" href="single.php?ID=<?php echo $torrent["ID"]; ?>"><?php echo "#" . $torrent["ID"];?></a>
            </h1>
        </div>

        <form class="upload__form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">  
            <div class="upload__form optional">
                <div class="row">
                    <label for="optional_display_name">Torrent display name (optional)</label>
                    <input id="optional_display_name" name="optional_display_name" value="<?php echo $torrent["name"]; ?>" type="text" placeholder="Display Name">
                </div>

                <div class="row">
                    <label for="torrent_magnet">Torrent Magnet (optional)</label>
                    <input id="torrent_magnet" name="torrent_magnet" value="<?php echo $torrent["magnet"]; ?>" type="text" placeholder="Torrent Magnet">
                </div>
            </div>

            <div class="description__container">
                <label for="description">Description</label>
                <textarea name="description" id="description"><?php echo $torrent["description"]; ?></textarea>
            </div>

            <button class="registerbtn__submit" name="update_torrentbtn" style="width: 110px;" type="Submit">Save Changes</button>
        </form>

        <hr>

        <div class="danger-panel">
            <div><h3>Danger Zone</h3></div>
            <div class="danger-panel__container">
                <div>
                    <p>Delete torrent.</p>
                    <form  action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                        <button class="danger-panel__btn" name="delete_torrentbtn" type="submit">Delete</button>
                    </form>
                </div>
                <div>You will not be able to recover this torrent.</div>
            </div>
        </div>
    </div>

    <?php echo '<script type="text/javascript" src="js/user_menu.js"></script>'; ?>
</body>
</html>