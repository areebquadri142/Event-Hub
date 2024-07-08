<?php

@include 'config2.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style2.css">
   <style>
   body, html {
   height: 100%;
   margin: 0;
   }

   .container {
   /* The image used */
   background-image: url("./image/user_image.png");

   /* Full height */
   height: 100%; 

   /* Center and scale the image nicely */
   background-position: center;
   background-repeat: no-repeat;
   background-size: cover;
   }
   </style>

</head>
<body>
   <?php $cat="catering"; $flo="florist"; $pla="venue"; $clo="cloth"; $act="activity" ?>
<div class="container">

   <div class="content">
      <h3>hi, <span>user</span></h3>
      <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>Plan by your Self</p>
      <!-- <a href="login_form.php" class="btn">login</a> -->
      <!-- <a href="catering .php" class="btn">Catering</a> -->
      <?php echo "<a href= 'diff_vendor.php?type=$cat' class='btn'> Catering </a>"?>
      <?php echo "<a href= 'diff_vendor.php?type=$flo' class='btn'> Florist </a>"?>
      <?php echo "<a href= 'diff_vendor.php?type=$pla' class='btn'> Event Place </a>"?>
      <?php echo "<a href= 'diff_vendor.php?type=$clo' class='btn'> Cloth </a>"?>
      <?php echo "<a href= 'diff_vendor.php?type=$act' class='btn'> Activities </a>"?>
      <!-- <a href="florist.php" class="btn">Florist</a> -->
      <!-- <a href="place.php" class="btn">Event place</a> -->
      <!-- <a href="Activities.php" class="btn">Activities</a> -->
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>