<header>
    <a href="index.php">asd</a>
    <ul class="user__list">
        <a href="upload.php">UPLOAD</a>
        <li class="first__list">
            <a class="user__type" id="user__type" href="#">
                <i class="far fa-user"></i>
                <?php echo $_SESSION["user"]; ?>
                <i class="fas fa-caret-down"></i>
            </a>
            <ul class="sub__menu" id="switch">
                <li>
                    <a href="logout.php">
                        <i class="fa fa-times fa-fw"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</header>