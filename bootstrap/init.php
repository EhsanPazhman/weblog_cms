<?php
session_start();
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
include BASE_PATH . "functions/f-auth.php";
include BASE_PATH . "functions/f-categories.php";