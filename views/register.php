<?php include "header.php"; ?>
<br><br><br>
    <?php if (!empty($_SESSION['error'])): ?>
<h4 class="alert alert-danger" style="width: 50%; margin: auto; text-align: center"><?= $_SESSION['error'] ?></h4>
<?php unset($_SESSION['error']) ?>
<?php endif; ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-12 col-lg-4">
                <form action="<?= siteUrl('auth.php?action=register') ?>" method="POST" class="register-form">
                    <input name="username" type="text" placeholder="نام کاربری">
                    <input name="email" type="text" placeholder="ایمیل">
                    <input name="password" type="password" placeholder="رمز عبور">
                    <input name="repass" type="password" placeholder="تکرار رمز عبور"><br>
                    <input type="submit" value="ثبت نام" class="btn btn-primary submit-register">
                </form>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
    <br><br><br>
    </div>
    <!-- footer my website -->
<?php include "footer.php"; ?>