<?php
// function to search posts
function searchPosts($keyWord): bool|array
{
    global $conn;
    $sql = "SELECT * FROM `articles` WHERE title LIKE '%$keyWord%' OR description LIKE '%$keyWord%' AND status = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

