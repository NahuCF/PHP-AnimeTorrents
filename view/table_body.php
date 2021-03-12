<?php $even_number = 0; ?>
<?php foreach($torrents as $torrent): ?>
    <?php if($even_number % 2 == 0): ?>
        <tr class="row__table row__table-grey">
            <td class="colaps"><a href="<?php echo "single.php" . "?ID=" . $torrent["ID"]; ?>"><?php echo $torrent["name"]; ?></a></td>
            <td class="text-center">
                <a href="<?php echo "dowload.php?f=" . $torrent["ID"]; ?>"><i class="fas fa-download"></i></a>
                <?php if(!empty($torrent["magnet"])): ?>
                    <a href="<?php echo $torrent["magnet"] ?>"><i class="fas fa-magnet"></i></a>
                <?php else: ?>
                    <a href="#" id="magnet__noclick" ?><i class="fas fa-magnet" id="magnet__red"></i></a>
                <?php endif; ?>
            </td>
            <td class="text-center hide"><?php echo bytes_to_string($torrent["size"]); ?></td>
            <td class="text-center hide"><?php echo date('Y-m-d H:i', strtotime($torrent["date"])); ?></td>
            <td class="text-center"><?php echo $torrent["likes"]; ?></td>
            <td class="text-center"><?php echo $torrent["dislikes"]; ?></td>
        </tr>
    <?php else: ?>
        <tr class="row__table row__table-white">
            <td class="colaps"><a href="<?php echo "single.php" . "?ID=" . $torrent["ID"]; ?>"><?php echo $torrent["name"]; ?></a></td>
            <td class="text-center">
                <a href="<?php echo "dowload.php?f=" . $torrent["ID"]; ?>"><i class="fas fa-download"></i></a>
                <?php if(!empty($torrent["magnet"])): ?>
                    <a href="<?php echo $torrent["magnet"] ?>"><i class="fas fa-magnet"></i></a>
                <?php else: ?>
                    <a href="#" id="magnet__noclick"><i class="fas fa-magnet" id="magnet__red"></i></a>
                <?php endif; ?>
            </td>
            <td class="text-center hide"><?php echo bytes_to_string($torrent["size"]); ?></td>
            <td class="text-center hide"><?php echo date('Y-m-d H:i', strtotime($torrent["date"])); ?></td>
            <td class="text-center"><?php echo $torrent["likes"]; ?></td>
            <td class="text-center"><?php echo $torrent["dislikes"]; ?></td>
        </tr>
    <?php endif; ?>

    <?php $even_number++; ?>

<?php endforeach; ?>