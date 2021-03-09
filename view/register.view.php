<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/index.css">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
                <?php if(empty($user_error)): ?>
                    <label for="username">Username</label>
                    <input id="username" name="username" type="text" placeholder="Username">
                <?php else: ?>
                    <label class="label__error" for="username">Username</label>
                    <input class="input__errror" id="username" name="username" type="text" placeholder="Username">
                    <div class="error_message"><?php echo $user_error; ?></div>
                <?php endif; ?>
            </div>
            
            <div class="row">
                <?php if(empty($email_error) && empty($email_error_list)): ?>
                    <label for="email">Email</label>
                    <input id="email" name="email" type="text" placeholder="Email">
                <?php elseif(!empty($email_error)): ?>
                    <label class="label__error" for="email">Email</label>
                    <input class="input__errror" id="email" name="email" type="text" placeholder="Email">
                    <div class="error_message"><?php echo $email_error ?></div>
                <?php else: ?>
                    <label class="label__error" for="email">Email</label>
                    <input class="input__errror" id="email" name="email" type="text" placeholder="Email">
                    <div class="error_message">
                        <ul>
                            <?php echo $email_error_list; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>

            <div class="row">
                <?php if(empty($password_error) && empty($password_error_list)): ?>
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="Password">
                <?php elseif(!empty($password_error)): ?>
                    <label class="label__error" for="password">Password</label>
                    <input class="input__errror" id="password" name="password" type="password" placeholder="Password">
                    <div class="error_message"><?php echo $password_error ?></div>
                <?php else: ?>
                    <label class="label__error" for="password">Password</label>
                    <input class="input__errror" id="password" name="password" type="password" placeholder="Password">
                    <div class="error_message">
                        <ul>
                            <?php echo $password_error_list; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>

            <div class="row">
                <label for="password__confirm">Password</label>
                <input id="password__confirm" name="password__confirm" type="password" placeholder="Password (confirm)">
            </div>
            
            <?php if($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST["g-recaptcha-response"])): ?>
                <?php echo "The response parameter is missing." ?>
            <?php endif; ?>
            <div class="g-recaptcha" data-sitekey="6LcQyHcaAAAAANN1Ve1GUVJJF0b3pfeQQIKCq4a0"></div>
            <br/>
            <button class="registerbtn__submit" type="Submit">Register</button>
        </form>
    </div>

    <?php echo '<script type="text/javascript" src="js/user_menu.js"></script>'; ?>
</body>
</html>