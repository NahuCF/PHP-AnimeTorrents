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
        
    <div class="wrap profile">
        <h2>Profile of <strong>NahuCF</strong></h2>
        <div class="profile-container">
            <img class="avatar" src="imgs/default.png" alt="avatar">
            <div class="profile-rows__container">
                <div>
                    <div class="profile-row">  
                        <div>User ID:</div>
                        <div><?php echo $user["ID"]; ?></div>
                    </div>
                    <div class="profile-row">  
                        <div>User Class:</div>
                        <div><?php echo $user["userType"]; ?></div>
                    </div>
                    <div class="profile-row">  
                        <div>User Created on:</div>
                        <div><?php echo $user["date"]; ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="profile__tabs">
            <div class="active"><a class id="profile__tabs-password" href="#">Passsword</a></div>
            <div><a id="profile__tabs-email" href="#">Email</a></div>
        </div>

        <div class="profile__forms">
            <div class="profile__form-password">
                <form class="register__form" name="password_form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                    <div class="row">
                        <?php if(!empty($current_password_error)): ?>
                            <label for="current_password">Current Password</label>
                            <input id="current_password" name="current_password" type="password" placeholder="Currrent Password">
                            <div class="error_message"><?php echo $current_password_error ?></div>
                        <?php else: ?>
                            <label for="current_password">Current Password</label>
                            <input id="current_password" name="current_password" type="password" placeholder="Currrent Password">
                        <?php endif; ?>
                    </div>

                    <div class="row">
                        <?php if(empty($password_error) && empty($password_error_list)): ?>
                            <label for="password">Password</label>
                            <input id="password" name="password" type="password" placeholder="New Password">
                        <?php elseif(!empty($password_error)): ?>
                            <label class="label__error" for="password">Password</label>
                            <input class="input__errror" id="password" name="password" type="password" placeholder="New Password">
                            <div class="error_message"><?php echo $password_error ?></div>
                        <?php else: ?>
                            <label class="label__error" for="password">Password</label>
                            <input class="input__errror" id="password" name="password" type="password" placeholder="New Password">
                            <div class="error_message">
                                <ul>
                                    <?php echo $password_error_list; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="row">
                        <label for="password__confirm">Password</label>
                        <input id="password__confirm" name="password__confirm" type="password" placeholder="New Password (confirm)">
                    </div>
                    <button class="registerbtn__submit" name="updatebtn_password" type="Submit">Update</button>
                </form>
            </div>

            <div class="profile__form-email">
                <div class="row">
                    <label>Current Email</label>
                    <div><?php echo $user["email"]; ?></div>
                </div>

                <form class="register__form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
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
                        <?php if(!empty($password_error_email)): ?>
                            <label for="current_password_email">Password</label>
                            <input id="current_password_email" name="current_password" type="password" placeholder="Current Password">
                            <div class="error_message"><?php echo $password_error_email ?></div>
                        <?php else: ?>
                            <label for="current_password_email">Password</label>
                            <input id="current_password_email" name="current_password" type="password" placeholder="Current Password">
                        <?php endif; ?>
                    </div>
                    
                    <button class="registerbtn__submit" name="updatebtn_email" type="Submit">Update</button>
                </form>
            </div>
        </div>
    </div>
    
    <?php echo '<script type="text/javascript" src="js/user_menu.js"></script>'; ?>
    <?php echo '<script type="text/javascript" src="js/profile.js"></script>'; ?>
</body>