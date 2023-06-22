<?php
// function to add Categories
function addCategory($name): bool
{
    global $conn;
    $sql = "INSERT INTO categories (name) VALUES (:name)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':name' => $name]);
    return (bool)$stmt->rowCount();
}
// function to read all categories from database
function readAllCategories(): array|bool
{
    global $conn;
    $sql = "SELECT * FROM categories";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
$categories = readAllCategories();

// function to read one Category from database
function readCategoryByName($name): bool
{
    global $conn;
    $sql = "SELECT * FROM categories WHERE name = :name";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':name' => $name]);
    return (bool)$stmt->rowCount();
}

