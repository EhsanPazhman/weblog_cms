<?php include "header.php";
$id = $_GET['categoryId'] ?? null;
$category = readCategory($id);
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
            <?php if (!empty($_SESSION['error'])): ?>
                <h4 class="alert bg-danger"
                    style="width: 50%; margin: auto; text-align: center"><?= $_SESSION['error'] ?></h4>
                <?php unset($_SESSION['error']) ?>
            <?php endif; ?>
            <div class="col-12 h-100">
                <div class="col-12">
                    <div class="bg-secondary rounded h-auto p-4 mt-5 mx-auto w-50">
                        <a href="<?= siteUrl('admin/views/categories.php') ?>" class="btn-success mb-3 p-2" id="aStyle"><span>بازگشت</span></a>
                        <h6 class="mb-4">ویرایش دسته بندی</h6>
                        <form action="<?= siteUrl('admin/')?>?action=editCategory&id=<?= $category[0]->id ?? null ?>" method="post">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">نام دسته بندی خود را ورد کنید</label>
                                <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="نام فعلی:  <?= $category[0]->name ??null ?>">
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