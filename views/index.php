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
        <?php include "navbar.php"; ?>
        <!-- end headers -->
        <!-- start content -->
        <div>

            <div class="row d-none d-lg-flex">
                <?php if (!empty($_SESSION['success'])) : ?>
                    <h4 class="alert alert-success" style="width: 50%; margin: auto; text-align: center"><?= $_SESSION['success'] ?></h4>
                    <?php unset($_SESSION['success']) ?>
                <?php endif; ?>
                <?php if (!empty($_SESSION['error'])) : ?>
                    <h4 class="alert alert-danger" style="width: 50%; margin: auto; text-align: center"><?= $_SESSION['error'] ?></h4>
                    <?php unset($_SESSION['error']) ?>
                <?php endif; ?>
                <div class="col-4 information-site">
                    <img src="<?= assets('image/stat-time.svg') ?>" alt="">
                    <span>تعداد مقالات <?= countTable('articles', '')[0]->count ?></span>
                </div>
                <div class="col-4 information-site">
                    <img src="<?= assets('image/stat-teacher.svg') ?>" alt="">
                    <span>نویسندگان ما <?= countTable('users', 'WHERE role = 1')[0]->count ?></span>
                </div>
                <div class="col-4 information-site">
                    <img src="<?= assets('image/stat-student.svg') ?>" alt="">
                    <span>تعداد کاربران <?= countTable('users', '')[0]->count ?></span>
                </div>
            </div>
        </div>
        <!-- end content -->
        <br><br class="d-none d-lg-block"><br class="d-none d-lg-block">
        <!-- start posts -->
        <div>
            <h5 style="padding: 10px;">مقالات وبلاگ</h5>
            <div class="row">
                    <?php foreach ($pubPosts as $post): ?>
                        <div class="col-12 col-lg-4 mt-3">
                            <div class="post-item">
                                <?= "<img src='".siteUrl("admin/$post->img")."' alt='' style='width: 100%;'>" ?>
                                <div class="hovershow">
                                    <div class="hover-image-post d-none d-lg-flex">
                                    </div>
                                    <a href="<?= siteUrl('views/single.php') ?>?postId=<?= $post->id ?>" class="more-opst btn d-none d-lg-flex">مشاهده ی مقاله</a>
                                </div>
                                <div class="post-caption">
                                    <p>
                                        <a href=""><?= $post->title ?></a>
                                    </p>
                                    <span><?= limit_words($post->description,12) ?></span>
                                    <br><br>
                                    <span class="seen-post">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg><?= countTable('views',"WHERE article_id = $post->id")[0]->count ?>
                            </span>
                                    <span class="seen-post post-comment">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                </svg><?= countTable('comments', "WHERE article_id =$post->id")[0]->count ?></span>
                                    <span class="float-left post-m">
                                <a href="">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg> <?= $post->author ?></a>
                            </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
            </div>
            <?php include "./admin/views/paginate.php"?>
        </div>
    </div>
    <br><br><br><br>

    <!-- footer my website -->
<?php include "footer.php"; ?>