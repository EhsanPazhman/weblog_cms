<?php
include "bootstrap/init.php";
// User exit condition
if (isset($_GET['exit']))
{
    userExit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if ($action == 'addComment'){
        if (empty($_POST['comment']))
            setErrorAndRedirect('چیزی برای نظر ننوشتید!', "views/single.php?postId=$id");
        if (addComment($_POST))
            successMessage('نظر با موفقیت درج شد', "views/single.php?postId=$id");
        var_dump(successMessage());
    }
}
include "views/index.php";