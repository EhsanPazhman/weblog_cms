<?php
include "bootstrap/init.php";
$keyWord = $_POST['keyWord'] ?? null;
// autontinuation for search results
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($action == 'search'){
        if (empty($keyWord)) {
            setErrorAndRedirect('متنی برای جستجو وارد نشده!', '');
        }
        if (sizeof(searchPosts($keyWord)) == 0)
            setErrorAndRedirect('نتیجه ای یافت نشد!', '');
    }
}
$searchResults = searchPosts($keyWord);
//var_dump($searchResults);
//die();
include "views/search.php";