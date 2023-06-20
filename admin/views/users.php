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
                        <h6 class="mb-4">لیست تمامی کاربران</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">نام</th>
                                    <th scope="col">ایمیل</th>
                                    <th scope="col">نقش</th>
                                    <th scope="col">تاریخ ایجاد</th>
                                    <th scope="col">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (sizeof($users)): ?>
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td><?= ++$counter ?></td>
                                            <td><?= $user->name ?></td>
                                            <td><?= $user->email ?></td>
                                            <td><?= $user->role == 0 ? 'کاربر' : 'ادمین' ?></td>
                                            <td><?= verta($user->created_at)->format('Y/m/d') ?></td>

                                            <td>
                                                <a href="<?= siteUrl('admin/') ?>?id=<?= $user->id ?>"
                                                   class="btn-warning p-2 ms-2"
                                                   style="border-radius: 4px; border: 1px solid yellow"><?= $user->role == 0 ? 'ارتقا' : 'لغو ارتقا' ?></a>
                                                <a href="<?= siteUrl('admin/') ?>?id=<?= $user->id ?>"
                                                   class="btn-danger p-2"
                                                   style="border-radius: 4px; border: 1px solid red"
                                                   onclick="return confirm('مطمئن هستید که میخواهید کاربر <?= $user->name ?> حذف کنید؟');">حذف</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <td>کاربری وجود ندارد</td>
                                <?php endif; ?>
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