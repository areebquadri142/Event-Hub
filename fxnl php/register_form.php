<?php

@include 'config2.php';

if(isset($_POST['submit'])){
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'uploaded_img/'.$p_image;
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $contact = mysqli_real_escape_string($conn, $_POST['contact']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $occupation = mysqli_real_escape_string($conn, $_POST['occupation']);
   $end = mysqli_real_escape_string($conn, $_POST['end_d']);
   $start = mysqli_real_escape_string($conn, $_POST['start_d']);
   $pass = md5($_POST['password']);
   // $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'already exist!';

   }else{

         $insert = "INSERT INTO form(name, email,contact, password,address,occupation,start,end ,user_type,image,status) VALUES('$name','$email','$contact','$pass','$address','$occupation','$start','$end','$user_type','$p_image','Active')";
         $insert_query=mysqli_query($conn, $insert);
         if($insert_query){
            move_uploaded_file($p_image_tmp_name, $p_image_folder);
            $message[] = 'product add succesfully';
            header('location: login_form.php');
         }else{
            $message[] = 'could not add the product';
         }
         
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style2.css">
   <style>
   body, html {
   height: 100%;
   margin: 0;
   }

   .form-container{
   /* The image used */
   background-image: url("./images/b11_image.jpg");

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
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Registration</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required> 
      <input type="text" name="name" required placeholder="Enter name">
      <input type="email" name="email" required placeholder="Enter email">
      <!-- <input type="number" name="cnumber" required placeholder="Enter contact Number"> -->
      <input type="text" name="password" required placeholder="password">
      <input type="text" name="contact" required placeholder="contact Number">
      <input type="text" name="address" required placeholder="Enter Address">
      <!-- <input type="text" name="" required placeholder="Enter Aadhar Number"> -->
      <select name="occupation">
      <option value="customer">customer</option>
         <option value="florist">Florist</option>
         <option value="catering">Catering</option>
         <option value="venue">Event Place</option>
         <option value="cloth">wedding cloths</option>
         <option value="activity">Diffent Activity</option>
      </select>
      <input type="date" name="start_d" required placeholder="Enter Start date">
      <input type="date" name="end_d" required placeholder="Enter End date">
      
      <!-- <input type="password" name="cpassword" required placeholder="confirm password"> -->
      <select name="user_type">
         <option value="user">user</option>
         <option value="vendor">vendor</option>
         <!-- <option value="admin">admin</option> -->
      </select>
      
      <input type="submit" name="submit" value="Add Membership now" class="form-btn">
      <!-- <p>already have an account? <a href="login_form.php">login now</a></p> -->
   </form>

</div>

</body>
</html>