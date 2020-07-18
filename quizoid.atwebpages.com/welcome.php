<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>


<!DOCTYPE html>
<html>
<title>QUIZOID</title>
<meta charset="UTF-8">
<link rel="shortcut icon" type="image/png" href="img/quizl.png" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
  
}


/* Full height image header */
.bgimg-1 {
  background-position: fixed;
  background-size: cover;
  background-image: url("img/bg11.gif");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top" >
    <div class="w3-bar w3-white w3-card" id="myNavbar" style="background-color: rgb(0, 136, 255);">
      <a href="#" class="w3-bar-item w3-button w3-wide"><big><big><img src="img/quizl.png" style="border-radius: 50%;" width="36px" alt=""> QUIZOID</big></big></a>
      <!-- Right-sided navbar links -->
      <div class="w3-right w3-hide-small">
         <a href="result.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i>My Result</a>
         <a href="ranklist.php" class="w3-bar-item w3-button"><i class="fa fa-bar-chart" aria-hidden="true"></i> RANKLIST</a>
    <!-- <a href="#pricing" class="w3-bar-item w3-button"><i class="fa fa-usd"></i> PRICING</a>-->
        <a href="logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-out" > </i> LOGOUT </a>
      </div>
      <!-- Hide right-floated links on small screens and replace them with a menu icon -->
  
      <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
  </div>
  
  <!-- Sidebar on small screens when clicking the menu icon -->
  <nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
    <a href="result.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-th"></i>MY RESULT</a>
    <a href="ranklist.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-bar-chart" aria-hidden="true"></i>RANKLIST</a>
   <!-- <a href="#pricing" onclick="w3_close()" class="w3-bar-item w3-button">PRICING</a>-->
    <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-sign-out" >  </i>LOGOUT</a>
  </nav>

  
<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
    <img class="im" src="img/brain10.png" style="z-index: -2;position: absolute;top:15px;right:-1vw;height: 100vh;"  alt="">

  <div class="w3-display-left w3-text-white" style="padding:48px">
    <span class="w3-jumbo w3-hide-small" style="text-shadow: blueviolet 4px 4px;"><small><small>Good day, <?php
echo strtoupper($_SESSION['nama']); // e.g. root or www-data
?></small>!</small></span><br>
    <span class="w3-xxlarge w3-hide-large w3-hide-medium" style="text-shadow: blueviolet 4px 4px;"><small><small>Good day, <?php
echo strtoupper($_SESSION['nama']); // e.g. root or www-data
?></small>!</small></span>
    <span class="w3-jumbo w3-hide-small" style="text-shadow: rgb(43, 226, 89) 4px 4px;">Welcome to QUIZOID!</span><br>
    <span class="w3-xxlarge w3-hide-large w3-hide-medium" style="text-shadow: rgb(43, 226, 98) 4px 4px;">Welcome to QUIZOID!</span>
    <span class="w3-large" style="text-shadow: rgb(46, 43, 226) 2px 2px;"><br> Test your knowledge and learn as you go! </span>
    <p><a href="quiz.php" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off" style="text-shadow: blueviolet 1px 1px;">This way <big>:)</big></a></p>
  </div> 
  
</header>
<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>

</body>
</html>

<!--<div class="container mt-4">
<h3><?php// echo "Welcome ". $_SESSION['name']
?>! You can now use this website</h3>
<a href="quiz.php">quiz</a>
<a href="logout.php">logout</a>
<hr>

</div>-->