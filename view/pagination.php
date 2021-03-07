<?php $total_pages = number_of_pages($page_config["torrents_per_page"], $conection); ?>
<ul class="pagination">
    
    <?php if(get_page() == 1): ?>
        <li class="left__aquo-disabled">&laquo;</li>
    <?php else: ?>
        <li><a id="left__aquo-enabled" href="<?php echo "?p=" . get_page() - 1; ?>">&laquo;</a></li>
    <?php endif; ?>

    <?php for($i = 1; $i <= $total_pages; $i++): ?>
        <?php if(get_page() == $i): ?>
            <li class="active">
                <a href="<?php echo "?p=" . $i ?>"><?php echo $i; ?></a>
            </li>   
        <?php else: ?>
            <li><a href="<?php echo "?p=" . $i ?>"><?php echo $i; ?></a></li>
        <?php endif; ?>
    <?php endfor; ?>
    
    <?php if(get_page() == $total_pages): ?>
        <li class="right__aquo-disabled">&raquo;</li>
    <?php else: ?>
        <li><a id="right__aquo-enabled" href="<?php echo "?p=" . get_page() + 1; ?>">&raquo;</li>
    <?php endif; ?>

</ul>