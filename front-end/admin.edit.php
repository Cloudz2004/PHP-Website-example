<?php ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); ?>
<?php 
    require_once("../connection.php");
    $UserID = $_GET['GetID'];
    $query = " select * from prakse where ID='".$UserID."'";
    $result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $UserID = $row['id'];
        $Username = $row['username'];
        $UserEmail = $row['email'];
        $UserRole = $row['role'];
        $UserJob = $row['job'];
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/admin.edit.css">
    <title>Document</title>
</head>
<body>
    <div class="content">
        <h1>Edit <?php echo $Username ?>'s information</h1>
        <p>Editing users information will change their data entirely without their own will!</p>
        <div class="inputs">
        <form action="../admin/update.php?ID=<?php echo $UserID ?>" method="post">
            <input type="text" placeholder="Username" name="username" value="<?php echo $Username ?>"><br>
            <input type="text" placeholder="Email" name="email" value="<?php echo $UserEmail ?>"><br>
            <input type="text" placeholder="Job" name="job" value="<?php echo $UserJob ?>"><br>

            <label for="role">Edit <?php echo $UserRole ?>'s role</label><br>
            <select name="role" id="role" value="<?php echo $UserRole ?>">
                <option value="member">Member</option>
                <option value="moderator">Moderator</option>
                <option value="admin">Admin</option>
                <option value="owner">Owner</option>
            </select><br>
            <button class="EditBTN" name="update">Update</button>
        </form>
        </div>

    </div>
</body>
</html>