<?php include "header.php";
$id = $_GET['postId'] ?? null;
$post = read('articles',$id);
addView($id);
$postComments = readAllCommentsOfPost($id);
?>

<body>
<div class="container">
    <br>

    <!-- start headers -->
    <?php include "navbar.php"; ?>
</div>
<!-- end headers -->
<?php if (!empty($_SESSION['success'])): ?>
    <h4 class="alert bg-success mb-3"
        style="width: 50%; margin: auto; text-align: center"><?= $_SESSION['success'] ?></h4>
    <?php unset($_SESSION['success']) ?>
<?php endif; ?>

<?php if (!empty($_SESSION['error'])): ?>
    <h4 class="alert alert-danger" style="width: 50%; margin: auto; text-align: center"><?= $_SESSION['error'] ?></h4>
    <?php unset($_SESSION['error']) ?>
<?php endif; ?>
<br><br><br>
<div class="container">
    <div class="row">
        <div class="post-page">
            <div class="image-post">
                <img src="../assets/image/post1.png" alt="" style="max-width: 600px;">
            </div>
            <div class="information-post">
                <div> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                        <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                    </svg><?= countTable('views',"WHERE article_id = $id")[0]->count ?></div>
                <div><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg><?= $post[0]->author ?></div>

                <div><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar2-date-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 3.5c0-.276.244-.5.545-.5h10.91c.3 0 .545.224.545.5v1c0 .276-.244.5-.546.5H2.545C2.245 5 2 4.776 2 4.5v-1zm7.336 9.29c-1.11 0-1.656-.767-1.703-1.407h.683c.043.37.387.82 1.051.82.844 0 1.301-.848 1.305-2.164h-.027c-.153.414-.637.79-1.383.79-.852 0-1.676-.61-1.676-1.77 0-1.137.871-1.809 1.797-1.809 1.172 0 1.953.734 1.953 2.668 0 1.805-.742 2.871-2 2.871zm.066-2.544c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2zm-2.957-2.89v5.332H5.77v-4.61h-.012c-.29.156-.883.52-1.258.777V8.16a12.6 12.6 0 0 1 1.313-.805h.632z" />
                    </svg><?= verta($post[0]->updated_at)->format('%d %B') ?></div>
            </div>
            <br>
            <div class="content-post">
                <h5><?= $post[0]->title ?></h5>
                <br>
                <p><?= $post[0]->description ?></p>
            </div>

            <br>
            <div class="tag-post">
                <span><?= $post[0]->tags ?></span>
            </div><br>
            <b>نظر شما چیه؟ بنویسید...
            </b><br>
            <div class="pt-4">
<?php if (loginCheck()) : ?>
    <form action="<?= siteUrl('') ?>?action=addComment&id=<?= $post[0]->id ?> " method="post">
                    <textarea name="comment" class="form-control" id="floatingTextarea" style="height: 150px;"></textarea>
                    <input name="articleTitle" type="text" value="<?= $post[0]->title ?>" style="display:none;">
                    <input name="articleId" type="text" value="<?= $post[0]->id ?>" style="display:none;">
                    <input name="userName" type="text" value="<?= $user->name ?>" style="display:none;">
              <button class="btn btn-success mt-2 px-2">ثبت دیدگاه</button>
                </form>
<?php else: ?>
                <div class="p-4">
                    <h3>برای ثبت نظر ابتدا وارد شوید!</h3>
                </div>

<?php endif; ?>
            </div>
            <div class="comments">
                <?php if (sizeof($postComments)): ?>
                <?php foreach ($postComments as $comment): ?>
                <div class="comment-item">
                    <div class="comment-image">
                        <img src="../assets/image/28159_d2db946f-3840-8eeb-66c2-39f399afce2e_رضا_الفت.jpg" alt="">
                    </div>
                    <div class="comment-text">
                        <p class="username-comment"><?= $comment->user_name ?></p>
                        <span>ارسال شده <?= verta($comment->commented_at)->format('%d %B') ?></span>
                        <a href="" class="btn btn-success" style="margin-right: 5px;">ثبت پاسخ</a>
                        <a href="" class="btn btn-warning">گزارش</a><br>
                        <p class="text-comment"><?= $comment->comment ?></p>
                    </div>
                </div>
<?php endforeach; ?>
<?php else: ?>
    <div class="comment-text m-5 p-5">
        <h2>اولین نفری باشید که نظر میدهد..</h2>
    </div>
<?php endif; ?>
            </div>
        </div>
    </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<!-- footer my website -->

<?php include "footer.php"; ?>