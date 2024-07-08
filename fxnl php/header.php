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
<header class="header">
   <div class="flex">
     
      <?php
      if($c==0){
         $i = $_SESSION['user_name']; 
         $rn = $_SESSION['USER_ID'];
         }
         else{
            $i = $_SESSION['vendor_name']; 
            $rn= $_SESSION['vendor_ID'];
         }
      ?>

      <a href="#" class="logo"><h1> <span><?php echo $i ?></span></h1></a>

      <nav class="navbar">
         <a href="admin.php">add products</a>
         <!-- <a href="products.php?rn='$rn'">view products</a> -->
         <?php echo "<a href= 'products.php?rn=$rn'> view products </a>"?>
         <?php echo "<a href= 'requestItem.php?rn=$rn'> Request Item</a>"?>
         <?php echo "<a href= 'adminstatus.php?rn=$rn'> Product Status</a>"?>

         <a href="logout.php">logout</a>
      </nav>

      <?php
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <!-- <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a> -->

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>