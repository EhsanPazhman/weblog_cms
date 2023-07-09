<?php
// function to add Post
function addPost($data,$imgAddress): bool
{

    global $conn;
    $sql = "INSERT INTO `articles` (category, author, title, img, description, tags) 
    VALUES (:category, :author, :title, :img, :description, :tags)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':category' => $data['category'], ':author' => $data['author'], ':title' => $data['title'],
        ':img' => $imgAddress, ':description' => $data['description'], ':tags' => $data['tags']]);
    return (bool)$stmt->rowCount();
}
// count all columns
$stmt = $conn->query('SELECT count(*) FROM articles');
$numRows = $stmt->fetchColumn();
// Number of pages required.
$totalPage = ceil($numRows/$prePag);
// function to read all posts from database
function readPublishedPosts(): bool|array
{
    global $startFrom;
    global $prePag;
    global $conn;
    $sql = "SELECT * FROM `articles` WHERE status = 1 LIMIT $startFrom,$prePag";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
$pubPosts = readPublishedPosts();
$posts = readAll('articles');

// function to update a post
function updatePost($data,$imgAddress,$id): bool
{
    global $conn;
    $sql = "UPDATE `articles` SET category = :category, author = :author, title =  :title,
   img = :img, description = :description, tags = :tags, updated_at = CURRENT_TIMESTAMP WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':category' => $data['category'], ':author' => $data['author'],':title' => $data['title'],
        ':img' => $imgAddress, ':description' => $data['description'], ':tags' => $data['tags'], ':id' => $id]);
    return (bool)$stmt->rowCount();
}

// function to add a views for posts
function addView($postId): bool
{
    global $conn;
    $sql = "INSERT INTO views SET article_id = :postId";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':postId' => $postId]);
    return (bool)$stmt->rowCount();
}


