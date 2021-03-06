<header>
    <a href="index.php">asd</a>

    <form action="search.php" method="GET">
        <input class="input_search" name="w" type="text" placeholder="Search...">
        <div class="button__headercontenedor" >
            <button class="header__submitbtn" type="submit"><i class="fa fa-search fa-fw"></i></button>
        </div>
    </form>

    <ul class="user__list">
        <li class="first__list">
            <a class="user__type" id="user__type" href="#">
                <i class="far fa-user"></i>
                Guest
                <i class="fas fa-caret-down"></i>
            </a>
            <ul class="sub__menu" id="switch">
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
            </ul>
        </li>
    </ul>
</header>