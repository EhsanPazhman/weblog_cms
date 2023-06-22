<?php
// function to add comment
function addComment($data): bool
{
    global $conn;
    $sql = "INSERT INTO `comments` (comment, article_title, article_id, user_name) VALUES (:comment, :article_title, :article_id, :user_name)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':comment' => $data['comment'], ':article_title' => $data['articleTitle'], ':article_id' =>$data['articleId'], ':user_name' => $data['userName']]);
    return (bool)$stmt->rowCount();
}

// function to read all comments from database
function readAllComments(): array|bool
{
    global $conn;
    $sql = "SELECT * FROM `comments`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
$comments = readAllComments();
// function to read all comments of a post from database
function readAllCommentsOfPost($id): array|bool
{
    global $conn;
    $sql = "SELECT * FROM `comments` WHERE article_id = $id AND status = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

