<?php
session_start();
require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit;
}

$username = trim($_POST["username"] ?? "");
$password = $_POST["password"] ?? "";

if ($username === "" || $password === "") {
    exit("Please enter your username and password.");
}

$stmt = $pdo->prepare(
    "SELECT * FROM users WHERE username = ? LIMIT 1"
);

$stmt->execute([$username]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user["password"])) {

    session_regenerate_id(true);

    $_SESSION["user_id"] = $user["id"];
    $_SESSION["fullname"] = $user["fullname"];
    $_SESSION["username"] = $user["username"];

    header("Location: dashboard.php");
    exit;

} else {
    echo "Account not found or incorrect credentials!";
    echo '<br><a href="index.html">Try Again</a>';
}
