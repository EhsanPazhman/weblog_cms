<?php
session_start();
$counter = 0;
// Get the sent action
$action = $_GET['action'] ?? null;
// Get the sent ID
$id = $_GET['id'] ?? null;

include "constants.php";
include BASE_PATH . "bootstrap/config.php";
include BASE_PATH . "vendor/autoload.php";
include BASE_PATH . "functions/helpers.php";

try {
    $conn = new PDO("mysql:host=$db->host; dbname=$db->name;", $db->user, $db->pass);
    // Set PDO Error Mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo 'Connected successfully';
}catch (PDOException $e) {
    echo 'Connection Failed' . $e->getMessage();
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


// include files
include BASE_PATH . "functions/common-f.php";
include BASE_PATH . "functions/auth-f.php";
include BASE_PATH . "functions/categories-f.php";
include BASE_PATH . "functions/posts-f.php";
include BASE_PATH . "functions/users-f.php";
include BASE_PATH . "functions/comments-f.php";