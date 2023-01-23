<?php require("../connection.php"); require("../session.php") ?>
<?php ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/profile.css">
   <title>My-profile</title>
</head>
<body>
    <div class="content">
        <h1>Edit/Check my profile<br><?php echo $login_username ?></h1>
        <p>Welcome to the profile section, here you can edit your profile!<br>You can also logout if you want to!</p>

        <div class="inputs">
        <form action="../back-end/profile.php">
        <input type="text" name="username" id="username" value="<?php echo $login_username ?>"><br>
        <input type="password" name="password" id="password">
        </form>
        </div>

        <a href="../back-end/logout.php" class="logout">Logout</a>
        <?php 
        $return = "";
        if($login_role === "admin") {
            $return = "./admin.panel.php";
        } else {
            $return = "./panel.php";
        }
        ?>
        <a href="<?php echo $return ?>" class="return">Return</a>
    </div>
</body>
</html>