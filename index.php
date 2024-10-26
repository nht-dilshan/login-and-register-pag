<?php
// Start the session
session_start();

if(isset($_SESSION["user_id"])){

    $mysqli = require __DIR__ ."/database.php";

    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Home</h1>

    <?php if (isset($user)): ?>
        <!-- If user is logged in, display this message -->
        <p>Hello <?= htmlspecialchars($user["name"])?></p>

        <p><a href="logout.php">Log out</a></p>

    <?php else: ?>
        <!-- If user is not logged in, display login and signup links -->
        <p><a href="login.php">Log in</a> | <a href="signup.html">Sign up</a></p>
    <?php endif; ?>
</body>
</html>
