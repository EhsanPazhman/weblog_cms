<?php include "header.php";
?>
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
                <h4 class="alert bg-success"
                    style="width: 50%; margin: auto; text-align: center"><?= $_SESSION['success'] ?></h4>
                <?php unset($_SESSION['success']) ?>
            <?php endif; ?>
            <div class="col-12 h-100">
                <a href="<?= siteUrl('admin/views/addCategory.php') ?>" class="btn-success mb-3 p-2" id="aStyle"><span>افزودن دسته بندی جدید</span></a>
                <!-- Table Start -->
                <div class="bg-secondary rounded h-auto p-4">
                    <h6 class="mb-4">لیست دسته بندی ها</h6>
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام</th>
                            <th scope="col">تاریخ ایجاد</th>
                            <th scope="col">تاریخ ویرایش</th>
                            <th scope="col">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($categories as $category): ?>
                        <tr>
                                <td><?= ++$counter ?></td>
                                <td><?= $category->name ?></td>
                                <td><?= verta($category->created_at)->format('Y/m/d') ?></td>
                                <td><?= verta($category->updated_at)->format('Y/m/d') ?></td>
                                <td>
                                    <a href="<?= siteUrl('admin/views/editCategory.php') ?>?categoryId=<?= $category->id ?>"
                                       class="btn-warning p-2 ms-2"
                                       style="border-radius: 4px; border: 1px solid yellow">ویراش</a>
                                    <a href="<?= siteUrl('admin/') ?>?id=<?= $category->id ?>"
                                    class="btn-danger p-2" style="border-radius: 4px; border: 1px solid red"
                                       onclick="return confirm('مطمئن هستید که میخواهید دسته بندی <?= $category->name ?> حذف کنید؟');">حذف</a>
                                </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- Table End -->
            </div>
        </div>
    </div>
    <!-- Blank End -->

<?php include "footer.php"; ?>