<?php include "../bootstrap/init.php"; ?>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>weblog</title>
    <link rel="stylesheet" href="<?= assets('css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= assets('css/style.css') ?>">
</head>
<body>
<div class="container">
    <br>
    <!-- start headers -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">وبلاگ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= siteUrl() ?>">خانه <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        مقالات
                    </a>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">برنامه نویسی</a>
                        <a class="dropdown-item" href="#">طراحی وب</a>
                        <a class="dropdown-item" href="#">بازی سازی</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0 mr-auto">
                <input class="form-control mr-sm-2 placholder" type="search" placeholder="دنبال چی میگردی؟"
                       aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">جستجو</button>
            </form>
        </div>
    </nav>
    <!-- end headers -->
