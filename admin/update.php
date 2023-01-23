<?php ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); ?>
<?php 

    require_once("../connection.php");
    include("./checkforRank.php");
    if(isset($_POST['update']))
    {
        $UserID = $_GET['ID'];
        $UserName = $_POST['username'];
        $UserEmail = $_POST['email'];
        $UserRank = $_POST['role'];
        $UserJob = $_POST['job'];

        $query = " update prakse set username = '".$UserName."', email = '".$UserEmail."', job = '".$UserJob."', role='".$UserRank."' where ID='".$UserID."'";
        $result = mysqli_query($conn,$query);

        if($result)
        {
            header("location:../front-end/admin.panel.php");
        }
        else
        {
            echo 'There was an issue updating!';
        }
    }
    else
    {
        header("location:../front-end/admin.panel.php");
    }


?>