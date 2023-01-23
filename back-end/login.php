<?php 
    include("../connection.php");
    session_start();

    if(isset($_POST['log_user'])) {
    if(empty($_POST['email']) || empty($_POST['password'])) {
        echo "Please fill in the blanks!";
    }
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email address';
    }
       $myusername = $_POST['email'];
       $mypassword = $_POST['password']; 
       
       $sql = "SELECT * FROM Prakse WHERE email = '$myusername' and password = '$mypassword'";
       $result = mysqli_query($conn,$sql);
       $row = mysqli_fetch_assoc($result);
       $count = mysqli_num_rows($result);
        
       if($count == 1) {
        if($row["email"] === $myusername && $row["password"] === $mypassword) {
            $_SESSION['login_user'] = $myusername;
            $rank = $row["role"];
            if($rank == "admin") {
                header("location:../front-end/admin.panel.php");
            } else {
                header("location:../front-end/panel.php");
            }
        } else {
            header("location:../front-end/login.php");
        }
    } else {
      header("location:../front-end/login.php"); // if pass is incorrect or email  
    }
}
?>
