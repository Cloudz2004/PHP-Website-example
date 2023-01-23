
<!-- <html">
   
   <head>
      <title>Welcome!</title>

   </head>
   
   <body> -->
      <!-- <h2><a href = "./logout.php">Sign Out</a></h2> -->
   <!-- </body>
   
</html> -->
<?php ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); ?>

<?php 
  require "../connection.php";
  $query = " select * from prakse ";
  $results = mysqli_query($conn,$query);
?>
<?php 
include("../session.php")
?>

<?php 
    $rank = $row["role"];
    if($rank !== "admin" && $rank !== "moderator" && $rank !== "owner") {
        header("Location:./panel.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Welcome <?php echo $login_username ?></title>
   <link rel="stylesheet" href="./styles/admin.panel.css">
   <script src="https://kit.fontawesome.com/6ed7cad5b8.js" crossorigin="anonymous"></script>


</head>

<body>
      <header>
         <nav>
            <div id = "navigationBar">
               <a href="#users">Control Panel</a>
               <!-- <a href="#">Profile</a> -->
               <!-- <button onclick ="location.href='../back-end/logout.php'" id="logout">Logout</button> -->
               <button onclick ="location.href='./profile.php'" id="profileInfo">Profile/logout</button>         
            </div>
         </nav>
      </header>


      <section id="about">
         <h1>Welcome dear user: <?php echo $login_username ?></h1>
         <p class="Exp_title">Welcome: <?php echo $login_username ?>, here's the list of your information!</p>
         <div class="my_info">
            <p class="p_info"> Welcome to the admin panel </p>
            <p class="p_info"> Here you are able to control any user's data without their permission! </p>
         </div>
      </section>

      <section id ="users">
        <h1>Control panel</h1>
        <p>Here you are able to control users data!<br>Performing actions within users is a high risk with no undo changes!</p>

        <div class="container">
                        <table class="stats_table">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Username </th>
                                <th> Rank </th>
                                <th> Email </th>
                                <th> Job</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($results))
                                    {
                                        $UserID = $row['id'];
                                        $UserName = $row['username'];
                                        $UserRole = $row['role'];
                                        $UserEmail = $row['email'];
                                        $UserJob = $row["job"];
                    
                            ?>
                                    <tr>
                                        <td><?php echo $UserID ?></td>
                                        <td><?php echo $UserName ?></td>
                                        <td><?php echo $UserRole ?></td>
                                        <td><?php echo $UserEmail ?></td>
                                        <td><?php echo $UserJob?></td>
                                        <td><a href="./admin.edit.php?GetID=<?php echo $UserID ?>">Edit</a></td>
                                        <td><a href="../admin/delete.php?Del=<?php echo $UserID ?>">Delete</a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   

                        </table>
        </div>
    

      </section>


</body>

</html>