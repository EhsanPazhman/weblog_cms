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
                <a href="<?= siteUrl('admin/views/posts.php') ?>" class="btn-success mb-3 p-2" id="aStyle"><span>بازگشت به صفحه قبل</span></a>
                <!-- Form Start -->
                <div class="bg-secondary rounded h-100 p-4 ">
                    <h6 class="mb-4">ویرایش مقاله</h6>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect"
                                aria-label="Floating label select example" style="background-position: left 0.75rem center;">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <label for="floatingSelect">انتخاب دسته بندی</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect"
                                aria-label="Floating label select example" style="background-position: left 0.75rem center;">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <label for="floatingSelect">انتخاب نویسنده</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput">
                        <label for="floatingInput">عنوان</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control bg-dark" id="formFileLg" type="file" style="direction: ltr; cursor: pointer">
                        <label for="formFileLg">آپلود تصویر</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" id="floatingTextarea" style="height: 150px;"></textarea>
                        <label for="floatingTextarea">متن فعلی مقاله مقاله</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="text" class="form-control" id="floatingInput">
                        <label for="floatingInput">تگ ها</label>
                    </div>
                </div>
                <!-- Form End -->
            </div>
        </div>
    </div>
    <!-- Blank End -->

<?php include "footer.php"; ?>