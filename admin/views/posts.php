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
                                <tr>
                                    <td>1</td>
                                    <td>برنامه نوسی</td>
                                    <td>احسان</td>
                                    <td> ن  qp</td>
                                    <td>ندارد</td>
                                    <td>تگ ها</td>
                                    <td>منتشر شده</td>
                                    <td>12/6/2033</td>
                                    <td>12/6/2033</td>
                                    <td>12/6/2033</td>
                                    <td>
                                        <a href="<?= siteUrl('admin/views/editPost.php') ?>?postId=" class="btn-warning p-2 ms-2" style="border-radius: 4px; border: 1px solid yellow">ویراش</a>
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