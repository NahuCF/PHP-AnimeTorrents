<header>
    <a href="index.php">asd</a>
    <a href="upload.php">UPLOAD</a>
    <form action="search.php" method="GET">
        <input class="input_search" name="s" type="text" placeholder="Search...">
        <div class="button__headercontenedor" >
            <button class="header__submitbtn" type="submit"><i class="fa fa-search fa-fw"></i></button>
        </div>
    </form>
    <ul class="user__list">
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