<?php
include "bootstrap/init.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $action = $_GET['action'];
    if ($action == 'register'){
        $name = $_POST['name'];
        $repass = $_POST['repass'];
        if (empty($name) || empty($email) || empty($password) || empty($repass))
            setErrorAndRedirect('تمامی فیلدها باید پر شوند!','views/register.php');
//        if ($username == getUserName($username))
//            setErrorAndRedirect('نام کاربری قبلا گرفته شده است!', 'views/register.php');
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            setErrorAndRedirect('لطفا یک ایمیل معتبر وارد کنید!', 'views/register.php');
        if ($email == getUserByEmail($email))
            setErrorAndRedirect('شما قبلا با این ایمیل ثبت نام کرده اید!', 'views/register.php');
        if (strlen($password) < 6)
            setErrorAndRedirect('رمز عبور باید بیشتر از 6 حرف باشد!', 'views/register.php');
        if ($repass != $password)
            setErrorAndRedirect('رمز عبور یکسان نیست!', 'views/register.php');
        if (empty($name) || empty($email) || empty($password) || empty($repass))
            setErrorAndRedirect('تمامی فیلدها باید پر شوند!','views/register.php');
        if (register($_POST))
            successMessage('ثبت نام با موفقیت انجام شد', 'index.php');
    }
    if ($action == 'login'){
        $user = getUserByEmail($email);
        if (empty($email))
            setErrorAndRedirect('هیج ایمیلی وارد نشده است!', 'views/login.php');
        if (empty($password))
            setErrorAndRedirect('لطفا رمز عبور خود را وارد کنید!', 'views/login.php');
        if ($email != $user->email)
            setErrorAndRedirect('لطفا ایمیل خود را به درستی وارد کنید','views/login.php');
        if ($password != password_verify($password, $user->password))
            setErrorAndRedirect('رمز عبور اشتباه است!','views/login.php');
        if (login($email, $password))
            successMessage('با موفقیت وارد شدید.', 'index.php');
    }
}