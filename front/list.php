<div class="container">
    <ul class="list-group">
        <li class="list-group-item d-flex text-center">
            <div class="col-1">序號</div>
            <div class="col-6">投票主題</div>
            <div class="col-3">屬性</div>
            <div class="col-2">投票</div>
        </li>
        <?php
        //$sql="select * from `topics` where `close_time` >= '".date("Y-m-d H:i:s")."'";
        //$rows=$pdo->query($sql)->fetchAll();

        //$rows=all('topics');
        $rows = $Topic->all(" where `close_time` >= '" . date("Y-m-d H:i:s") . "'");

        foreach ($rows as $idx => $row) {
        ?>
            <li class="list-group-item d-flex text-center">
                <div class="col-1"><?= $idx + 1; ?></div>

                <div class="col-6"><?= $row['subject']; ?></div>
                <div class="col-3">
                    <?php
                    switch ($row['type']) {
                        case 1:
                            echo "<button class='btn btn-primary'>";
                            echo "單選";
                            break;
                        case 2:
                            echo "<button class='btn btn-success'>";
                            echo "多選";
                            break;
                    }
                    ?>
                    </button>
                    <?php
                    if ($row['login'] == 1) {
                        echo "<button class='btn btn-warning'>";
                        echo "會員限定";
                    } else {
                        echo "<button class='btn btn-info' >";
                        echo "公開";
                    }
                    ?>
                    </button>
                </div>
                <div class="col-2">
                    <button class="btn btn-outline-secondary" onclick="location.href='?do=vote&id=<?= $row['id']; ?>'">我要投票</button>
                </div>
            </li>
        <?php
        }
        ?>
    </ul>
</div>