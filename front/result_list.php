<?php

$subjects = q("SELECT `topics`.`id`,
                              `topics`.`subject`,
                              sum(`options`.`total`) as '總計'
                       FROM `topics`,`options` 
                       WHERE `topics`.`id`=`options`.`subject_id` 
                       GROUP BY `topics`.`id`;");

?>
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-auto">
            <h1>選擇你想看的投票項目</h1>
        </div>
        <div class="col"></div>
    </div>
    <ul class="list-group">
        <li class="list-group-item d-flex text-center">
            <div class="col-1">序號</div>
            <div class="col-9">主題</div>
            <div class="col-2">票數</div>
        </li>
        <?php
        foreach ($subjects as $idx => $subject) {
        ?>
            <li class="list-group-item d-flex text-center">
                <div class="col-1"><?= $idx + 1; ?>.
                </div>
                <div class="col-9">
                    <a href="index.php?do=result&id=<?= $subject['id']; ?>">
                        <?= $subject['subject']; ?>
                    </a>
                </div>
                <div class="col-2"><?= $subject['總計']; ?></div>
            </li>
        <?php
        }
        ?>
    </ul>
</div>