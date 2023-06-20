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
function readAllPosts(): array|bool
{
    global $conn;
    $sql = "SELECT * FROM `articles`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
$posts = readAllPosts();

// function to read all posts from database
function readPost($id): array|bool
{
    global $conn;
    $sql = "SELECT * FROM `articles` WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
$posts = readAllPosts();

// function to update a post
function updatePost($data,$id): bool
{
    global $conn;
    $sql = "UPDATE `articles` SET category = :category, author = :author, title =  :title, img = :img, description = :description, tags = :tags WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':category' => $data['category'], ':author' => $data['author'], ':title' => $data['title'], ':img' => $data['img'], ':description' => $data['description'], ':tags' => $data['tags'], ':id' => $id]);
    return (bool)$stmt->rowCount();

}

// function to delete a post
function deletePost($id): bool
{
    global $conn;
    $sql = "DELETE FROM `articles` WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return (bool)$stmt->rowCount();
}