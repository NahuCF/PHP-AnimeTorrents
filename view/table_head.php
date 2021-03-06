<tr>
    <th class="thead__name">Name</th>
    <th class="thead__link">Link</th>
    <th class="thead__size hide relative">
        <a href="
            <?php 
                if(isset($_GET["w"]))
                {
                    echo "?w=" . $_GET["w"] . (!isset($_GET["o"]) || $_GET["o"] != "desc" ? "&c=size&o=desc" : ($_GET["o"] == "desc" &&  $_GET["c"] == "size" ? "&c=size&o=asc" : "&c=size&o=desc")); 
                }
                else
                {
                    echo !isset($_GET["o"]) || $_GET["o"] != "desc" ? "?c=size&o=desc" : ($_GET["o"] == "desc" &&  $_GET["c"] == "size" ? "?c=size&o=asc" : "?c=size&o=desc"); 
                }
            ?>">
        </a>
        Size
        <div class="arrows_contenedor">
            <i class="fas fa-sort-up"></i>
            <i class="fas fa-sort-down"></i>
        </div>
    </th>
    <th class="thead__date hide relative">
        <a href="
            <?php  
                if(isset($_GET["w"]))
                {
                    echo "?w=" . $_GET["w"] . (!isset($_GET["o"]) || $_GET["o"] != "desc" ? "&c=date&o=desc" : ($_GET["o"] == "desc" &&  $_GET["c"] == "date" ? "&c=date&o=asc" : "&c=date&o=desc")); 
                }
                else
                {
                    echo !isset($_GET["o"]) || $_GET["o"] != "desc" ? "?c=date&o=desc" : ($_GET["o"] == "desc" &&  $_GET["c"] == "date" ? "?c=date&o=asc" : "?c=date&o=desc"); 
                }
            ?>">
        </a>
        Date
        <div class="arrows_contenedor">
            <i class="fas fa-sort-up"></i>
            <i class="fas fa-sort-down"></i>
        </div>
    </th>
    <th class="thead__uparrow relative">
        <a href="
            <?php 
                if(isset($_GET["w"]))
                {
                    echo "?w=" . $_GET["w"] . (!isset($_GET["o"]) || $_GET["o"] != "desc" ? "&c=likes&o=desc" : ($_GET["o"] == "desc" &&  $_GET["c"] == "likes" ? "&c=likes&o=asc" : "&c=likes&o=desc")); 
                }
                else
                {
                    echo !isset($_GET["o"]) || $_GET["o"] != "desc" ? "?c=likes&o=desc" : ($_GET["o"] == "desc" &&  $_GET["c"] == "likes" ? "?c=likes&o=asc" : "?c=likes&o=desc"); 
                }
            ?>">
        </a>
        <i class="fa fa-arrow-up"></i>
        <div class="arrows_contenedor">
            <i class="fas fa-sort-up"></i>
            <i class="fas fa-sort-down"></i>
        </div>
        
    </th>
    <th class="thead__downarrow relative">
        <a href="
            <?php 
                if(isset($_GET["w"]))
                {
                    echo "?w=" . $_GET["w"] . (!isset($_GET["o"]) || $_GET["o"] != "desc" ? "&c=dislikes&o=desc" : ($_GET["o"] == "desc" &&  $_GET["c"] == "dislikes" ? "&c=dislikes&o=asc" : "&c=dislikes&o=desc")); 
                }
                else
                {
                    echo !isset($_GET["o"]) || $_GET["o"] != "desc" ? "?c=dislikes&o=desc" : ($_GET["o"] == "desc" &&  $_GET["c"] == "dislikes" ? "?c=dislikes&o=asc" : "?c=dislikes&o=desc"); 
                }
            ?>">
        </a>
        <i class="fa fa-arrow-down"></i>
        <div class="arrows_contenedor">
            <i class="fas fa-sort-up"></i>
            <i class="fas fa-sort-down"></i>
        </div>
    </th>
</tr>