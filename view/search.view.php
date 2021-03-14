<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/index.css">

    <title>Animu</title>
</head>
<body>
    <?php if(isset($_SESSION["user"])): ?>
        <?php require "user-header.php"; ?>
    <?php else: ?>
        <?php require "header.php"; ?>
    <?php endif; ?>
    
    <?php if(!empty($error)): ?>
        <div class="wrap">
            <h1 class="search__h1"><?php echo $error; ?></h1>
        </div>
    <?php else: ?>
        <div class="wraper">
            <?php if(isset($_GET["u"])): ?>
                <h3><?php echo "Browsing " . clean_string($_GET["u"]) . "' torrents (" . sizeof($torrents) . ")"; ?></h3>
            <?php endif; ?>
            <table>
                <thead>
                    <?php require "view/table_head.php"; ?>
                </thead>
                <tbody>
                    <?php require "view/table_body.php" ?>
                </tbody>
            </table>
            <div class="pagination__container">
                <?php require "view/pagination.php"; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php echo '<script type="text/javascript" src="js/user_menu.js"></script>'; ?>
</body>
</html>