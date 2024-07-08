<?php

@include 'config2.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}
$i = $_SESSION['user_name']; 
$rn = $_SESSION['USER_ID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
<link rel="stylesheet" type="text/css" href="custom.css">  
   <title>user page</title>
   <style>
    .navbar {
    position: relative;
    min-height: 50px;
    margin-bottom: 0px;
    border: 1px solid transparent;
}
    </style>

   <!-- custom css file link  -->
   <!-- <link rel="stylesheet" href="css/style2.css"> -->
<body>
<div class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                    </div>
                    <?php $cat="catering"; $flo="florist"; $pla="venue"; $clo="cloth"; $act="activity" ?>
                    <div class="navbar-collapse collapse" id="mobile_menu">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Vendors<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><?php echo "<a href= 'diff_vendor.php?type=$cat' class='btn'> Catering </a>"?></li>
                                    <li><?php echo "<a href= 'diff_vendor.php?type=$flo' class='btn'> Florist </a>"?></li>
                                    <li><?php echo "<a href= 'diff_vendor.php?type=$pla' class='btn'> Event Place </a>"?></li>
                                    <li><?php echo "<a href= 'diff_vendor.php?type=$clo' class='btn'> Cloth </a>"?></li>
                                    <li><?php echo "<a href= 'diff_vendor.php?type=$act' class='btn'> Activities </a>"?></li>
                                    <!-- <li><a href="#">About Six</a></li> -->
                                </ul>
                            </li>
                            <!-- <li><a href="#">Welcome</a></li> -->
                            <!-- <li><a href="#">Services</a></li> -->
                            <li><a href="todo.php">Guest List</a></li>
                            <li><?php echo "<a href= 'status.php?rn=$rn'> Order Status</a>"?></li>
                            <li><?php echo "<a href= 'cart.php?rn=$rn'> Collected Product </a>"?></li>
                            <!-- <li><a href="#">Contact Us</a></li> -->
                        </ul>
                        <ul class="nav navbar-nav">
                            <li>
                                <form action="" class="navbar-form">
                                    <div class="form-group">
                                    </div>
                                </form>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span><span> &ensp;<?php echo $i ?></span><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <!-- <li><a href="#" class="logo"><h3><span><?php echo $i ?></span></h3></a></li> -->
                                    <li> <a href="logout.php" class="btn">logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>