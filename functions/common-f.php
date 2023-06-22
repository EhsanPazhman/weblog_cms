<?php

// function to read a category, comment, post....
function read($tableName,$id): array|bool
{
    global $conn;
    $sql = "SELECT * FROM $tableName WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
// function to edit a comment category...
function update($tableName,$column,$content,$id): bool
{
    global $conn;
    $sql = "UPDATE `$tableName` SET $column = :content, updated_at = CURRENT_TIMESTAMP WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':content' =>$content ,':id' => $id]);
    return (bool)$stmt->rowCount();

}
// function to delete a post,category,comment,user .....

function delete($tableName,$id): bool
{
    global $conn;
    $sql = "DELETE FROM `$tableName` WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return (bool)$stmt->rowCount();
}

// function to change status of a post,category,comment....
function changeStatus($tableName, $id): bool
{
    global $conn;
    $sql = "UPDATE $tableName SET `status` = 1 - `status` WHERE `id` = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return (bool) $stmt->rowCount();
}