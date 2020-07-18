<?php require 'config.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
} 

$count=0;
?>
<!DOCTYPE>
<html>
<head>
<title>QUIZOID</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" type="image/png" href="img/quizl.png" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body {
    background: url("https://image.freepik.com/free-photo/single-white-question-mark-blue-background-with-copy-blank-space_105589-268.jpg");
	background-size:100vw 100vh;
	background-repeat: no-repeat;
	position: relative;
	background-attachment: fixed;
}
/* button */
.button {
  display: inline-block;
  border-radius: 50px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 500px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button:hover{
    transform: scale(1.1);
}

.cen{
    top: 50%;
    
}
.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
.title{
	background-color: #fcf7f7;
	font-size: 45px;
  padding: 0px;
  align-self: center;
  justify-content: center;
  text-align: center;
  justify-self: center;
  align-items: center;
  align-content: center;
	
}
 
.tab{
   
   font-size: xx-large;
    height: 40vh;
  
}

.button3 {
    
    border: none;
    color: white;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}
.button3 {
    background-color: white; 
    color: black; 
    border: 2px solid #ffffff;
}

.button3:hover {
    background-color: #42f460;
    color: Black;
    transform: scale(1.2);
}

.logout{
    position: absolute;
    right: 10px;
    top: 15px;
   /*  justify-self: end;
    align-self: center;
 justify-content: center;
  text-align: center;
  justify-self: center;
  align-items: center;
  align-content: center;*/
}
.w3-bar .w3-button {
  padding: 14px;
}
#display{
  position: absolute;
  top: 80vh;
  right: 10%;
  color: white;
}
</style>
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top" >
    <div class="w3-bar w3-white w3-card" id="myNavbar" style="background-color: rgb(0, 136, 255);">
      <a href="#" class="w3-bar-item w3-button w3-wide"><big><big><img src="img/quizl.png" style="border-radius: 50%;" width="36px" alt=""> QUIZOID</big></big></a>
      <!-- Right-sided navbar links -->
      <div class="w3-right w3-hide-small">
         <a href="welcome.php" class="w3-bar-item w3-button"><i class="fa fa-home" aria-hidden="true"></i>HOME</a>
         <a href="result.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i>MyResult</a>
         <a href="ranklist.php" class="w3-bar-item w3-button"><i class="fa fa-bar-chart" aria-hidden="true"></i>RANKLIST</a>
    <!-- <a href="#pricing" class="w3-bar-item w3-button"><i class="fa fa-usd"></i> PRICING</a>-->
        <a href="logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-out" ></i>LOGOUT </a>
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
    <a href="result.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-th"></i>MY RESULT</a>
    <a href="ranklist.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-bar-chart" aria-hidden="true"></i>RANKLIST</a>
   <!-- <a href="#pricing" onclick="w3_close()" class="w3-bar-item w3-button">PRICING</a>-->
    <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-sign-out" >  </i>LOGOUT</a>
  </nav>
  
  <center style="background-color: rgba(70, 82, 92, 0);"><small><small><small><small>

<?php

 //generates 20 unique random numbers

?>

<?php 												    $iid=$_SESSION['id'];
                                  $q="SELECT currentindex FROM users WHERE id=$iid";
                                  $ci = $conn->query($q);
                                  $row = $ci->fetch_assoc();
                                  
                                  $_SESSION['currentindex']= $row['currentindex'];
                                  $c= $_SESSION['currentindex'];
                                  
                                  
																if (isset($_POST['click']) || isset($_GET['start'])) {
                                  if(($_SESSION["boo"])){
                                    //@$_SESSION['clicks']=$_SESSION['currentindex'];
                                   // echo $_SESSION['currentindex'];
                                    function randomGen($min, $max, $quantity) {
                                      $numbers = range($min, $max);
                                      shuffle($numbers);
                                      return array_slice($numbers, 0, $quantity);
                                      //print_r(randomGen(0,20,20));
                                  }
                                  
                                  
                                    $_SESSION["boo"]=false;
                                  }
                                    //echo @$_SESSION['clicks'];
                                   
                                    
																$_SESSION['currentindex'] += 1 ;
                                $c = $_SESSION['currentindex'];
                                
                                $sql = "UPDATE users SET currentindex=$c WHERE id = $iid ";
                                if ($conn->query($sql) === TRUE) {
                                // echo "Record updated successfully";
                                  
                                } else {
                                  //echo "Error updating record: " . $conn->error;
                                }
                               // $_SESSION['currentindex'] = $c ;
                                $iid=$_SESSION['id'];
																if(isset($_POST['userans'])) { 
                                  
                                  
                                  $qry7 = "SELECT `result` FROM `users` WHERE `id`=$iid;";
                                  $ci7 = $conn->query($qry7);
                                  $row7 = $ci7->fetch_assoc();
                                  @$_SESSION['score']=$row7['result'];
                                  
                                  $userselected = $_POST['userans'];
                                
                                  $qry4 = "SELECT `ans` FROM `quiz` WHERE `id`=$c-1;";
                                  $ci5 = $conn->query($qry4);
                                  $row5 = $ci5->fetch_assoc();

                                  //echo $row5['ans']."<br>";
                                  //echo $userselected."Record updated successfullyuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu";;

                                  if($row5['ans'] == $userselected){
                                    @$_SESSION['score']+=2;
                                    @$_SESSION['correct']+=1;
                                    $ca=@$_SESSION['correct'];
                                    $nor=@$_SESSION['score'];
                                    $sql = "UPDATE users SET result='$nor',correct='$ca' WHERE id = $iid ";
                                    if ($conn->query($sql) === TRUE) {
                                    // echo "Record updated successfullyuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu";
                                     
                                     } else {
                                     //echo "Error updating record: " . $conn->error;
                                     }
                                  }
                                  else{
                                    @$_SESSION['score']-=1;
                                    @$_SESSION['incorrect']+=1;
                                    $ica=@$_SESSION['incorrect'];
                                    $nor=@$_SESSION['score'];
                                    $sql = "UPDATE users SET result='$nor',incorrect='$ica' WHERE id = $iid ";
                                    //echo ("<h1>WRONG ANSWER</h1>");
                                    if ($conn->query($sql) === TRUE) {
                                      //echo "jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjRecord updated successfullyuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu";
                                      
                                      } else {
                                      //echo "jjjjjjjjjjjjjjjjError updating record: " . $conn->error;
                                      }
                                  }

                                $fetchqry2 = "UPDATE `quiz` SET `userans`='$userselected' WHERE `id`=$c"; 
                                $fetchqry3 = "UPDATE 'users' SET 'currentindex'='$c' WHERE 'id'= '$iid'";
                                $result2 = mysqli_query($conn,$fetchqry2);
                                $result4=mysqli_query($conn,$fetchqry3);
                                $sql = "UPDATE users SET currentindex=$c WHERE id = $iid ";
                                if ($conn->query($sql) === TRUE) {
                                // echo "Record updated successfully";
                                  
                                } else {
                                  //echo "Error updating record: " . $conn->error;
                                }
																}
		  
																	
                                 } 
                                 
                                 else {
																//	$_SESSION['clicks'] = 0;
																}
																
																//echo($_SESSION['clicks']);
																?>
<div class="bump"><br><form><?php if($c==0){ 
  
  
  ?>
  
<br><br><br><br>

<div style="color: antiquewhite;display: inline;text-shadow: orange 1px 0px;">
<ul style="list-style-image: url(https://mdn.mozillademos.org/files/11981/starsolid.gif);left: 5%;">
<h1 style="text-align: center;">INSTRUCTIONS</h1>
<big><big><big><big><big>
  <li>&nbsp; This quiz contains <big><b> 4 levels</b></big> with 5 multiple choice questions each(a total of <big><b> 20 MCQs </b></big>).</li>
  <li>&nbsp; Each question must be answered within a  <big><b>time limit of 30 seconds.</b></big> </li>
  <li>&nbsp; <big><b>Correct</b></big> answer awards you with a score of <big><b>2 Marks</b></big>.</li>
  <li>&nbsp; <big><b>Incorrect</b></big> answer levy <big><b>-1 Mark</b></big> from your overall score.</li>
  <li>&nbsp; If <big><b>Exceeded Time Limit</b></big>, the question remains unanswered and the quizzer automatically moves to the next question.</li>
  </big></big></big></big></big>

</ul>

</div>

  
  
  <button class="button cen" name="start" float="left"><span>START QUIZ ➡</span></button> 
  
  <?php } ?></form></div>
<form action="" method="post" style="color: white;margin:4%;">  				
<table class="tab"><?php if(isset($c)) {   $fetchqry = "SELECT * FROM `quiz` where id='$c'"; 
				$result=mysqli_query($conn,$fetchqry);
				$num=mysqli_num_rows($result);
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC); }
		  ?>
<tr><td><h3 style="color: white;"><br><?php echo @$row['que'];?></h3></td></tr> <?php if( $c >=1 &&  $c <= 5){ ?>
  <span style="color: rgb(247, 0, 152);"><big><big><big style="font-size: x-large;"><big >Level 1</big> <br></span>
  <?php echo 'QUESTION '.$c.' ::'; ?></big></big></big>
  <tr style="color: bisque;"><td><input style="font-size: xx-large;"  required type="radio" name="userans" value="<?php echo $row['option 1'];?>">&nbsp;<?php echo $row['option 1']; ?><br>
  <tr style="color: aqua;"><td><input style="font-size: xx-large;" required type="radio" name="userans" value="<?php echo $row['option 2'];?>">&nbsp;<?php echo $row['option 2'];?></td></tr>
  <tr style="color: burlywood;"><td><input style="font-size: xx-large;" required type="radio" name="userans" value="<?php echo $row['option 3'];?>">&nbsp;<?php echo $row['option 3']; ?></td></tr>
  <tr style="color: aquamarine;"><td><input style="font-size: xx-large;" required type="radio" name="userans" value="<?php echo $row['option 4'];?>">&nbsp;<?php echo $row['option 4']; ?><br><br><br></td></tr>
  <tr style="color: white;"><td><button class="button3" name="click" >Next</button></td><td></td></tr> <?php }  
                                                                    ?> 
  <?php if( $c >=6 &&  $c <= 10){ ?>
    <span style="color: rgb(247, 0, 152);"><big><big><big style="font-size: x-large;"><big>Level 2</big> <br></span>
    <?php echo 'QUESTION '.$c.' ::'; ?></big></big></big>
   
  <tr style="color: bisque;"><td><input required type="radio" name="userans" value="<?php echo $row['option 1'];?>">&nbsp;<?php echo $row['option 1']; ?><br>
  <tr style="color: aqua;"><td><input required type="radio" name="userans" value="<?php echo $row['option 2'];?>">&nbsp;<?php echo $row['option 2'];?></td></tr>
  <tr style="color: burlywood;"><td><input required type="radio" name="userans" value="<?php echo $row['option 3'];?>">&nbsp;<?php echo $row['option 3']; ?></td></tr>
  <tr style="color: aquamarine;"><td><input style="font-size: xx-large;" required type="radio" name="userans" value="<?php echo $row['option 4'];?>">&nbsp;<?php echo $row['option 4']; ?><br><br><br></td></tr>
  <tr style="color: white;"><td><button class="button3" name="click" >Next</button></td><td></td></tr> <?php }  
                                                                    ?> 
                                                                    <?php if( $c >= 11 &&  $c <=15){ ?>
      <span style="color: rgb(247, 0, 152);"><big><big><big style="font-size: x-large;"><big>Level 3</big> <br></span>
      <?php echo 'QUESTION '.$c.' ::'; ?></big></big></big>
                                                                       <tr style="color: bisque;"><td><input style="font-size: xx-large;" required type="radio" name="userans" value="<?php echo $row['option 1'];?>">&nbsp;<?php echo $row['option 1']; ?><br>
  <tr style="color: aqua;"><td><input style="font-size: xx-large;" required type="radio" name="userans" value="<?php echo $row['option 2'];?>">&nbsp;<?php echo $row['option 2'];?></td></tr>
  <tr style="color: burlywood;"><td><input style="font-size: xx-large;" required type="radio" name="userans" value="<?php echo $row['option 3'];?>">&nbsp;<?php echo $row['option 3']; ?></td></tr>
  <tr style="color: aquamarine;"><td><input style="font-size: xx-large;" required type="radio" name="userans" value="<?php echo $row['option 4'];?>">&nbsp;<?php echo $row['option 4']; ?><br><br><br></td></tr>
  <tr style="color: white;"><td><button class="button3" name="click" >Next</button></td>
  <td></td></tr> 
  <?php }  
                                                                    ?> 
                                                                    <?php if ($c >=16 &&  $c <=19){ ?>
   <span style="color: rgb(247, 0, 152);"><big><big><big style="font-size: x-large;"><big>Level 4</big> <br></span>
   <?php echo 'QUESTION '.$c.' ::'; ?></big></big></big>
  <tr style="color: bisque;"><td><input style="font-size: xx-large;" required type="radio" name="userans" value="<?php echo $row['option 1'];?>">&nbsp;<?php echo $row['option 1']; ?><br>
  <tr style="color: aqua;"><td><input style="font-size: xx-large;" required type="radio" name="userans" value="<?php echo $row['option 2'];?>">&nbsp;<?php echo $row['option 2'];?></td></tr>
  <tr style="color: burlywood;"><td><input style="font-size: xx-large;" required type="radio" name="userans" value="<?php echo $row['option 3'];?>">&nbsp;<?php echo $row['option 3']; ?></td></tr>
  <tr style="color: aquamarine;"><td><input style="font-size: xx-large;" required type="radio" name="userans" value="<?php echo $row['option 4'];?>">&nbsp;<?php echo $row['option 4']; ?><br><br><br></td></tr>
  <tr style="color: white;"><td><button class="button3" name="click" >Next</button></td><td></td></tr> <?php }  
                                                                    ?> 
                                                                    <?php if ($c ==20){ ?>
   <span style="color: rgb(247, 0, 152);"><big><big><big style="font-size: x-large;"><big>Level 4</big> <br></span>
   <?php echo 'QUESTION '.$c.' ::'; ?></big></big></big>
  <tr style="color: bisque;"><td><input style="font-size: xx-large;" required type="radio" name="userans" value="<?php echo $row['option 1'];?>">&nbsp;<?php echo $row['option 1']; ?><br>
  <tr style="color: aqua;"><td><input style="font-size: xx-large;" required type="radio" name="userans" value="<?php echo $row['option 2'];?>">&nbsp;<?php echo $row['option 2'];?></td></tr>
  <tr style="color: burlywood;"><td><input style="font-size: xx-large;" required type="radio" name="userans" value="<?php echo $row['option 3'];?>">&nbsp;<?php echo $row['option 3']; ?></td></tr>
  <tr style="color: aquamarine;"><td><input style="font-size: xx-large;" required type="radio" name="userans" value="<?php echo $row['option 4'];?>">&nbsp;<?php echo $row['option 4']; ?><br><br><br></td></tr>
  <tr style="color: white;"><td>
    <form method="POST" action="result.php">
    <button class="button3" name="click" type="submit"  >Submit</button>
</form></td><td></td></tr> <?php }  
                                                                    ?> 
                                                                     
                                                                    </table>
  </form>
 <?php 
 
 
 

if($c>20){
  echo ("<a href=\"result.php\" class=\"button cen\"  float=\"left\"><span>See Results ➡</span></a> ");
}
?>
  
</small></small></small></small></center>
<p id="display"></p>
<script>
  function CountDown(duration, display) {
            if (!isNaN(duration)) {
                var timer = duration, minutes, seconds;
                
              var interVal=  setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    $(display).html("<b>" + minutes + "m : " + seconds + "s" + "</b>");
                    if (--timer < 0) {
                        timer = duration;
                       SubmitFunction();
                       $('#display').empty();
                       clearInterval(interVal)
                    }
                    },1000);
            }
        }
        
        function SubmitFunction(){
       $('form').submit();
        
        }
        
         
         <?php
         if($c>0&&$c<=20){
         ?>
         CountDown(30,$('#display'));
         <?php
         }
        
         ?>
        
          <?php
             
             
              ?>
              
</script>
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



<!--	$qry3 = "SELECT `ans`, `userans` FROM `quiz`;";
	$result3 = mysqli_query($conn,$qry3);
  $storeArray = Array();
  
	while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
     if($row3['ans']==$row3['userans']){
		 @$_SESSION['score'] += 1 ;
	 }
}
 
 ?> 
 
 
 
 
 -->