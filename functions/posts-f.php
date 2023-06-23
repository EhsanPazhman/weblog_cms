<?php
// function to add Post
function addPost($data): bool
{
    global $conn;
    $sql = "INSERT INTO `articles` (category, author, title, img, description, tags) VALUES (:category, :author, :title, :img, :description, :tags)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':category' => $data['category'], ':author' => $data['author'], ':title' => $data['title'], ':img' => $data['img'], ':description' => $data['description'], ':tags' => $data['tags']]);
    return (bool)$stmt->rowCount();
}
// function to read all posts from database
// count all columns
$stmt = $conn->query('SELECT count(*) FROM articles');
$numRows = $stmt->fetchColumn();
// Number of pages required.
$totalPage = ceil($numRows/$prePag);
// function to read all categories from database
$posts = readAll('articles');

// function to update a post
function updatePost($data,$id): bool
{
    global $conn;
    $sql = "UPDATE `articles` SET category = :category, author = :author, title =  :title, img = :img, description = :description, tags = :tags, updated_at = CURRENT_TIMESTAMP WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':category' => $data['category'], ':author' => $data['author'], ':title' => $data['title'], ':img' => $data['img'], ':description' => $data['description'], ':tags' => $data['tags'], ':id' => $id]);
    return (bool)$stmt->rowCount();

}


