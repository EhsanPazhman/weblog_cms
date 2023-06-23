<?php
// count all columns
$stmt = $conn->query('SELECT count(*) FROM categories');
$numRows = $stmt->fetchColumn();
// Number of pages required.
$totalPage = ceil($numRows/$prePag);
// function to read all categories from database
$categories = readAll('categories');

// function to add Categories
function addCategory($name): bool
{
    global $conn;
    $sql = "INSERT INTO categories (name) VALUES (:name)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':name' => $name]);
    return (bool)$stmt->rowCount();
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

