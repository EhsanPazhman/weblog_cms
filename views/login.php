<?php include "header.php"; ?>
    <br><br><br><br>
<?php if (!empty($_SESSION['error'])): ?>
    <h4 class="alert alert-danger" style="width: 50%; margin: auto; text-align: center"><?= $_SESSION['error'] ?></h4>
    <?php unset($_SESSION['error']) ?>
<?php endif; ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-12 col-lg-4">
                <form action="<?= siteUrl('auth.php?action=login') ?>" method="POST" class="register-form">
                    <input name="email" type="email" placeholder="ایمیل">
                    <input name="password" type="password" placeholder="رمز عبور"><br>
                    <input type="checkbox" class="rememberme" style="display:inline"><span class="remembermelabel">مرا به خاطر بسپار</span>
                    <div class="userac"><a href="register.php">حساب کاربری ندارید؟ ثبت نام کنید</a></div>
                    <input type="submit" value="ورود" class="btn btn-primary submit-register">
                </form>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
    <br><br><br>
    </div>
    <!-- footer my website -->
<?php include "footer.php"; ?>