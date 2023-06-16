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
    return $stmt->rowCount() ? true : false;
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

//// Get the user`s username
//function getUserName($username): bool
//{
//    global $conn;
//    $sql = "SELECT * FROM users WHERE username = :username";
//    $stmt = $conn->prepare($sql);
//    $stmt->execute([':username' => $username]);
//    return $stmt->rowCount() ? true : false;
//}

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

// User exit function
function userExit()
{
     unset($_SESSION['login']);
}
