<?php ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body>
    <div class="register_forum">
        <h1>Register new user</h1>
        <p>Registering new user you agree to our<br><a href="#" class="terms_url">Terms and service/privacy policy</a><br><a href="./front-end/login.php">Im already a member!</a></p>
        <form action="./back-end/register.php" method="post">
            <input type="text" id="username" placeholder="Username" name="username"><br>
            <input type="email" id="email" placeholder="Email@mail.com" name="email"><br>
            <input type="password" id="password" placeholder="Password" name="password"><br>
            <select name="job" id="job" class="job-select">
            <option value="computer_engineer">Computer engineer</option>
            <option value="doctor">Doctor</option>
            <option value="scientist">Scientist</option>
            <option value="therapist">Therapist</option>
            </select><br>
            <input type="submit" class="register-btn" name="reg_user" value="Register">
        </form>
    </div>
</body>
</html>