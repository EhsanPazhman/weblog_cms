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
        <div class="row vh-100 rounded align-items-center justify-content-center">
            <div class="col-12 h-100">
                <div class="col-12">
                    <div class="bg-secondary rounded h-auto p-4 mt-5 mx-auto w-75">
                        <a href="<?= siteUrl('admin/views/comments.php') ?>" class="btn-success mb-3 p-2" id="aStyle"><span>بازگشت به صفحه قبل</span></a>
                        <h6 class="mb-4">ویرایش کامنت</h6>

                        <form action="<?= siteUrl('') ?>" method="post">
                            <div class="form-floating">
                                <textarea class="form-control" id="floatingTextarea" style="height: 150px;"></textarea>
                                <label for="floatingTextarea" style="top: 12px;">متن فعلی کامنت</label>
                            </div>
                            <button type="submit" class="btn btn-warning mt-3">ویرایش</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blank End -->

<?php include "footer.php"; ?>