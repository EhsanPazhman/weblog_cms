<?php include "header.php"; ?>
    <!-- Sidebar Start -->
<?php include "sidebar.php"; ?>
    <!-- Sidebar End -->

    <!-- Content Start -->
    <div class="content">
    <!-- Navbar Start -->
    <?php include "navbar.php"; ?>
    <!-- Navbar End -->

    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 rounded align-items-center justify-content-center mx-0">
            <?php if (!empty($_SESSION['success'])): ?>
                <h4 class="alert bg-success mb-3"
                    style="width: 50%; margin: auto; text-align: center"><?= $_SESSION['success'] ?></h4>
                <?php unset($_SESSION['success']) ?>
            <?php endif; ?>
            <div class="col-12 h-100">
                <!-- Table Start -->
                <div class="col-12">
                    <div class="bg-secondary rounded h-auto p-4">
                        <h6 class="mb-4">لیست تمامی کامنت ها</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">نویسنده</th>
                                    <th scope="col">کامنت</th>
                                    <th scope="col">عنوان پٌست</th>
                                    <th scope="col">وضعیت</th>
                                    <th scope="col">تاریخ ایجاد</th>
                                    <th scope="col">تاریخ انتشار</th>
                                    <th scope="col">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($comments as $comment): ?>
                                    <tr>
                                        <td><?= ++$counter ?></td>
                                        <td><?= $comment->user_name ?></td>
                                        <td><?= $comment->comment ?></td>
                                        <td><?= $comment->article_title ?></td>
                                        <td>
                                            <a href="<?= siteUrl('admin/') ?>?action=commentStatus&id=<?= $comment->id ?>">
                                                <?= $comment->status == 1 ? "<i class='btn-outline-success p-2' style='border-radius: 4px; border: 1px solid green'>تایید شده</i>" :
                                                    "<i class='btn-outline-danger p-2' style='border-radius: 4px; border: 1px solid red'>تایید نشده</i>" ?>
                                            </a>
                                        </td>
                                        <td><?= verta($comment->commented_at)->format('%d %B') ?></td>
                                        <td><?= verta($comment->updated_at)->format('%d %B') ?></td>
                                        <td>
                                            <a href="<?= siteUrl('admin/views/editComment.php') ?>?commentId=<?= $comment->id ?>"
                                               class="btn-outline-warning p-2 ms-2"
                                               style="border-radius: 4px; border: 1px solid yellow">ویراش</a>
                                            <a href="<?= siteUrl('admin/') ?>?action=delete&id=<?= $comment->id ?>"
                                               class="btn-outline-danger p-2" style="border-radius: 4px; border: 1px solid red"
                                               onclick="return confirm('مطمئن هستید که میخواهید کامنت <?= $comment->comment ?> حذف کنید؟');">حذف</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Table End -->
            </div>
        </div>
    </div>
    <!-- Blank End -->

<?php include "footer.php"; ?>