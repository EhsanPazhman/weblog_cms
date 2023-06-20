<?php
include "../bootstrap/init.php";

// Get the sent ID
$id = $_GET['id'] ?? null;
// Removal condition for all information
if (isset($id) and is_numeric($id)){
    if (deleteCategory($id))
        successMessage('دسته بندی با موفقیت حذف شد', 'admin/views/categories.php');
    if (deletePost($id))
        successMessage('مقاله با موفقیت حذف شد', 'admin/views/posts.php');
    if (changeRole($id))
        successMessage('نقش کاربر با موفقیت تغییر یافت', 'admin/views/users.php');

}

// The condition of checking the type of server request
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = $_GET['action'];

    /* start add category conditions */
    $name = $_POST['name'] ?? null;
    if ($action == 'addCategory'){
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
    if ($action == 'editCategory'){
        if (empty($name))
            setErrorAndRedirect('نام دسته بندی نمیتواند خالی باشد!', "admin/views/editCategory.php?categoryId=$id");
        if (strlen($name) <= 10)
            setErrorAndRedirect('نام دسته بندی نمیتواند کمتر از 5 حرف باشد!', "admin/views/editCategory.php?categoryId=$id");
        if ($name == readCategoryByName($name))
            setErrorAndRedirect('نام دسته بندی از قبل وجود دارد!', "admin/views/editCategory.php?categoryId=$id");
        if (updateCategory($name,$id))
            successMessage('دسته بندی با موفقیت ویراش شد', 'admin/views/categories.php');
    }
    /* end edit category conditions */

    /* start add post conditions */
    $category = $_POST['category'];
    $author = $_POST['author'];
    $title = $_POST['title'];
    $img = $_POST['img'];
    $description = $_POST['description'];
    $tags = $_POST['tags'];
    if ($action == 'addPost'){
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
    if ($action == 'editPost'){
        if (empty($category) or empty($author) or empty($title) or empty($img) or empty($description) or empty($tags))
            setErrorAndRedirect('پر بودن تمامی فیلد ها الزامی میباشد!', "admin/views/editPost.php?postId=$id");
        if (strlen($title) < 20)
            setErrorAndRedirect('عنوان نمیتوند کمتر از 10 حرف فارسی و یا 20 حرف انگلیسی باشد', "admin/views/editPost.php?postId=$id");
        if (strlen($title) > 100)
            setErrorAndRedirect('عنوان نمیتواند بیشتر از 50 حرف فارسی و یا 100 حرف انگلیسی باشد', "admin/views/editPost.php?postId=$id");
        if (strlen($description) < 10)
            setErrorAndRedirect('متن مقاله نمیتواند کمتر از 5 حرف باشد', "admin/views/editPost.php?postId=$id");
        if (strlen($tags) > 20)
            setErrorAndRedirect('تگها نمیتواند بیشتر از 10 حرف باشد', "admin/views/editPost.php?postId=$id");
        if (updatePost($_POST,$id))
            successMessage('مقاله با موفقیت افزوده شد', 'admin/views/posts.php');
    }
    /* end edit post conditions */

    /* start edit post conditions */
    /* end edit post conditions */

}
include "views/index.php";