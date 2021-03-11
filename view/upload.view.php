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
    <?php require "user-header.php"; ?>

    <div class="wrap upload">
        <div class="top">
            <h1>Upload</h1>
        </div>

        <form class="upload__form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <label for="upload__torrent">Torrent File</label>
                <div class="browse_contenedor">
                    <label class="btn__browse" id="btn__browse" for="upload__torrent">
                        <span>Browse...</span>
                    </label>
                    <input id="torrent__file" name="writen_torrent" type="text" readonly>
                </div>

                <div class="hide__admin">
                    <input name="torrent_data" id="upload__torrent" accept=".torrent" type="file" placeholder="Browse...">
                </div>

                <?php if(!empty($error)): ?>
                    <div class="error_message"><?php echo $error; ?></div>
                <?php endif; ?>
            </div>
            
            <div class="upload__form optional">
                <div class="row">
                    <label for="optional_display_name">Torrent display name (optional)</label>
                    <input id="optional_display_name" name="optional_display_name" type="text" placeholder="Display Name">
                </div>

                <div class="row">
                    <label for="torrent_magnet">Torrent Magnet (optional)</label>
                    <input id="torrent_magnet" name="torrent_magnet" type="text" placeholder="Torrent Magnet">
                </div>
            </div>

            <div class="description__container">
                <label for="description">Description</label>
                <textarea name="description" id="description"></textarea>
            </div>
            
            <?php if($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST["g-recaptcha-response"])): ?>
                <?php echo "The response parameter is missing." ?>
            <?php endif; ?>
            <div class="g-recaptcha" data-sitekey="6LcQyHcaAAAAANN1Ve1GUVJJF0b3pfeQQIKCq4a0"></div>
            <br/>

            <button class="registerbtn__submit" type="Submit">Upload</button>
        </form>
    </div>

    <?php echo '<script type="text/javascript" src="js/upload.js"></script>'; ?>
    <?php echo '<script type="text/javascript" src="js/user_menu.js"></script>'; ?>
</body>
</html>