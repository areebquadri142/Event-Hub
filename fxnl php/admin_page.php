<?php

@include 'config2.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style2.css">
   <style>
   body, html {
   height: 100%;
   margin: 0;
   }

   .container {
   /* The image used */
   background-image: url("./image/b2_image.jpg");

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
   
   
<div class="container">
<div class="content">
      <h3>hi, <span>Admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p></p>
      <!-- <a href="login_form.php" class="btn">login</a> -->
      <a href="Maintain.php" class="btn">Maintain Menu</a>
      <a href="report.php" class="btn">Report Menu</a>
      <a href="transection.php" class="btn">Transection</a>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>