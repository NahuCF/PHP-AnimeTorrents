<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/index.css">
    
    <title>Login</title>
</head>
<body>
    <?php require "header.php"; ?>
    
    <div class="wrap">
        <?php if(!empty($error)): ?>
            <div class="login_errorbox">
                <p><?php echo $error; ?></p>
            </div>
        <?php endif; ?>

        <div class="top">
            <h1>Login</h1>
        </div>
        <form class="register__form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
            <div class="row">
                <label for="username">Username</label>
                <input id="username" name="username" type="text" placeholder="Username">
            </div>

            <div class="row">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" placeholder="Password">
            </div>

            <button class="registerbtn__submit" type="submit">Login</button>
        </form>
    </div>

    <?php echo '<script type="text/javascript" src="js/user_menu.js"></script>'; ?>
</body>
</html>