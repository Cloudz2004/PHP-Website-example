<?php ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/login.css">
    <title>Login</title>
</head>
<body>
<div class="register_forum">
        <h1>Login</h1>
        <p>Welcome </p>
        <form action="../back-end/login.php" method="post">
            <input type="email" id="email" placeholder="Email@mail.com" name="email"><br>
            <input type="password" id="password" placeholder="Password" name="password"><br>
            <input type="submit" class="register-btn" name="log_user" value="Login">
        </form>
    </div>
</body>
</html>