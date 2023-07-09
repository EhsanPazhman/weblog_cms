<?php
// Number of entries to show in a page.
$prePag = 8;
// Look for a GET variable page if not found default is 1.
$page = $_GET['page'] ?? 1;
$startFrom = ($page - 1) * $prePag;
// function to read all information from database
function readAll($tableName): bool|array
{
    global $startFrom;
    global $prePag;
    global $conn;
    $sql = "SELECT * FROM `$tableName` LIMIT $startFrom,$prePag";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

// Count the number of table columns in database
    function countTable($tableName, $condition =''): bool|array
    {
    global $conn;
    $sql = "SELECT count(*) as count FROM $tableName $condition";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // function to read a category, comment, post....
    function read($tableName, $id): array|bool
    {
        global $conn;
        $sql = "SELECT * FROM $tableName WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // function to edit a comment category...
    function update($tableName, $column, $content, $id): bool
    {
        global $conn;
        $sql = "UPDATE `$tableName` SET $column = :content, updated_at = CURRENT_TIMESTAMP WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':content' => $content, ':id' => $id]);
        return (bool)$stmt->rowCount();

    }

    // function to delete a post,category,comment,user .....

    function delete($tableName, $id): bool
    {
        global $conn;
        $sql = "DELETE FROM `$tableName` WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return (bool)$stmt->rowCount();
    }

    // function to change status of a post,category,comment....
    function changeStatus($tableName, $id): bool
    {
        global $conn;
        $sql = "UPDATE $tableName SET `status` = 1 - `status` WHERE `id` = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return (bool)$stmt->rowCount();
}