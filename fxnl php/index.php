<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style2.css">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <style>
   body, html {
   height: 100%;
   margin: 0;
   }
   .w3-content {
    max-width: 1600px;
    }
    .first{
      width:100%;
      margin-top:50px;
      display:flex;
      justify-content: space-around;
    }
    .third{
      width:30%;
    }
    .second{
      width:30%;
    }
    
   </style>

</head>
<body>
<?php include 'head.php'; ?>
<div class="container1">
   <div class="w3-content w3-display-container">
  <img class="mySlides" src="images/b_image.jpg" style="width:100% ;">
  <img class="mySlides" src="images/b2_image.jpg" style="width:100%">
  <img class="mySlides" src="images/b13_image.jpg" style="width:100%">
  <img class="mySlides" src="images/b15_image.jpg" style="width:100%">

  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
</div>

<div class="first">
  <div class= "second"><h1>Plan, run, and analyze your event— all from one place</h1></div>
  <div class = "third"><p>No more juggling tools, no more frustrating busy work. Zoho Backstage is the fully-customizable event management platform that lets you do it all—from organizing your event to measuring its impact and everything in between.</p></div>

</div>
<?php include 'footer.php'; ?>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>


</div>

</body>
</html>