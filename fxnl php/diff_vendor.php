<?php include 'head.php'; ?>
<?php

@include 'config.php';

// session_start();
$ven=$_GET['type'];
$c=0;
if(!isset($_SESSION['USER_ID'])){
   if(!isset($_SESSION['vendor_ID'])){
         header('location:login_form.php');
   }
   $c=1;
}

?>
<?php

@include 'config2.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_address = $_POST['product_address'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_address', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart succesfully';
   }

}

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
       height: 23rem;
      }
      .products{
         width:100%;
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

<div class="container">

<section class="products">

   <h1 class="heading"><?php echo "$ven"?></h1>

   <div class="box-container">

      <?php
       if($c==0){
        $i = $_SESSION['USER_ID']; 
        }
        else{
           $i = $_SESSION['vendor_ID']; 
        }
      
      // echo $ven;
      $select_products = mysqli_query($conn, "SELECT * FROM `form` WHERE occupation ='$ven' AND user_type = 'vendor' ");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <?php $i= $fetch_product['id'];?>
            <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['name']; ?></h3>
            <h3><?php echo $fetch_product['contact']; ?></h3>
            <h3><?php echo $fetch_product['email']; ?></h3>
            <div class="price">ADD: <?php echo $fetch_product['address']; ?></div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_address" value="<?php echo $fetch_product['address']; ?>">
            <input type="hidden" name="product_address" value="<?php echo $fetch_product['contact']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <!-- <input type="submit" class="btn" value="add to cart" name="add_to_cart"> -->
            <?php echo "<a href= 'products.php?rn=$fetch_product[id]' class='btn'> Shop Item </a>"?>
             <!-- echo '<a href="products.php?i='$i';">view products</a>  -->
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