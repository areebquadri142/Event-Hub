
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
<?php include 'head.php'; ?>
<div class="container">

   <div class="content">
      <h3>hi, <span>user</span></h3>
      <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>Plan by your self</p>
      <!-- <a href="login_form.php" class="btn">login</a> -->
      <a href="u_report.php" class="btn">Your Item</a>
      <a href="vendors.php" class="btn">vendors</a>
      <a href="transection.php" class="btn">Transection</a>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>