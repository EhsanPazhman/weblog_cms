<?php
include "../bootstrap/init.php";

// The condition of checking the type of server request
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Delete post, category, users.....
    if ($action == 'delete') {
        if (delete('categories', $id))
            successMessage('دسته بندی با موفقیت حذف شد', 'admin/views/categories.php');
        if (delete('articles', $id))
            successMessage('مقاله با موفقیت حذف شد', 'admin/views/posts.php');
        if (delete('users', $id))
            successMessage('کاربر با موفقیت حذف شد', 'admin/views/users.php');
        if (delete('comments', $id))
            successMessage('کامنت با موفقیت حذف شد', 'admin/views/comments.php');
    }
    // change status ....
    if (isset($id) and is_numeric($id)) {
        if (changeRole($id))
            successMessage('نقش کاربر با موفقیت تغییر یافت', 'admin/views/users.php');
        if ($action == 'postStatus'){
            if (changeStatus('articles', $id))
                successMessage('مقاله با موفقیت تایید شد', 'admin/views/posts.php');
        }

        if ($action == 'commentStatus'){
        if (changeStatus('comments', $id))
            successMessage('کامنت با موفقیت تایید شد', 'admin/views/comments.php');
    }
    }
}
// The condition of checking the type of server request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    /* start add category conditions */
    $name = $_POST['name'] ?? null;
    if ($action == 'addCategory') {
        if (empty($name))
            setErrorAndRedirect('نام دسته بندی نمیتواند خالی باشد!', 'admin/views/addCategory.php');
        if (strlen($name) <= 10)
            setErrorAndRedirect('نام دسته بندی نمیتواند کمتر از 5 حرف باشد!', 'admin/views/addCategory.php');
        if ($name == readCategoryByName($name))
            setErrorAndRedirect('نام دسته بندی از قبل وجود دارد!', "admin/views/addCategory.php");
        if (addCategory($name))
            successMessage('دسته بندی با موفقیت اضافه شد', 'admin/views/categories.php');
    }
    /* end add category conditions */

    /* start edit category conditions */
    if ($action == 'editCategory') {
        if (empty($name))
            setErrorAndRedirect('نام دسته بندی نمیتواند خالی باشد!', "admin/views/editCategory.php?categoryId=$id");
        if (strlen($name) <= 10)
            setErrorAndRedirect('نام دسته بندی نمیتواند کمتر از 5 حرف باشد!', "admin/views/editCategory.php?categoryId=$id");
        if ($name == readCategoryByName($name))
            setErrorAndRedirect('نام دسته بندی از قبل وجود دارد!', "admin/views/editCategory.php?categoryId=$id");
        if (update('categories','name',$name, $id))
            successMessage('دسته بندی با موفقیت ویراش شد', 'admin/views/categories.php');
    }
    /* end edit category conditions */

    /* start add post conditions */
    $category = $_POST['category'] ?? null;
    $author = $_POST['author'] ?? null;
    $title = $_POST['title'] ?? null;
    $img = $_POST['img'] ?? null;
    $description = $_POST['description'] ?? null;
    $tags = $_POST['tags'] ?? null;
    if ($action == 'addPost') {
        if (empty($category) or empty($author) or empty($title) or empty($img) or empty($description) or empty($tags))
            setErrorAndRedirect('پر بودن تمامی فیلد ها الزامی میباشد!', 'admin/views/addPost.php');
        if (strlen($title) < 20)
            setErrorAndRedirect('عنوان نمیتوند کمتر از 10 حرف فارسی و یا 20 حرف انگلیسی باشد', 'admin/views/addPost.php');
        if (strlen($title) > 100)
            setErrorAndRedirect('عنوان نمیتواند بیشتر از 50 حرف فارسی و یا 100 حرف انگلیسی باشد', 'admin/views/addPost.php');
        if (strlen($description) < 10)
            setErrorAndRedirect('متن مقاله نمیتواند کمتر از 5 حرف باشد', 'admin/views/addPost.php');
        if (strlen($tags) > 20)
            setErrorAndRedirect('تگها نمیتواند بیشتر از 10 حرف باشد', 'admin/views/addPost.php');
        if (addPost($_POST))
            successMessage('مقاله با موفقیت افزوده شد', 'admin/views/posts.php');
    }
    /* end add post conditions */

    /* start edit post conditions */
    if ($action == 'editPost') {
        if (empty($category) or empty($author) or empty($title) or empty($img) or empty($description) or empty($tags))
            setErrorAndRedirect('پر بودن تمامی فیلد ها الزامی میباشد!', "admin/views/editPost.php?postId=$id");
        if (strlen($title) < 20)
            setErrorAndRedirect('عنوان نمیتوند کمتر از 10 حرف فارسی و یا 20 حرف انگلیسی باشد', "admin/views/editPost.php?postId=$id");
        if (strlen($title) > 100)
            setErrorAndRedirect('عنوان نمیتواند بیشتر از 50 حرف فارسی و یا 100 حرف انگلیسی باشد', "admin/views/editPost.php?postId=$id");
        if (strlen($description) > 3000)
            setErrorAndRedirect('متن مقاله نمیتواند کمتر از 5 حرف باشد', "admin/views/editPost.php?postId=$id");
        if (strlen($tags) > 20)
            setErrorAndRedirect('تگها نمیتواند بیشتر از 10 حرف باشد', "admin/views/editPost.php?postId=$id");
        if (updatePost($_POST, $id))
            successMessage('مقاله با موفقیت افزوده شد', 'admin/views/posts.php');
    }
    /* end edit post conditions */

    /* start edit comment conditions */
    if ($action == 'editComment'){
        if (empty($name) || !isset($name))
            setErrorAndRedirect('متن نظر نمیتواند خالی باشد!', "admin/views/editComment.php?commentId=$id");
        if (update('comments','comment',$name, $id))
            successMessage('کامنت با موفقیت ویرایش شد', "admin/views/comments.php");
            successMessage('کامنت با موفقیت ویرایش شد', "admin/views/comments.php");

    }
    /* end edit comment conditions */

}
if (isset($_GET['exit']))
{
    userExit();
}
if (loginCheck()){
    include "views/index.php";
}else{
    include "../views/index.php";
}
