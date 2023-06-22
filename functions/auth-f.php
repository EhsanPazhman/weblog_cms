<?php
// User registration function
function register($userData): bool
{
    global $conn;
    $password = password_hash($userData['password'], PASSWORD_BCRYPT);
    $repass = password_hash($userData['repass'], PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (name, email, password, repass) VALUES (:name, :email, :password, :repass)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':name' => $userData['name'], 'email' => $userData['email'], ':password' => $password, ':repass' => $repass]);
    login($_POST['email'], $_POST['password']);
    return (bool)$stmt->rowCount();
}

// Getting user information by email
function getUserByEmail($email): object|null
{
    global $conn;
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':email' => $email]);
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records[0] ?? null;
}

// Get the authors
function getAuthors(): bool
{
    global $conn;
    $sql = "SELECT * FROM users WHERE role = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return (bool)$stmt->rowCount();
}
$authors = getAuthors();
// User login function
function login($email, $password): bool
{
    $user = getUserByEmail($email);
    if (is_null($user)){
        return false;
    }
    if (password_verify($password, $user->password)){
        $_SESSION['login'] = $user;
        return true;
    }
    return false;
}

// User login check function
function loginCheck(): bool
{
    return isset($_SESSION['login']) ? true : false;
}

// Get logged in user information
function getLoggedInUser()
{
    return $_SESSION['login'] ?? null;
}
$user = getLoggedInUser();

// User exit function
function userExit()
{
     unset($_SESSION['login']);
}
