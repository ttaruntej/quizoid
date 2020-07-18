<?php 
require 'config.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>
<?php 
       if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['tryagain'])){
         $c=0;
         $iid= $_SESSION["id"];
       
          $_SESSION['correct']=0;$ca=$_SESSION['correct'];
          $_SESSION['incorrect']=0;$ica=$_SESSION['incorrect'];
          $_SESSION['score']=0;
          $nor=$_SESSION['score'];
          $sql = "UPDATE users SET currentindex='$c',result='$nor',correct='$ca',incorrect='$ica',unanswered='$no' WHERE id = $iid ";
                                    if ($conn->query($sql) === TRUE) {
                                    // echo "Record updated successfullyuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu";
                                     
                                     }
                                     $z=2;
                                     header('location:quiz.php');
          
       }
      
?>
<?php 
  
 if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['continue'])){
  header('location:quiz.php');
  $z=2;
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZOID</title>
    <link rel="shortcut icon" type="image/png" href="img/quizl.png" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
 
 
  background-image: url("https://c1.wallpaperflare.com/preview/91/277/304/result-balance-sheet-follow-success.jpg");
    background-size: 100vw 100vh;
}


/* Full height image header */


.w3-bar .w3-button {
  padding: 16px;
}
</style>

<style>
  center{
    top:10%;
    width: 100%;
    position: absolute;
    color: aliceblue;
    text-shadow: blueviolet 4px 4px;
    background-color: rgba(0, 255, 255, 0.042);
 
  }
  .button0{
    border-radius: 50px;
    background-color: rgba(0, 255, 255, 0.486);
    cursor: pointer;
    color: azure;
  }
  .button0:hover{
    transform: scale(1.3);
  }

</style>
<?php
 $cap=($_SESSION['correct']/20)*100;
 $icap=($_SESSION['incorrect']/20)*100;
 $uaqp=100-$cap-$icap;
$dataPoints = array( 
	array("label"=>"correct answers", "y"=>$cap),
	array("label"=>"incorrect answers", "y"=>$icap),
	array("label"=>"unanswered questions", "y"=>$uaqp)
)
 
?>
<body>

  <div class="w3-top" >
    <div class="w3-bar w3-white w3-card" id="myNavbar" style="background-color: rgb(0, 136, 255);">
      <a href="#" class="w3-bar-item w3-button w3-wide"><big><big><img src="img/quizl.png" style="border-radius: 50%;" width="36px" alt=""> QUIZOID</big></big></a>
      <!-- Right-sided navbar links -->
      <div class="w3-right w3-hide-small">
         <a href="welcome.php" class="w3-bar-item w3-button"><i class="fa fa-home" aria-hidden="true"></i> HOME</a>
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
    <a href="welcome.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
    <a href="ranklist.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-bar-chart" aria-hidden="true"></i>RANKLIST</a>
   <!-- <a href="#pricing" onclick="w3_close()" class="w3-bar-item w3-button">PRICING</a>-->
    <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-sign-out" >  </i>LOGOUT</a>
  </nav>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<center>
    <form action="" method="post">
<h1 style="font-size: xxx-large;">MY RESULT</h1><hr>
 <h2 style="font-size: x-large;">No. of Correct Answers:&nbsp;<?php echo $no = @$_SESSION['correct']; 
  $nor=$_SESSION['score'];
 ?>/20</h2>
 <h2 style="font-size: x-large;">No. of Incorrect Answers:&nbsp;<?php echo $no = @$_SESSION['incorrect']; 
  $nor=$_SESSION['score'];
 ?>/20</h2>
 <h2 style="font-size: x-large;">No. of Unanswered Questions:&nbsp;<?php echo $no = 20-@$_SESSION['incorrect']-@$_SESSION['correct']; 
  $nor=$_SESSION['score'];
 ?>/20</h2><br>
  <div id="chartContainer" style="height: 370px; width: 50%;"></div>

 <h2 style="font-size: xx-large;">Your overall Score:&nbsp<?php echo $nor; ?>/40</h2><hr>
 
 <?php 
 if($_SESSION['currentindex']< 21){
  echo '<input type="submit" class="button0" value="CONTINUE?" name="continue" style="font-size: x-large;"><br><br> ';
  }
 ?>
 
<input type="submit" class="button0" value="RESTART?" name="tryagain" style="font-size: x-large;">

       
       </form>
       </center>

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
        <script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "MY Performance"
	},
	subtitles: [{
		text: "QUIZOID"
	}],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</body>
</html>






