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
function readCategory($id): array|bool
{
    global $conn;
    $sql = "SELECT * FROM categories WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
// function to read one Category from database
function readCategoryByName($name): bool
{
    global $conn;
    $sql = "SELECT * FROM categories WHERE name = :name";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':name' => $name]);
    return (bool)$stmt->rowCount();
}
// function to update a category
function updateCategory($name,$id): bool
{
    global $conn;
    $sql = "UPDATE `categories` SET name = :name WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':name' =>$name ,':id' => $id]);
    return (bool)$stmt->rowCount();

}

// function to delete a category
function deleteCategory($id): bool
{
    global $conn;
    $sql = "DELETE FROM `categories` WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return (bool)$stmt->rowCount();
}