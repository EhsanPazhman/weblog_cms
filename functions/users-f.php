<?php
// function to read all users from database
function readAllUsers(): array|bool
{
    global $conn;
    $sql = "SELECT * FROM `users`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
$users = readAllUsers();

// function to delete a post
function deleteUser($id): bool
{
    global $conn;
    $sql = "DELETE FROM `users` WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return (bool)$stmt->rowCount();
}

// User role change function
function changeRole($id): bool
{
    global $conn;
    $sql = "UPDATE `users` SET `role` = 1 - `role` WHERE `id` = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return (bool) $stmt->rowCount();
}
