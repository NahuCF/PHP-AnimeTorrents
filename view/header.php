<?php $basename = basename(htmlspecialchars($_SERVER["PHP_SELF"]), ".php"); ?>
<header>
        <div class="header-top">
            <a style="font-size: 18px;" href="<?php echo get_relative_path("index"); ?>">Animu</a>
            <button id="hamburger-btn">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

        <div class="header-bottom-container" id="header-bottom-container">
            <?php if(isset($_SESSION["user"])): ?>
                <div><a href="<?php echo get_relative_path("upload"); ?>">Upload</a></div>
            <?php endif; ?>

            <div class="header-bottom">

                <form class="form-header" action="<?php echo get_relative_path("search"); ?>" method="GET">
                    <?php if(isset($_GET["u"])): ?>
                        <input name="u" value="<?php echo clean_string($_GET['u']); ?>" style="pointer-events: none; display: none" type="text">
                    <?php endif; ?>
                    <input name="w" class="<?php 
                            if($basename == "users" || $basename == "admins")
                                echo "input_search input_search--borders";
                            else
                                echo "input_search";
                        ?>" type="text" placeholder="<?php 
                            if(isset($_GET["u"]))
                                echo "Search " . clean_string($_GET["u"]) . "'" . " torrents";
                            else if($basename == "users")
                                echo "Search User...";
                            else if($basename == "admins")
                                echo "Search Admin...";
                            else
                                echo "Search...";
                        ?>">
                    </input> 
                    <?php if($basename != "users" && $basename != "admins"): ?>
                        <div class="button__headercontenedor" >
                            <button aria-label="Button that find the torrent especified" class="header__submitbtn" type="submit"><i class="fa fa-search fa-fw"></i></button>
                        </div>
                    <?php endif; ?>
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
                                        <a href="<?php echo get_relative_path("users"); ?>">
                                            <i class="fas fa-user-cog"></i>
                                            Users
                                        </a>
                                    </li>
                                    <li>
                                        <a class="god-icon" href="<?php echo get_relative_path("admins"); ?>">
                                            <i class="fas fa-user-cog"></i>
                                            Admins
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo get_relative_path("reports"); ?>">
                                            <i class="fas fa-user-cog"></i>
                                            Reports
                                        </a>
                                    </li>
                                    <hr>
                                <?php elseif($_SESSION["userType"] === "Admin"): ?>
                                    <li>
                                        <a href="<?php echo get_relative_path("reports"); ?>">
                                            <i class="fas fa-user-cog"></i>
                                            Reports
                                        </a>
                                    </li>
                                    <hr>
                                <?php endif; ?>
                                <li>
                                    <a href="<?php echo get_relative_path("torrents") . "?u=" . $_SESSION["user"]; ?>">
                                        <i id="fa-magnet--grey" class="fas fa-magnet"></i>
                                        Torrents
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo get_relative_path("profile"); ?>">
                                        <i class="fas fa-cog"></i>
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo get_relative_path("logout"); ?>">
                                        <i class="fa fa-times fa-fw"></i>
                                        Logout
                                    </a>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="<?php echo get_relative_path("login"); ?>">
                                        <i class="fas fa-sign-in-alt"></i>
                                        Login
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo get_relative_path("register"); ?>">
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