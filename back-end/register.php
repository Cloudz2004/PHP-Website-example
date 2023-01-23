<?php 
    require_once("../connection.php");

    if(isset($_POST['reg_user']))
    {
        if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']))
        {
            echo ' Please Fill in the Blanks ';
        }
        else
        {
            if($_POST["job"] === "computer_engineer" || $_POST["job"] === "doctor" || $_POST["job"] === "scientist" || $_POST === "therapist") {
            $Username = $_POST['username'];
            $Email = $_POST['email'];
            $AssignedJob = $_POST['job'];
            $Password = $_POST["password"];
            

            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                echo 'Invalid email address';
            }
            $select = mysqli_query($conn, "SELECT `email` FROM `Prakse` WHERE `email` = '".$_POST['email']."'") or exit(mysqli_error($connectionID));
            $selectUsername = mysqli_query($conn, "SELECT `username` FROM `Prakse` WHERE `username` = '".$_POST['username']."'") or exit(mysqli_error($connectionID));
            if(mysqli_num_rows($select)) {
                exit('This email is already being used');
            } else if(mysqli_num_rows($selectUsername)) {
                exit("This username is already taken!");
            }
              
            $query = "INSERT INTO `prakse`(`username`, `email`, `job`, `password`) VALUES ('$Username','$Email','$AssignedJob','$Password')";
            $result = mysqli_query($conn,$query);

            if($result)
            {
                header("location:../front-end/login.php");
            }
            else
            {
                echo '  There was issue posting results! ';
            }
        }else {
            echo "We don't offer that job!";
        }
        }
    }
    else
    {
        header("location:./front-end/login.php");
    }

?>