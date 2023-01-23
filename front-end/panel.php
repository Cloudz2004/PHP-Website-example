<?php ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); ?>

<?php require "../connection.php" ?>
<?php

    $sql = "SELECT * FROM prakse";
    $list = "";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $list == "" ? $list = '"'.$row['job'].'"' : $list = $list . "," . '"'.$row['job'] .'"';
        }
    }
?>
<?php 
include("../session.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Welcome <?php echo $login_username ?></title>
   <link rel="stylesheet" href="./styles/panel.css">
   <script src="https://kit.fontawesome.com/6ed7cad5b8.js" crossorigin="anonymous"></script>


</head>

<body>
      <header>
         <nav>
            <div id = "navigationBar">
               <a href="#about">About me</a>
               <a href="#stats">Statistics</a>
               <a href="#contact">Contact</a>
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
            <p class="p_info">The job i chose is: <?php echo $login_job ?> </p>
            <p class="p_info">My username is: <?php echo $login_username ?> </p>
            <p class="p_info">My current email: <?php echo $login_email ?> </p>
            <p class="p_info">My role is: <?php echo $login_role ? $login_role : "Doesn't exist" ?> </p>
            <p class="p_info">My ID is: <?php echo $login_id ?> </p>
         </div>
      </section>
      <section id="stats">
      <canvas id="myChart"></canvas>
      </section>

      <section id ="contact">
         <h1>Contact</h1>
         <p>Having trouble figuring out or finding something?<br>leave us a message and we will take a look at it!</p>
         <div class="contact_info">
         <form action="">
            <input type="email"  id="contact_email" placeholder="email@mail.com" name="email" required><br>
            <textarea id="contact_fill" name="message" required></textarea><br>
            <input type="submit" name="contact_us" id="submit_contact" value="Contact">
         </form>
         </div>
      </section>



</body>

<script>
    var jobs = [<?php echo $list; ?>];
    let counts = jobs.reduce((acc, job) => {
    if (job in acc) {
        acc[job] += 1;
    } else {
        acc[job] = 1;
    }
    return acc;
    }, {});

    var data = Object.entries(counts).map(([job, count]) => ({ job, count }));

    var jobTitles = data.map(function(item) {
    return item.job;
    });
    var jobCounts = data.map(function(item) {
    return item.count;
    });

    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: jobTitles,
            datasets: [{
                label: 'Number of Jobs',
                data: jobCounts,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // can set width/height
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</html>