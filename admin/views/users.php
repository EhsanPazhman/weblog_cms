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
            <div class="col-12 h-100">
                <a href="<?= siteUrl('admin/views/addUser.php') ?>" class="btn-success mb-3 p-2" id="aStyle"><span>افزودن کاربر جدید</span></a>
                <!-- Table Start -->
                <div class="col-12">
                    <div class="bg-secondary rounded h-auto p-4">
                        <h6 class="mb-4">لیست تمامی مقالات</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">نام</th>
                                    <th scope="col">ایمیل</th>
                                    <th scope="col">نقش</th>
                                    <th scope="col">تاریخ ایجاد</th>
                                    <th scope="col">تاریخ ویراش</th>
                                    <th scope="col">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>احسان</td>
                                    <td>زبان برنامه نویسی php</td>
                                    <td>ندارد</td>
                                    <td>12/6/2033</td>
                                    <td>12/6/2033</td>
                                    <td>
                                        <a href="" class="btn-warning p-2 ms-2" style="border-radius: 4px; border: 1px solid yellow">ویراش</a>
                                        <a href="" class="btn-danger p-2" style="border-radius: 4px; border: 1px solid red">حذف</a>
                                    </td>
                                </tr>
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