
<?php

@include 'config.php';

session_start();

$c=0;
if(!isset($_SESSION['USER_ID'])){
   if(!isset($_SESSION['vendor_ID'])){
         header('location:login_form.php');
   }
   $c=1;
}

?>
<?php

@include 'config.php';

$i = $_GET['rn'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
      .box{
         /* background-color:red; */
         width:120%;
      }
      .products .box-container{
         display: grid;
      grid-template-columns: repeat(auto-fit, 35rem);
      gap: 10.5rem;
      justify-content: center;
      }
      .products .box-container .box img {
       height: 20rem;
      }
      .products{
         width:100%;
      }
      table {
      border-spacing: 10px;
   border-collapse: collapse;
   width: 100%;
   color: #588c7e;
   font-family: monospace;
   font-size: 25px;
   text-align: left;
   }
   .content{
      font-size: 20px;
      background-color:gray;
      display: flex;
      justify-content: space-between;
   }
   td {
   text-align: center;
   }
   th {
      text-align: center;
   background-color: #588c7e;
   color: white;
   }
   lef{
      
   }
   tr:nth-child(even) {background-color: #f2f2f2}
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


<div class="container">

<section class="products">

   <h1 class="heading">Product Request</h1>

   <div class="box-container">

      <?php
      $select_products = mysqli_query($conn, "SELECT * FROM `order` WHERE p_Id ='$i' ");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
         <img src="uploaded_img/<?php echo $fetch_product['img']; ?>" alt="">
            <h3><?php echo $fetch_product['Name']; ?></h3>
            <h3><?php echo $fetch_product['Email']; ?></h3>
            <div class="price">Address: <?php echo $fetch_product['flat']," ",$fetch_product['city']," ",$fetch_product['state']," ",$fetch_product['Pin_code']," ",$fetch_product['country']; ?></div>
            <input type="hidden" name="name" value="<?php echo $fetch_product['Name']; ?>">
            <input type="hidden" name="add" value="<?php echo $fetch_product['flat']; ?>">

            <!-- <input type="submit" class="btn" value="add to cart" name="add_to_"> -->
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>