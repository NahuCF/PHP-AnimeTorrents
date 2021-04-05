<?php if(isset($rows)): ?> 
    <?php foreach($rows as $row): ?>
        <tr class="row__table">
            <td class="colaps"><a href="<?php echo "single" . "?ID=" . $row["ID"]; ?>"><?php echo $row["name"]; ?></a></td>
            <td class="text-center">
                <a href="<?php echo "dowload.php?f=" . $row["ID"]; ?>"><i class="fas fa-download"></i></a>
                <?php if(!empty($row["magnet"])): ?>
                    <a href="<?php echo $row["magnet"] ?>"><i class="fas fa-magnet"></i></a>
                <?php else: ?>
                    <a href="#" style="pointer-events: none;" ?><i class="fas fa-magnet" id="magnet__red"></i></a>
                <?php endif; ?>
            </td>
            <td class="text-center hide"><?php echo bytes_to_string($row["size"]); ?></td>
            <td class="text-center hide"><?php echo date('Y-m-d H:i', strtotime($row["date"])); ?></td>
            <td class="text-center" style="color: green;"><?php echo $row["likes"]; ?></td>
            <td class="text-center" style="color: red;"><?php echo $row["dislikes"]; ?></td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <?php foreach($users as $user): ?>
        <tr>
            <td class="thead__name"><?php echo $user["user"]; ?></td>
            <td>
                <?php if(basename($_SERVER["PHP_SELF"], ".php") == "users"): ?>
                    <button class="promote" value="<?php echo $user["ID"]; ?>">Promote</button>
                <?php else: ?>
                    <button class="demote" value="<?php echo $user["ID"]; ?>">Demote</button>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
<?php endif; ?>