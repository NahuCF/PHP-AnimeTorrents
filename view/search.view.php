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
            <h1 class="search__h1"><?php echo $error ?></h1>
        </div>
    <?php else: ?>
        <div class="wraper">
            <table>
                <thead>
                    <?php require "view/table_head.php"; ?>
                </thead>
                <tbody>
                    <?php foreach($torrents as $torrent): ?>
                        <tr>
                            <td class="colaps"><a href="#"><?php echo $torrent["name"] ?></a></td>
                            <td class="text-center">
                                <a href="#"><i class="fas fa-download"></i></a>
                                <?php if(!empty($torrent["magnet"])): ?>
                                    <a href="<?php echo $torrent["magnet"] ?>"><i class="fas fa-magnet"></i></a>
                                <?php else: ?>
                                    <a href="#" id="magnet__noclick" ?><i class="fas fa-magnet" id="magnet__red"></i></a>
                                <?php endif; ?>
                            </td>
                            <td class="text-center hide"><?php echo $torrent["size"]; ?></td>
                            <td class="text-center hide"><?php echo date('y-m-d h:m', strtotime($torrent["date"])); ?></td>
                            <td class="text-center">1</td>
                            <td class="text-center">2</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

    
    <?php echo '<script type="text/javascript" src="js/user_menu.js"></script>'; ?>
</body>
</html>