<!-- start headers -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">وبلاگ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?= siteUrl() ?>">خانه <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    دسته ها
                </a>
                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                    <?php foreach ($categories as $category) : ?>
                        <a class="dropdown-item" href="#"><?= $category->name ?></a>
                    <?php endforeach; ?>
                </div>
            </li>
        </ul>
    </div>
    <div>
        <ul class="navbar-nav">
            <?php if (loginCheck()) : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        پروفایل
                    </a>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                        <span class="dropdown-item"><?= $user->name ?></span>
                        <span class="dropdown-item"><?= $user->email ?></span>
                        <?php if (isset($user) and $user->role == 1) : ?>
                            <?= '<a href="' . siteUrl('admin/') . '" class="dropdown-item">مدیریت</a>' ?>
                        <?php endif; ?>
                        <a class="dropdown-item" style="cursor: pointer" href="?exit">خروج</a>
                    </div>
                </li>
            <?php endif; ?>
            <?php if (!loginCheck()) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= siteUrl('views/login.php') ?>">ورود/عضویت</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<!-- end headers -->
<form action="<?= siteUrl('search.php') ?>?action=search" method="post" class="form-inline mt-4 mb-5" style="direction: ltr">
    <input name="keyWord" class="form-control mr-sm-2 placholder" type="search" placeholder="دنبال چی میگردی؟" aria-label="Search" style="margin-left: 84px">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="position: absolute;">جستجو</button>
</form>




