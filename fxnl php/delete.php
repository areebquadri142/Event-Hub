<?php
@include 'config.php';
error_reporting(0);

$iid=$_GET['rn'];
$query = "DELETE FROM order WHERE id = '$iid'";

$data = mysqli_query($conn,$query);

if($data)
{
    header("location:requestItem.php?rn=$iid");
}
else{
    echo "<font color ='red'> Failed to Return Book";
    header("location: requestItem.php?rn=$iid");
}
?>