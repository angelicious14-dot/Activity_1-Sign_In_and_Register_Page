<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: index.html");
    exit;
}

$fullname = htmlspecialchars(
    $_SESSION["fullname"],
    ENT_QUOTES,
    "UTF-8"
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Welcome!</h2>

    <p style="text-align:center; margin:20px 0;">
        Hello, <?php echo $fullname; ?>!
    </p>

    <p style="text-align:center;">
        You have successfully logged in.
    </p>

    <form action="logout.php" method="POST">
        <button type="submit">Logout</button>
    </form>
</div>

</body>
</html>
