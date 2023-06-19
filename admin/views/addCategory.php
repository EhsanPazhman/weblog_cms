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
                <div class="col-12">
                    <div class="bg-secondary rounded h-auto p-4 mt-5 mx-auto w-50">
                        <a href="<?= siteUrl('admin/views/categories.php') ?>" class="btn-success mb-3 p-2" id="aStyle"><span>بازگشت</span></a>
                        <h6 class="mb-4">افزودن دسته بندی</h6>
                        <form action="<?= siteUrl('') ?>" method="post">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">نام دسته بندی خود را ورد کنید</label>
                                <input type="email" class="form-control" id="exampleInputEmail1">
                            </div>
                            <button type="submit" class="btn btn-success mt-3">افزودن</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blank End -->

<?php include "footer.php"; ?>