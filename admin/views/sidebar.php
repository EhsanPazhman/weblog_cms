<div class="sidebar ps-4 pb-3">
    <div class="navF">
        <nav class="navbar bg-secondary navbar-dark">
            <a href="<?= siteUrl('admin/index.php') ?>" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><i class="fa fa-user-edit ms-2"></i>DarkPan</h3>
            </a>
            <div class="d-flex align-items-center me-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="<?= adminAssets('img/user.jpg') ?>" alt="" style="width: 40px; height: 40px;">
                    <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                </div>
                <div class="me-3">
                    <h6 class="mb-0"><?= $user->name ?></h6>
                    <span>ادمین</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="<?= siteUrl('admin/index.php') ?>" class="nav-item nav-link"><i class="fa fa-tachometer-alt"></i>داشبورد</a>
                <a href="<?= siteUrl('admin/views/categories.php') ?>" class="nav-item nav-link"><i class="bi bi-card-list"></i>دسته بندی ها</a>
                <a href="<?= siteUrl('admin/views/posts.php') ?>" class="nav-item nav-link"><i class="bi bi-file-post"></i>مقالات</a>
                <a href="<?= siteUrl('admin/views/users.php') ?>" class="nav-item nav-link"><i class="bi bi-people-fill"></i>کاربران</a>
                <a href="<?= siteUrl('admin/views/comments.php') ?>" class="nav-item nav-link"><i class="bi bi-chat-right-dots-fill"></i>کامنت ها</a>
            </div>
        </nav>
    </div>
</div>