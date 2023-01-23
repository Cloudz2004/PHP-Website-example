<?php ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); ?>
<?php 
include("../session.php");


$role = $row["role"];
if($role !== "admin" && $role !== "owner" && $role !== "moderator") {
    die("You are not authorised to perform this action!");
};
?>