<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/index.css">
    
    <title>Upload</title>
</head>
<body>
    <?php require "user-header.php"; ?>

    <div class="wrap">
        <div class="top">
            <h1>Upload</h1>
        </div>

        <form class="register__form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
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
                    <div class="error_message"><?php echo $error ?></div>
                <?php endif; ?>
            </div>
            
            <div class="row">
                <label for="optional_display_name">Torrent display name (optional)</label>
                <input id="optional_display_name" name="optional_display_name" type="text" placeholder="Display Name">
            </div>

            <div class="row">
                <label for="torrent_magnet">Torrent Magnet (optional)</label>
                <input id="torrent_magnet" name="torrent_magnet" type="text" placeholder="Torrent Magnet">
            </div>
            
            <button class="registerbtn__submit" type="submit">Upload</button>
        </form>
    </div>

    <?php echo '<script type="text/javascript" src="js/upload.js"></script>'; ?>
    <?php echo '<script type="text/javascript" src="js/user_menu.js"></script>'; ?>
</body>
</html>