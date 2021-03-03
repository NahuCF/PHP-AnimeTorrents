<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/index.css">

    <title>Register</title>
</head>
<body>
    <?php require "header.php"; ?>

    <div class="wrap">
        <div class="top">
            <h1>Register</h1>
            <p><strong>Important:</strong> Do not attempt to register using a VPN or proxy, almost all are blocked from registering due to malware and spam. If you try anyway your account will not work by default and will need to be manually activated over IRC which is not guaranteed to happen.</p>
        </div>
        <form class="register__form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
            <div class="row">
                <label for="username">Username</label>
                <input id="username" name="username" type="text" placeholder="Username">
                <?php if(!empty($user_error)): ?>
                    <div class="error_message"><?php echo $user_error ?></div>
                <?php endif; ?>
            </div>
            
            <div class="row">
                <label for="email">Email</label>
                <input id="email" name="email" type="text" placeholder="Email">
                <?php if(!empty($email_error)): ?>
                    <div class="error_message"><?php echo $email_error ?></div>
                <?php endif; ?>
            </div>

            <div class="row">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" placeholder="Password">
                <?php if(!empty($password_error)): ?>
                    <div class="error_message"><?php echo $password_error ?></div>
                <?php endif; ?>
            </div>

            <div class="row">
                <label for="password__confirm">Password</label>
                <input id="password__confirm" name="password__confirm" type="password" placeholder="Password (confirm)">
                <?php if(!empty($password_error_confirm)): ?>
                    <div class="error_message"><?php echo $password_error_confirm ?></div>
                <?php endif; ?>
            </div>

            <button class="registerbtn__submit" type="submit">Register</button>
        </form>
    </div>

    <?php echo '<script type="text/javascript" src="js/user_menu.js"></script>'; ?>
</body>
</html>