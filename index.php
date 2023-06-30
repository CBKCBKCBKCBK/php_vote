<?php include_once "db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>驚奇投票所</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>

<body>
    <header><!-- bg-body-tertiary-->
        <nav class="navbar navbar-expand-sm">
            <div class="container-fluid d-flex">
                <!-- <a class="navbar-brand" href="#"></a> -->
                <a class="navbar-brand" href="./index.php">首頁</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <!-- <a class="nav-link active" aria-current="page" href="#">Home</a> -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php?router=result_list">結果</a>
                        </li>
                        <!--li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li-->
                        <?php if (!isset($_SESSION['login'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php?router=login">登入</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php?router=reg">註冊</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item"></li>
                            <a class="nav-link" href="./api/logout.php">登出</a>
                        <?php
                            switch ($_SESSION['pr']) {
                                case "super":
                                    echo "<a class='nav-link' href='./manage/index.php?router=super'>系統管理</a>";
                                    break;
                                case "member":
                                    echo "<a class='nav-link' href='./manage/index.php?router=member'>會員中心</a>";
                                    break;
                                case "admin":
                                    echo "<a class='nav-link' href='./manage/index.php?router=admin'>管理</a>";
                                    break;
                            }
                        } ?>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main>

        <?php

        /* if(isset($_SESSION['login']) && $_SESSION['pr']){
    echo $_SESSION['login'];
    echo "-";
    echo $_SESSION['pr'];
}
 */
        $do = $_GET['do'] ?? 'list';

        $file = "./front/" . $do . ".php";

        if (file_exists($file)) {
            include $file;
        } else {
            include "./front/list.php";
        }
        ?>

    </main>
    <footer></footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>