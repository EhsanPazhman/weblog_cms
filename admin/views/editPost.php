<?php include "header.php";
$id = $_GET['postId'] ?? null;
$post = read('articles',$id);
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
                <a href="<?= siteUrl('admin/views/posts.php') ?>" class="btn-success mb-3 p-2" id="aStyle"><span>بازگشت به صفحه قبل</span></a>
                <!-- Form Start -->
                <div class="bg-secondary rounded h-100 p-4 ">
                    <h6 class="mb-4">ویرایش مقاله</h6>
                    <form action="<?= siteUrl('admin/') ?>?action=editPost&id=<?= $post[0]->id ?>" method="post">
                    <div class="form-floating mb-3">
                        <select name="category" class="form-select" id="floatingSelect"
                                aria-label="Floating label select example" style="background-position: left 0.75rem center;">
                            <option selected><?= $post[0]->category ?></option>
                            <?php foreach ($categories as $category):  ?>
                                <option><?= $category->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="floatingSelect">دسته بندی فعلی</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="author" class="form-select" id="floatingSelect"
                                aria-label="Floating label select example" style="background-position: left 0.75rem center;">
                            <option selected><?= $user->name ?></option>
                            <?php foreach ($authors as $author):  ?>
                                <option><?= $author ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="floatingSelect">نویسنده فعلی</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input  name="title" type="text" class="form-control" id="floatingInput" value="<?= $post[0]->title ?>">
                        <label for="floatingInput">عنوان</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="img" class="form-control bg-dark" id="formFileLg" type="file" style="direction: ltr; cursor: pointer">
                        <label for="formFileLg">تصویر فعلی</label>
                    </div>
                    <div class="form-floating">
                        <textarea name="description" class="form-control" id="floatingTextarea" style="height: 150px;"><?= $post[0]->description ?></textarea>
                        <label for="floatingTextarea">متن فعلی مقاله</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input name="tags" type="text" class="form-control" id="floatingInput" value="<?= $post[0]->tags ?>">
                        <label for="floatingInput">تگ ها</label>
                    </div>
                    <button type="submit" class="btn btn-warning mt-3">ویرایش</button>
                    </form>
                </div>
                <!-- Form End -->
            </div>
        </div>
    </div>
    <!-- Blank End -->

<?php include "footer.php"; ?>