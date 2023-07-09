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
                <a href="<?= siteUrl('admin/views/addPost.php') ?>" class="btn-success mb-3 p-2" id="aStyle"><span>افزودن مقاله جدید</span></a>
                <!-- Table Start -->
                <div class="col-12">
                    <div class="bg-secondary rounded h-auto p-4">
                        <h6 class="mb-4">لیست تمامی مقالات</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">دسته بندی</th>
                                    <th scope="col">نویسنده</th>
                                    <th scope="col">عنوان</th>
                                    <th scope="col">تصویر</th>
                                    <th scope="col">تگ ها</th>
                                    <th scope="col">وضعیت</th>
                                    <th scope="col">تاریخ ایجاد</th>
                                    <th scope="col">تاریخ انتشار</th>
                                    <th scope="col">تاریخ ویراش</th>
                                    <th scope="col">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (sizeof($posts)): ?>
                                <?php foreach ($posts as $post): ?>
                                    <tr>
                                    <td><?= ++$counter ?></td>
                                    <td><?= $post->category ?></td>
                                    <td><?= $post->author ?></td>
                                    <td style="width: 150px;"><?= $post->title ?></td>
                                    <td><?= "<img src='".siteUrl("admin/$post->img")."' alt='' style='width: 100px; height: 50px'>" ?></td>
                                    <td style="width: 150px;"><?= $post->tags ?></td>
                                    <td>
                                        <a href="<?= siteUrl('admin/') ?>?action=postStatus&id=<?= $post->id ?>">
                                        <?= $post->status == 1 ? "<i class='btn-outline-success p-2' style='border-radius: 4px; border: 1px solid green'>تایید شده</i>" :
                                            "<i class='btn-danger p-2' style='border-radius: 4px; border: 1px solid red'>تایید نشده</i>" ?>
                                        </a>
                                    </td>
                                    <td><?= verta($post->published_at)->format('%d %B') ?></td>
                                    <td><?= verta($post->created_at)->format('%d %B') ?></td>
                                    <td><?= verta($post->updated_at)->format('%d %B') ?></td>
                                    <td>
                                        <a href="<?= siteUrl('admin/views/editPost.php') ?>?postId=<?= $post->id ?>" class="btn-warning p-2 ms-2" style="border-radius: 4px; border: 1px solid yellow">ویرایش</a>
                                        <a href="<?= siteUrl('admin/') ?>?action=deletePost&id=<?= $post->id ?>"
                                           class="btn-danger p-2" style="border-radius: 4px; border: 1px solid red"
                                           onclick="return confirm('مطمئن هستید که میخواهید مقاله <?= $post->title ?> حذف کنید؟');">حذف</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                            <td>هیچ چیزی وجود ندار هنوز!</td>
                            <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php include "paginate.php"; ?>
                    </div>
                </div>
                <!-- Table End -->
            </div>
        </div>
    </div>
    <!-- Blank End -->

<?php include "footer.php"; ?>