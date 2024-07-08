<?php
@include 'config.php';

error_reporting(0);
$rn = $_GET['rn'];
$bn = $_GET['bn'];
$i=$rn;

if(isset($_POST['submit']))
{
    // $start = mysqli_real_escape_string($conn, $_POST['start']);
    // $end = mysqli_real_escape_string($conn, $_POST['end']);
    $mb1 = mysqli_real_escape_string($conn, $_POST['mb1']);
    $r1 = mysqli_real_escape_string($conn, $_POST['r1']);
    $r2 = mysqli_real_escape_string($conn, $_POST['r2']);
    $r3 = mysqli_real_escape_string($conn, $_POST['r3']);
    // $nbooks = mysqli_real_escape_string($conn, $_POST['mem_no']);
    if($mb1){
        $query = "UPDATE `order` SET status = 'expire' WHERE p_Id='$rn' ";
    }
    elseif($r1){
        $query = "UPDATE `order` SET status = 'Recieved' WHERE p_Id='$rn' ";
    }
    elseif($r2){
        $query = "UPDATE `order` SET status = 'Ready For Shipment' WHERE p_Id='$rn' ";
    }
    elseif($r3){
        $query = "UPDATE `order` SET status = 'Out For Delivery' WHERE p_Id='$rn' ";
    }
    else{
    if($mb=="six"){
        $dt = strtotime($end);
        $end1 = date("Y-m-d", strtotime("+6 month", $dt));
        $query = "UPDATE `order` SET status = 'Active' WHERE u_id='$rn' ";
    }
    elseif($mb=="one"){
        $dt = strtotime($end);
        $end1 = date("Y-m-d", strtotime("+12 month", $dt));
        $query = "UPDATE `order` SET status = 'Active' WHERE u_id='$rn' ";
    }
    elseif($mb=="two"){
        $dt = strtotime($end);
        $end1 = date("Y-m-d", strtotime("+24 month", $dt));
        $query = "UPDATE `order` SET status = 'Active' WHERE u_id='$rn' ";
    }
    else{
    $query = "UPDATE order SET status = 'Active' WHERE u_id='$rn' ";
    }
    }
    echo "$rn";
    // $query = "UPDATE m_books SET bookname='$bname', authorname='$aname', n_books='$nbooks' WHERE id='$rn' ";
    $query_run = mysqli_query($conn, $query);
    echo "$start";
    // echo "$nbooks";

    if($query_run)
    {
        echo "<script>alert('updated')</script>";
            header("Location: adminStatus.php?rn=$i");
        exit(0);
    }
    else
    {
        echo "<script>alert('not updated')</script>";
        header("Location: adminStatus.php?rn=$i");
        exit(0);
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
    .radio{
    
   display: flex;
   justify-content: space-evenly;
   align-items: center;
    }
    .radio1{
        display: flex;
        flex-wrap: nowrap;
        justify-content: space-between;
    }
    .form{
        display: flex;
        flex-direction: column; 
    }
   </style>
   <style>
   body, html {
   height: 100%;
   margin: 0;
   }
   .form-container{
   /* The image used */
   background-image: url("./image/b_image.jpg");

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
   
<div class="form-container">
   <form action="" method="post">
   <h3>Update</h3>
    </select>
    <input type="number" name="men_no" value="<?php echo "$rn" ?>" required placeholder="Membership number">
    <!-- <input type="date" name="start" value="<?php echo "$bn" ?>" required placeholder="enter start date"> -->
    <!-- <input type="date" name="end" value="<?php echo "$an" ?>"  required placeholder="enter end date"> -->
    <div class ="radio">
       <strong> Menbereship Extn:</strong>
    <div class ="radio">
    <input type="radio" id="sixmonth" name="r1" value="six">
    <label for="sixmonth">Request Recieved</label><br>
    </div>
    <div class= "radio">
    <input type="radio" id="one" name="r2" value="one">
    <label for="one">Ready For Shipment</label><br>
    </div>
    <div class= "radio">
    <input type="radio" id="two" name="r3" value="two">
    <label for="two">Out For Delivery</label><br>
    </div>
    </div>
    <br>
    <div class ="radio1">
        <strong> Menbereship remove:</strong>
    <div class ="radio1">
    <input type="radio" id="remove" name="mb1" value="remove">
    <label for="remove">Remove</label><br>
    </div>
    </div>
    <input type="submit" name="submit" value="Update" class="form-btn">
   </form>

</div>

</body>
</html>

