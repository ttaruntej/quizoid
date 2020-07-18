<?php 
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
} 


?>
<?php
$page = $_SERVER['PHP_SELF'];
$sec = "15";
?>
<?php
 
$dataPoints = array();
//Best practice is to create a separate file for handling connection to database
try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(   'mysql:host=fdb28.awardspace.net;dbname=3513070_login;charset=utf8mb4',
                       '3513070_login',
                        'Qwerty@2000',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
	
    $handle = $link->prepare('select result, nama from users'); 
    $handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
		
    foreach($result as $row){
        array_push($dataPoints, array("y"=> $row->result, "label"=> $row->nama));
    }
	
}
catch(\PDOException $ex){
    print($ex->getMessage());
}
	
?>
<?php
$dataPoints1 = array();
$dataPoints2 = array();
$handle1 = $link->prepare('select correct,incorrect,result, nama from users'); 
$handle1->execute(); 
$result1 = $handle1->fetchAll(\PDO::FETCH_OBJ);
    
foreach($result1 as $row1){
    array_push($dataPoints1, array("y"=> $row1->correct, "label"=> $row1->nama));
    array_push($dataPoints2, array("y"=> $row1->incorrect, "label"=> $row1->nama));

}
$link = null;
?>

<!DOCTYPE html>
<html>
	<head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
		<title>QUIZOID</title>
        <link rel="shortcut icon" type="image/png" href="img/quizl.png" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	

	</head>
    <style>
.w3-bar .w3-button {
  padding: 16px;
}

@import url("https://fonts.googleapis.com/css?family=Ruda:900");
body {
  background-image: url(https://img.freepik.com/free-vector/abstract-geometric-lines-seamless-pattern_144290-8.jpg?size=626&ext=jpg);
  background-position: bottom;
  animation: 20s linear 0s infinite bp;
  margin: 0;
  padding: 0;
  overflow: hidden;
}

@keyframes bp {
  from {
    background-position: 198px 0;
  }
  to {
    background-position: 0 198px;
  }
}

</style>
<style>
    body {
  font-family: 'lato', sans-serif;
}
.container {
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
}

h2 {
  font-size: 26px;
  margin: 20px 0;
  text-align: center;
  small {
    font-size: 0.5em;
  }
}


  li {
    border-radius: 3px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
  }
  .table-header {
    background-color: #95A5A6;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.03em;
  }
  .table-row {
    background-color: #ffffff;
    box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
  }
  .col-1 {
    flex-basis: 10%;
  }
  .col-2 {
    flex-basis: 40%;
  }
  .col-3 {
    flex-basis: 25%;
  }
  .col-4 {
    flex-basis: 25%;
  }
  
  @media all and (max-width: 767px) {
    .table-header {
      display: none;
    }
    .table-row{
      
    }
    li {
      display: block;
    }
    .col {
      
      flex-basis: 100%;
      
    }
    .col {
      display: flex;
      padding: 10px 0;
      
    }
    .col:before {
        color: #6C7A89;
        padding-right: 10px;
        content: attr(data-label);
        flex-basis: 50%;
        text-align: right;
      }
  }

  .container1{
      z-index: 0;
      top: 10%;
      position: absolute;
      background-color: rgb(0, 0, 0);
  }
 canvas{
     
     left: 0;
     z-index: 0;
     position: absolute;
 }
.container{
    z-index: 0;
    position: relative;
}
</style>

	<body>	  
    <div class="w3-top" >
    <div class="w3-bar w3-white w3-card" id="myNavbar" style="background-color: rgb(0, 136, 255);">
      <a href="#" class="w3-bar-item w3-button w3-wide"><big><big><img src="img/quizl.png" style="border-radius: 50%;" width="36px" alt=""> QUIZOID</big></big></a>
      <!-- Right-sided navbar links -->
      <div class="w3-right w3-hide-small">
         <a href="welcome.php" class="w3-bar-item w3-button"><i class="fa fa-home" aria-hidden="true"></i> HOME</a>
         <a href="result.php" class="w3-bar-item w3-button"><i class="fa fa-th" aria-hidden="true"></i> MY RESULT</a>
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
    <a href="welcome.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
    <a href="result.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-th" aria-hidden="true"></i> MY RESULT</a>
   <!-- <a href="#pricing" onclick="w3_close()" class="w3-bar-item w3-button">PRICING</a>-->
    <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-sign-out" ></i> LOGOUT</a>
  </nav>
      <br><br><br>
      <?php
              require 'config.php';
              $sql = " SELECT id,nama,result,correct,incorrect FROM users ORDER BY result DESC";
              $result = $conn->query($sql);
?>


      <div class="container">
  <h2>Quzoid Participants<small>(#achievers)</small> Performance </h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">RANK </div>
      <div class="col col-2">PARTICIPANT NAME</div>
      <div class="col col-3">CORRECT ANSWERS</div>
      <div class="col col-4"> INCORRECT ANSWERS</div>
      <div class="col col-4"> OVERALL SCORE</div>
    </li>
    <?php
    $cnt=1;
              If (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_array($result)) {
                      ?>
    <li class="table-row">
      <div class="col col-1" data-label="RANK:"><?php echo $cnt; ?></div>
      <div class="col col-2" data-label="PARTICIPANT NAME:"><?php echo $row['nama']; ?></div>
      <div class="col col-3" data-label="CORRECT ANSWERS:"><?php echo $row['correct']; ?></div>
      <div class="col col-4" data-label="INCORRECT ANSWERS:"><?php echo $row['incorrect']; ?></div>
      <div class="col col-4" data-label="OVERALL SCORE:"><?php echo $row['result']; ?></div>
    </li>
    <?php
    $cnt+=1;
                  }
              }
              ?>
    </ul>
</div>
   
    <br><hr>
    <center>
    <div id="chartContainer2" style="height: 370px; width: 80%;"></div>
    </center>
    <br><br>
    <center>
    <div id="chartContainer1" style="height: 370px; width: 90%;"></div>
            </center>
	   <br><br><br>
        </div>
        <script type="text/javascript" src="ranklist.js"></script>
	    <script>
window.onload = function () {
 
var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "QUIZOID participants result based on overall Score"
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc  
        yValueFormatString: "scored #,##0.## marks ",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
var chart2 = new CanvasJS.Chart("chartContainer2", { 
    animationEnabled: true,
    exportEnabled: true,
	theme: "light2",
	title: {
		text: "Detailed comparision among Participants"
	},
	subtitles: [{
		text: "Score / correct / incorrect  (can be 'toggled')"
	}],
	axisY: {
		includeZero: false
	},
	legend:{
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	toolTip: {
		shared: true
	},
	data: [
        {
		type: "stackedArea",
		name: "result",
		showInLegend: true,
		yValueFormatString: "scored #,##0 marks",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	},
        {
		type: "stackedArea",
		name: "correct",
		showInLegend: true,
		
		yValueFormatString: "#,##0 answers",
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},
	
	{
		type: "stackedArea",
		name: "incorrect",
		showInLegend: true,
		yValueFormatString: "#,##0 answers",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
 
chart2.render();
chart1.render();
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart2.render();
}
 
}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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




          