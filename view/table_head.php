<?php if(basename($_SERVER["PHP_SELF"], ".php") === "admin"): ?>
    <tr>
        <th class="thead__name">Admin Name</th>
    </tr>
<?php else: ?>
    <tr>
        <th class="thead__name">Name</th>
        <th class="thead__link">Link</th>
        <th class="thead__size hide relative">
            <a href="<?php 
                $column = "size";
                if(isset($_GET["u"]) && isset($_GET["w"])) // In torrents with word and u (user torrent)
                {
                    $user = clean_string($_GET["u"]);
                    $word = clean_String($_GET["w"]);

                    if(isset($_GET["o"]) && isset($_GET["c"]))
                    {
                        if($_GET["o"] == "desc" && $_GET["c"] == $column)
                        {
                            echo "?u=" . $user . "&w=" . $word . "&o=asc&c=" . $column;
                        }
                        else
                        {
                            echo "?u=" . $user . "&w=" . $word . "&o=desc&c=" . $column;
                        }
                    }
                    else
                    {
                        echo "?u=" . $user . "&w=" . $word . "&o=desc&c=" . $column;
                    }
                }
                else if(isset($_GET["u"])) // In torrents with u (user torrent)
                {
                    $user = clean_string($_GET["u"]);

                    if(isset($_GET["o"]) && isset($_GET["c"]))
                    {
                        if($_GET["o"] == "desc" && $_GET["c"] == $column)
                        {
                            echo "?u=" . $user . "&o=asc&c=" . $column;
                        }
                        else
                        {
                            echo "?u=" . $user . "&o=desc&c=" . $column;
                        }
                    }
                    else
                    {
                        echo "?u=" . $user . "&o=desc&c=" . $column;
                    }
                }
                else if(isset($_GET["w"])) // In search
                {
                    if(isset($_GET["o"]) && isset($_GET["c"]))
                    {
                        if($_GET["o"] == "desc" && $_GET["c"] == $column)
                        {
                            echo "?w=" . $word . "&o=asc&c=" . $column;
                        }
                        else
                        {
                            echo "?w=" . $word . "&o=desc&c=" . $column;
                        }
                    }
                    else
                    {
                        echo "?w=" . $word . "&o=desc&c=" . $column;
                    }
                }
                else // In index
                {
                    if(isset($_GET["o"]) && isset($_GET["c"]))
                    {
                        if($_GET["o"] == "desc" && $_GET["c"] == $column)
                        {
                            echo "?o=asc&c=" . $column;
                        }
                        else
                        {
                            echo "?o=desc&c=" . $column;
                        }
                    }
                    else
                    {
                        echo "?o=desc&c=" . $column;
                    }
                }?>">
            </a>
            Size
            <div class="arrows_contenedor">
                <?php if(isset($_GET["c"]) && $_GET["c"] == "size" && $_GET["o"] == "desc"): ?>
                    <i class="fas fa-sort-down"></i>
                <?php elseif(isset($_GET["c"]) && $_GET["c"] == "size" && $_GET["o"] == "asc"): ?>
                    <i class="fas fa-sort-up"></i>
                <?php else: ?>
                    <i class="fas fa-sort-up"></i>
                    <i class="fas fa-sort-down"></i>
                <?php endif; ?>
            </div>
        </th>
        <th class="thead__date hide relative">
            <a href="
                <?php  
                    $column = "date";
                    if(isset($_GET["u"]) && isset($_GET["w"])) // In torrents with word and u (user torrent)
                    {
                        $user = clean_string($_GET["u"]);
                        $word = clean_String($_GET["w"]);

                        if(isset($_GET["o"]) && isset($_GET["c"]))
                        {
                            if($_GET["o"] == "desc" && $_GET["c"] == $column)
                            {
                                echo "?u=" . $user . "&w=" . $word . "&o=asc&c=" . $column;
                            }
                            else
                            {
                                echo "?u=" . $user . "&w=" . $word . "&o=desc&c=" . $column;
                            }
                        }
                        else
                        {
                            echo "?u=" . $user . "&w=" . $word . "&o=desc&c=" . $column;
                        }
                    }
                    else if(isset($_GET["u"])) // In torrents with u (user torrent)
                    {
                        $user = clean_string($_GET["u"]);

                        if(isset($_GET["o"]) && isset($_GET["c"]))
                        {
                            if($_GET["o"] == "desc" && $_GET["c"] == $column)
                            {
                                echo "?u=" . $user . "&o=asc&c=" . $column;
                            }
                            else
                            {
                                echo "?u=" . $user . "&o=desc&c=" . $column;
                            }
                        }
                        else
                        {
                            echo "?u=" . $user . "&o=desc&c=" . $column;
                        }
                    }
                    else if(isset($_GET["w"])) // In search
                    {
                        if(isset($_GET["o"]) && isset($_GET["c"]))
                        {
                            if($_GET["o"] == "desc" && $_GET["c"] == $column)
                            {
                                echo "?w=" . $word . "&o=asc&c=" . $column;
                            }
                            else
                            {
                                echo "?w=" . $word . "&o=desc&c=" . $column;
                            }
                        }
                        else
                        {
                            echo "?w=" . $word . "&o=desc&c=" . $column;
                        }
                    }
                    else // In index
                    {
                        if(isset($_GET["o"]) && isset($_GET["c"]) && $_GET["c"] == $column)
                        {
                            if($_GET["o"] == "desc" && $_GET["c"] == $column)
                            {
                                echo "?o=asc&c=" . $column;
                            }
                            else
                            {
                                echo "?o=desc&c=" . $column;
                            }
                        }
                        else
                        {
                            echo "?o=desc&c=" . $column;
                        }
                    }
                ?>">
            </a>
            Date
            <div class="arrows_contenedor">
            <?php if(isset($_GET["c"]) && $_GET["c"] == "date" && $_GET["o"] == "desc"): ?>
                    <i class="fas fa-sort-down"></i>
                <?php elseif(isset($_GET["c"]) && $_GET["c"] == "date" && $_GET["o"] == "asc"): ?>
                    <i class="fas fa-sort-up"></i>
                <?php else: ?>
                    <i class="fas fa-sort-up"></i>
                    <i class="fas fa-sort-down"></i>
                <?php endif; ?>
            </div>
        </th>
        <th class="thead__uparrow relative">
            <a href="<?php 
                $column = "likes";
                if(isset($_GET["u"]) && isset($_GET["w"])) // In torrents with word and u (user torrent)
                {
                    $user = clean_string($_GET["u"]);
                    $word = clean_String($_GET["w"]);

                    if(isset($_GET["o"]) && isset($_GET["c"]))
                    {
                        if($_GET["o"] == "desc" && $_GET["c"] == $column)
                        {
                            echo "?u=" . $user . "&w=" . $word . "&o=asc&c=" . $column;
                        }
                        else
                        {
                            echo "?u=" . $user . "&w=" . $word . "&o=desc&c=" . $column;
                        }
                    }
                    else
                    {
                        echo "?u=" . $user . "&w=" . $word . "&o=desc&c=" . $column;
                    }
                }
                else if(isset($_GET["u"])) // In torrents with u (user torrent)
                {
                    $user = clean_string($_GET["u"]);

                    if(isset($_GET["o"]) && isset($_GET["c"]))
                    {
                        if($_GET["o"] == "desc" && $_GET["c"] == $column)
                        {
                            echo "?u=" . $user . "&o=asc&c=" . $column;
                        }
                        else
                        {
                            echo "?u=" . $user . "&o=desc&c=" . $column;
                        }
                    }
                    else
                    {
                        echo "?u=" . $user . "&o=desc&c=" . $column;
                    }
                }
                else if(isset($_GET["w"])) // In search
                {
                    if(isset($_GET["o"]) && isset($_GET["c"]))
                    {
                        if($_GET["o"] == "desc" && $_GET["c"] == $column)
                        {
                            echo "?w=" . $word . "&o=asc&c=" . $column;
                        }
                        else
                        {
                            echo "?w=" . $word . "&o=desc&c=" . $column;
                        }
                    }
                    else
                    {
                        echo "?w=" . $word . "&o=desc&c=" . $column;
                    }
                }
                else // In index
                {
                    if(isset($_GET["o"]) && isset($_GET["c"]))
                    {
                        if($_GET["o"] == "desc" && $_GET["c"] == $column)
                        {
                            echo "?o=asc&c=" . $column;
                        }
                        else
                        {
                            echo "?o=desc&c=" . $column;
                        }
                    }
                    else
                    {
                        echo "?o=desc&c=" . $column;
                    }
                }?>">
            </a>
            <i class="fa fa-arrow-up"></i>
            <div class="arrows_contenedor">
                <?php if(isset($_GET["c"]) && $_GET["c"] == "likes" && $_GET["o"] == "desc"): ?>
                    <i class="fas fa-sort-down"></i>
                <?php elseif(isset($_GET["c"]) && $_GET["c"] == "likes" && $_GET["o"] == "asc"): ?>
                    <i class="fas fa-sort-up"></i>
                <?php else: ?>
                    <i class="fas fa-sort-up"></i>
                    <i class="fas fa-sort-down"></i>
                <?php endif; ?>
            </div>
            
        </th>
        <th class="thead__downarrow relative">
            <a href="<?php 
                $column = "dislikes";
                if(isset($_GET["u"]) && isset($_GET["w"])) // In torrents with word and u (user torrent)
                {
                    $user = clean_string($_GET["u"]);
                    $word = clean_String($_GET["w"]);

                    if(isset($_GET["o"]) && isset($_GET["c"]))
                    {
                        if($_GET["o"] == "desc" && $_GET["c"] == $column)
                        {
                            echo "?u=" . $user . "&w=" . $word . "&o=asc&c=" . $column;
                        }
                        else
                        {
                            echo "?u=" . $user . "&w=" . $word . "&o=desc&c=" . $column;
                        }
                    }
                    else
                    {
                        echo "?u=" . $user . "&w=" . $word . "&o=desc&c=" . $column;
                    }
                }
                else if(isset($_GET["u"])) // In torrents with u (user torrent)
                {
                    $user = clean_string($_GET["u"]);

                    if(isset($_GET["o"]) && isset($_GET["c"]))
                    {
                        if($_GET["o"] == "desc" && $_GET["c"] == $column)
                        {
                            echo "?u=" . $user . "&o=asc&c=" . $column;
                        }
                        else
                        {
                            echo "?u=" . $user . "&o=desc&c=" . $column;
                        }
                    }
                    else
                    {
                        echo "?u=" . $user . "&o=desc&c=" . $column;
                    }
                }
                else if(isset($_GET["w"])) // In search
                {
                    if(isset($_GET["o"]) && isset($_GET["c"]))
                    {
                        if($_GET["o"] == "desc" && $_GET["c"] == $column)
                        {
                            echo "?w=" . $word . "&o=asc&c=" . $column;
                        }
                        else
                        {
                            echo "?w=" . $word . "&o=desc&c=" . $column;
                        }
                    }
                    else
                    {
                        echo "?w=" . $word . "&o=desc&c=" . $column;
                    }
                }
                else // In index
                {
                    if(isset($_GET["o"]) && isset($_GET["c"]))
                    {
                        if($_GET["o"] == "desc" && $_GET["c"] == $column)
                        {
                            echo "?o=asc&c=" . $column;
                        }
                        else
                        {
                            echo "?o=desc&c=" . $column;
                        }
                    }
                    else
                    {
                        echo "?o=desc&c=" . $column;
                    }
                }?>">
            </a>
            <i class="fa fa-arrow-down"></i>
            <div class="arrows_contenedor">
                <?php if(isset($_GET["c"]) && $_GET["c"] == "dislikes" && $_GET["o"] == "desc"): ?>
                    <i class="fas fa-sort-down"></i>
                <?php elseif(isset($_GET["c"]) && $_GET["c"] == "dislikes" && $_GET["o"] == "asc"): ?>
                    <i class="fas fa-sort-up"></i>
                <?php else: ?>
                    <i class="fas fa-sort-up"></i>
                    <i class="fas fa-sort-down"></i>
                <?php endif; ?>
            </div>
        </th>
    </tr>
<?php endif; ?>