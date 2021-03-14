<?php $total_pages = number_of_pages($page_config["torrents_per_page"], $conection); ?>
<ul class="pagination">
    
    <?php if(get_page() <= 1): ?>
        <li class="left__aquo-disabled">&laquo;</li>
    <?php else: ?>
        <li>
            <a id="left__aquo-enabled" href="
                <?php 
                    if(isset($_GET["u"]) && isset($_GET["c"]) && isset($_GET["o"]) && isset($_GET["w"])) // In search with u, w set and orders
                    {
                        echo "?u=" . $_GET["u"] . "&c=" . $_GET["c"] . "&o=" . $_GET["o"] . "&p=" . get_page() - 1 . "&w=" . $_GET["w"];
                    }
                    else if(isset($_GET["u"]) && isset($_GET["c"]) && isset($_GET["o"])) // In search with u
                    {
                        echo "?u=" . $_GET["u"] . "&c=" . $_GET["c"] . "&o=" . $_GET["o"] . "&p=" . get_page() - 1;
                    }
                    else if(isset($_GET["c"]) && isset($_GET["o"]) && isset($_GET["w"])) // In search
                    {
                        echo "?c=" . $_GET["c"] . "&o=" . $_GET["o"] . "&p=" . get_page() - 1 . "&w=" . $_GET["w"];
                    }
                    else if(isset($_GET["u"]) && isset($_GET["w"])) // In search with u and w
                    {
                        echo "?u=" . $_GET["u"] . "&p=" . get_page() - 1 . "&w=" . $_GET["w"];
                    }
                    else if(isset($_GET["w"])) // In search
                    {
                        echo "?p=" . get_page() - 1 . "&w=" . $_GET["w"];
                    }
                    else if(isset($_GET["c"]) && isset($_GET["o"]))  // In index with orders
                    {
                        echo "?c=" . $_GET["c"] . "&o=" . $_GET["o"] . "&p=" . get_page() - 1;
                    }
                    else if(isset($_GET["u"])) // In u search without w (user torrents)
                    {
                        echo "?u=" . $_GET["u"] . "&p=" . get_page();
                    }
                    else  // In index
                    {
                        echo "?p=" . get_page() - 1;
                    }
                ?>">&laquo;
            </a>
        </li>
    <?php endif; ?>

    <?php for($i = 1; $i <= $total_pages; $i++): ?>
        <?php if(get_page() == $i): ?>
            <li class="active">
                <a href="
                    <?php 
                        if(isset($_GET["u"]) && isset($_GET["c"]) && isset($_GET["o"]) && isset($_GET["w"])) 
                        {
                            echo "?u=" . $_GET["u"] . "&c=" . $_GET["c"] . "&o=" . $_GET["o"] . "&p=" . get_page() . "&w=" . $_GET["w"];
                        }
                        else if(isset($_GET["u"]) && isset($_GET["c"]) && isset($_GET["o"])) 
                        {
                            echo "?u=" . $_GET["u"] . "&c=" . $_GET["c"] . "&o=" . $_GET["o"] . "&p=" . get_page();
                        }
                        else if(isset($_GET["c"]) && isset($_GET["o"]) && isset($_GET["w"]))
                        {
                            echo "?c=" . $_GET["c"] . "&o=" . $_GET["o"] . "&p=" . get_page() . "&w=" . $_GET["w"];
                        }
                        else if(isset($_GET["u"]) && isset($_GET["w"])) 
                        {
                            echo "?u=" . $_GET["u"] . "&p=" . get_page() . "&w=" . $_GET["w"];
                        }
                        else if(isset($_GET["w"]))
                        {
                            echo "?p=" . get_page() . "&w=" . $_GET["w"];
                        }
                        else if(isset($_GET["c"]) && isset($_GET["o"]))
                        {
                            echo "?c=" . $_GET["c"] . "&o=" . $_GET["o"] . "&p=" . get_page() ;
                        }
                        else if(isset($_GET["u"]))
                        {
                            echo "?u=" . $_GET["u"] . "&p=" . get_page();
                        }
                        else
                        {
                            echo "?p=" . get_page();
                        }
                    ?>"><?php echo $i; ?>
                </a>
            </li>   
        <?php else: ?>
            <li>
                <a href="
                    <?php 
                        if(isset($_GET["u"]) && isset($_GET["c"]) && isset($_GET["o"]) && isset($_GET["w"])) 
                        {
                            echo "?u=" . $_GET["u"] . "&c=" . $_GET["c"] . "&o=" . $_GET["o"] . "&p=" . $i . "&w=" . $_GET["w"];
                        }
                        else if(isset($_GET["u"]) && isset($_GET["c"]) && isset($_GET["o"])) 
                        {
                            echo "?u=" . $_GET["u"] . "&c=" . $_GET["c"] . "&o=" . $_GET["o"] . "&p=" . $i;
                        }
                        else if(isset($_GET["w"]) && isset($_GET["c"]) && isset($_GET["o"]))
                        {
                            echo "?c=" . $_GET["c"] . "&o=" . $_GET["o"] . "&p=" . $i . "&w=" . $_GET["w"];
                        }
                        else if(isset($_GET["u"]) && isset($_GET["w"])) 
                        {
                            echo "?u=" . $_GET["u"] . "&p=" . $i . "&w=" . $_GET["w"];
                        }
                        else if(isset($_GET["w"]))
                        {
                            echo "?p=" . $i . "&w=" . $_GET["w"];
                        }
                        else if(isset($_GET["c"]) && isset($_GET["o"]))
                        {
                            echo "?c=" . $_GET["c"] . "&o=" . $_GET["o"] . "&p=" . $i;
                        }
                        else if(isset($_GET["u"]))
                        {
                            echo "?u=" . $_GET["u"] . "&p=" . $i;
                        }
                        else
                        {
                            echo "?p=" . $i;
                        }
                    ?>"><?php echo $i; ?>
                </a>
            </li>
        <?php endif; ?>
    <?php endfor; ?>
    
    <?php if(get_page() >= $total_pages): ?>
        <li class="right__aquo-disabled">&raquo;</li>
    <?php else: ?>
        <li>
            <a id="right__aquo-enabled" href="
                <?php 
                    if(isset($_GET["u"]) && isset($_GET["c"]) && isset($_GET["o"]) && isset($_GET["w"]))
                    {
                        echo "?u=" . $_GET["u"] . "&c=" . $_GET["c"] . "&o=" . $_GET["o"] . "&p=" . get_page() + 1 . "&w=" . $_GET["w"];
                    }
                    else if(isset($_GET["u"]) && isset($_GET["c"]) && isset($_GET["o"]))
                    {
                        echo "?u=" . $_GET["u"] . "&c=" . $_GET["c"] . "&o=" . $_GET["o"] . "&p=" . get_page() + 1;
                    }
                    else if(isset($_GET["c"]) && isset($_GET["o"]) && isset($_GET["w"]))
                    {
                        echo "?c=" . $_GET["c"] . "&o=" . $_GET["o"] . "&p=" . get_page() + 1 . "&w=" . $_GET["w"];
                    }
                    else if(isset($_GET["u"]) && isset($_GET["w"]))
                    {
                        echo "?u=" . $_GET["u"] . "&p=" . get_page() + 1 . "&w=" . $_GET["w"];
                    }
                    else if(isset($_GET["w"]))
                    {
                        echo "?p=" . get_page() + 1  . "&w=" . $_GET["w"];
                    }
                    else if(isset($_GET["c"]) && isset($_GET["o"]))
                    {
                        echo "?c=" . $_GET["c"] . "&o=" . $_GET["o"] . "&p=" . get_page() + 1;
                    }
                    else if(isset($_GET["u"]))
                    {
                        echo "?u=" . $_GET["u"] . "&p=" . get_page() + 1;
                    }
                    else
                    {
                        echo "?p=" . get_page() + 1;
                    }
                ?>">&raquo;
            </a>
        </li>
    <?php endif; ?>

</ul>