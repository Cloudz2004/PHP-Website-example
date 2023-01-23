<?php
   include('connection.php');
   session_start();
   $user_check = $_SESSION['login_user'];


   // fetch logged user
   $ses_sql = mysqli_query($conn, "SELECT * FROM `prakse` WHERE email = '$user_check'");
   $row = mysqli_fetch_assoc($ses_sql);


   $login_email = $row['email'];
   $login_username = $row['username'];
   $login_job = $row["job"];
   $login_id = $row["id"];
   $login_role = $row["role"];


   if(!isset($_SESSION['login_user'])){
      header("location:./front-end/login.php");
      die();
   }
?>