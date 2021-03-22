<header>
    <a href="index.php">asd</a>
    <?php if(isset($_SESSION["user"])): ?>
        <a href="upload.php">UPLOAD</a>
    <?php endif; ?>
    <form action="search.php" method="GET">
        <?php if(isset($_GET["u"])): ?>
            <input name="u" value="<?php echo clean_string($_GET['u']); ?>" style="pointer-events: none; display: none" type="text">
        <?php endif; ?>
        <input class="input_search" name="w" type="text" placeholder="<?php echo isset($_GET["u"]) ? "Search " . clean_string($_GET["u"]) . "'" . " torrents" : "Search..." ?>">
        <div class="button__headercontenedor" >
            <button class="header__submitbtn" type="submit"><i class="fa fa-search fa-fw"></i></button>
        </div>
    </form>
    <ul class="user__list">
        <li class="first__list">
            <a class="user__type" id="user__type" href="#">
                <i class="far fa-user"></i>
                <?php if(isset($_SESSION["user"])): ?>
                    <?php echo $_SESSION["user"]; ?>
                <?php else: ?>
                    <?php echo "Guest" ?>
                <?php endif; ?>
                <i class="fas fa-caret-down"></i>
            </a>
            <ul class="sub__menu" id="switch">
                <?php if(isset($_SESSION["user"])): ?>
                    <li>
                        <a href="profile.php">
                            <i class="fas fa-cog"></i>
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <i class="fa fa-times fa-fw"></i>
                            Logout
                        </a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="login.php">
                            <i class="fas fa-sign-in-alt"></i>
                            Login
                        </a>
                    </li>
                    <li>
                        <a href="register.php">
                            <i class="fas fa-pencil-alt"></i>
                            Register
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
    </ul>
</header>