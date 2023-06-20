<?php
include "../bootstrap/init.php";

// Get the sent ID
$id = $_GET['id'] ?? null;
// Removal condition for all information
if (isset($id) and is_numeric($id)){
    if (deleteCategory($id))
        successMessage('دسته بندی با موفقیت حذف شد', 'admin/views/categories.php');

}

// The condition of checking the type of server request
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = $_GET['action'];
    $name = $_POST['name'];
    /* start add category conditions */
    if ($action == 'addCategory'){
        if ($name == readCategoryByName($name))
            setErrorAndRedirect('نام دسته بندی از قبل وجود دارد!', "admin/views/addCategory.php");
        if (empty($name))
            setErrorAndRedirect('نام دسته بندی نمیتواند خالی باشد!', 'admin/views/addCategory.php');
        if (strlen($name) <= 10)
            setErrorAndRedirect('نام دسته بندی نمیتواند کمتر از 5 حرف باشد!', 'admin/views/addCategory.php');
        if (addCategory($name))
            successMessage('دسته بندی با موفقیت اضافه شد', 'admin/views/categories.php');
    }
    /* end add category conditions */

    /* start edit category conditions */
    if ($action == 'editCategory'){
        if ($name == readCategoryByName($name))
            setErrorAndRedirect('نام دسته بندی از قبل وجود دارد!', "admin/views/editCategory.php?categoryId=$id");
        if (empty($name))
            setErrorAndRedirect('نام دسته بندی نمیتواند خالی باشد!', "admin/views/editCategory.php?categoryId=$id");
        if (strlen($name) <= 10)
            setErrorAndRedirect('نام دسته بندی نمیتواند کمتر از 5 حرف باشد!', "admin/views/editCategory.php?categoryId=$id");
        if (updateCategory($name,$id))
            successMessage('دسته بندی با موفقیت ویراش شد', 'admin/views/categories.php');
    }
    /* end edit category conditions */

}
include "views/index.php";