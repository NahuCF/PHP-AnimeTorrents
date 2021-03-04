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
    
    <div class="wraper">
        <table>
            <thead>
                <tr>
                    <th class="thead__name">Name</th>
                    <th class="thead__link">Link</th>
                    <th class="thead__size hide"><a href="#">Size</a></th>
                    <th class="thead__date hide">Date</th>
                    <th class="thead__uparrow"><a href="#"><i class="fas fa-arrow-down"></i></a></th>
                    <th class="thead__downarrow"><a href="#"><i class="fas fa-arrow-up"></i></a></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($torrents as $torrent): ?>
                    <tr>
                        <td class="colaps"><a href="#"><?php echo $torrent["name"] ?></a></td>
                        <td class="text-center">
                            <a href="#"><i class="fas fa-download"></i></a>
                            <a href="<?php echo $torrent["magnet"] ?>"><i class="fas fa-magnet"></i></a>
                        </td>
                        <td class="text-center hide">153.3 MB</td>
                        <td class="text-center hide"><?php echo $torrent["date"] ?></td>
                        <td class="text-center">1</td>
                        <td class="text-center">2</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <?php echo '<script type="text/javascript" src="js/user_menu.js"></script>'; ?>
</body>
</html>