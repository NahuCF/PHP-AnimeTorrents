<?php foreach($torrents as $torrent): ?>
    <tr class="row__table">
        <td class="colaps"><a href="<?php echo "single.php" . "?ID=" . $torrent["ID"]; ?>"><?php echo $torrent["name"]; ?></a></td>
        <td class="text-center">
            <a href="<?php echo "dowload.php?f=" . $torrent["ID"]; ?>"><i class="fas fa-download"></i></a>
            <?php if(!empty($torrent["magnet"])): ?>
                <a href="<?php echo $torrent["magnet"] ?>"><i class="fas fa-magnet"></i></a>
            <?php else: ?>
                <a href="#" style="pointer-events: none;" ?><i class="fas fa-magnet" id="magnet__red"></i></a>
            <?php endif; ?>
        </td>
        <td class="text-center hide"><?php echo bytes_to_string($torrent["size"]); ?></td>
        <td class="text-center hide"><?php echo date('Y-m-d H:i', strtotime($torrent["date"])); ?></td>
        <td class="text-center" style="color: green;"><?php echo $torrent["likes"]; ?></td>
        <td class="text-center" style="color: red;"><?php echo $torrent["dislikes"]; ?></td>
    </tr>
<?php endforeach; ?>