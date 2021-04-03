<?php if(basename($_SERVER["PHP_SELF"], ".php") == "admin"): ?>
    <header>
        <div class="header-top">
            <a style="font-size: 18px;" href="../index">Nyaa Copy</a>
            <button id="hamburger-btn">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

        <div class="header-bottom-container" id="header-bottom-container">
            <?php if(isset($_SESSION["user"])): ?>
                <div><a href="../upload">Upload</a></div>
            <?php endif; ?>

            <div class="header-bottom">
                <form class="form-header" action="search" method="GET">
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

                        <button class="user__type" id="user__type">
                            <i class="far fa-user"></i>
                            <?php if(isset($_SESSION["user"])): ?>
                                <?php echo $_SESSION["user"]; ?>
                            <?php else: ?>
                                <?php echo "Guest" ?>
                            <?php endif; ?>
                            <i class="fas fa-caret-down"></i>
                        </button>

                        <ul class="sub__menu" id="sub__menu">
                            <?php if(isset($_SESSION["user"])): ?>

                                <?php if($_SESSION["userType"] === "God"): ?>
                                    <li>
                                        <a class="god-icon" href="admin">
                                            <i class="fas fa-user-cog"></i>
                                            God List
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <li>
                                    <a href="../profile">
                                        <i class="fas fa-cog"></i>
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="../logout">
                                        <i class="fa fa-times fa-fw"></i>
                                        Logout
                                    </a>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="../login">
                                        <i class="fas fa-sign-in-alt"></i>
                                        Login
                                    </a>
                                </li>
                                <li>
                                    <a href="../register">
                                        <i class="fas fa-pencil-alt"></i>
                                        Register
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                        
                    </li>
                </ul>   
            </div>
        </div>
    </header>
<?php else: ?>
    <header>
        <div class="header-top">
            <a style="font-size: 18px;" href="index">Nyaa Copy</a>
            <button id="hamburger-btn">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

        <div class="header-bottom-container" id="header-bottom-container">
            <?php if(isset($_SESSION["user"])): ?>
                <div><a href="upload">Upload</a></div>
            <?php endif; ?>

            <div class="header-bottom">

                <form class="form-header" action="<?php echo isset($_GET["u"]) ? "torrents" : "search"; ?>" method="GET">
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

                        <button class="user__type" id="user__type">
                            <i class="far fa-user"></i>
                            <?php if(isset($_SESSION["user"])): ?>
                                <?php echo $_SESSION["user"]; ?>
                            <?php else: ?>
                                <?php echo "Guest" ?>
                            <?php endif; ?>
                            <i class="fas fa-caret-down"></i>
                        </button>

                        <ul class="sub__menu" id="sub__menu">
                            <?php if(isset($_SESSION["user"])): ?>

                                <?php if($_SESSION["userType"] === "God"): ?>
                                    <li>
                                        <a class="god-icon" href="admin/admin">
                                            <i class="fas fa-user-cog"></i>
                                            God List
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <li>
                                    <a href="profile">
                                        <i class="fas fa-cog"></i>
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="logout">
                                        <i class="fa fa-times fa-fw"></i>
                                        Logout
                                    </a>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="login">
                                        <i class="fas fa-sign-in-alt"></i>
                                        Login
                                    </a>
                                </li>
                                <li>
                                    <a href="register">
                                        <i class="fas fa-pencil-alt"></i>
                                        Register
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                        
                    </li>
                </ul>  
                 
            </div>
        </div>
    </header>
<?php endif; ?>