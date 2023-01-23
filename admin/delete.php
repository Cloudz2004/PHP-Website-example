<?php ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); ?>
<?php 
require_once("../connection.php");
include("./checkforRank.php");
if(isset($_GET['Del']))
{
    $UserID = $_GET['Del'];
    $query = " delete from prakse where ID = '".$UserID."'";
    $result = mysqli_query($conn,$query);
    if($result)
    {
        header("location:../front-end/admin.panel.php");
    }
    else
    {
        echo ' Please Check Your Query ';
    }
}
else
{
    header("location:../front-end/admin.panel.php");
}
?>