
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

   <!-- <div class="box-container"</div> -->
      <table>
      <tr>
      <th>Name</th>
      
      <th>Email</th>
      <th>Address</th>
      <th>status</th>
      </tr>
      <?php
      $sql = "SELECT Name, Email,flat,status FROM `order` WHERE custId = '$i' ";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["Email"] . "</td><td>" . $row["flat"] ."</td><td>".$row["status"]."</td><tr>";
      }
      echo "</table>";
      } else { echo "0 results"; }
      $conn->close();
      ?>
      </table>

   </div>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>