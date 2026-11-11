<?php
require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit;
}

$fullname = trim($_POST["fullname"] ?? "");
$email = trim($_POST["email"] ?? "");
$username = trim($_POST["username"] ?? "");
$password = $_POST["password"] ?? "";
$confirm = $_POST["confirm_password"] ?? "";

if (
    $fullname === "" ||
    !filter_var($email, FILTER_VALIDATE_EMAIL) ||
    $username === ""
) {
    exit("Please enter valid information.");
}

if (strlen($password) < 8) {
    exit("Password must be at least 8 characters.");
}

if ($password !== $confirm) {
    exit("Passwords do not match!");
}

if (
    strlen($fullname) > 100 ||
    strlen($email) > 150 ||
    strlen($username) > 50
) {
    exit("One or more fields are too long.");
}

try {
    $check = $pdo->prepare(
        "SELECT id FROM users
         WHERE username = ? OR email = ?"
    );

    $check->execute([$username, $email]);

    if ($check->fetch()) {
        exit("Username or email already exists!");
    }

    $hashedPassword = password_hash(
        $password,
        PASSWORD_DEFAULT
    );

    $insert = $pdo->prepare(
        "INSERT INTO users
         (fullname, email, username, password)
         VALUES (?, ?, ?, ?)"
    );

    $insert->execute([
        $fullname,
        $email,
        $username,
        $hashedPassword
    ]);

    echo "Registration successful! ";
    echo '<a href="index.html">Sign In here</a>';

} catch (PDOException $e) {
    error_log($e->getMessage());
    exit("Registration failed. Please try again.");
}
