<?php
session_start();

function function_alert($message) { 
    // Display the alert box  
    echo "<script>alert('$message');</script>"; 
} 
// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: welcome.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
        function_alert($err);
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;
                            $_SESSION["boo"]=true;
                            $q="SELECT nama FROM users WHERE id=$id";
                            $cio = $conn->query($q);
                            $row = $cio->fetch_assoc();
                            
                            $_SESSION['nama']= $row['nama'];

                            $q11="SELECT result FROM users WHERE id=$id";
                            $cio11 = $conn->query($q11);
                            $row11 = $cio11->fetch_assoc();
                            
                            $_SESSION['score']= $row11['result'];

                            $q22="SELECT correct FROM users WHERE id=$id";
                            $cio22 = $conn->query($q22);
                            $row22 = $cio22->fetch_assoc();
                            
                            $_SESSION['correct']= $row22['correct'];

                            $q33="SELECT incorrect FROM users WHERE id=$id";
                            $cio33 = $conn->query($q33);
                            $row33 = $cio33->fetch_assoc();
                            
                            $_SESSION['incorrect']= $row33['incorrect'];

                            $q44="SELECT currentindex FROM users WHERE id=$id";
                            $cio44 = $conn->query($q44);
                            $row44 = $cio44->fetch_assoc();
                            
                            $_SESSION['currentindex']= $row11['currentindex'];
                            
                            //Redirect user to welcome page
                            
                            header("location: welcome.php");
                            
                      
                               
                       
                        }
                        else{
                            echo "<script>alert('Your password is incorrect,please try again!');</script>";
                            //header( "refresh:0.1;" );
                        }
        
                       
                    }
                    

                }
                else{
                    function_alert("username or password is incorrect");
                }

    }
   
}    


}


?>









<!DOCTYPE html>
<html>
<head>
	<title>QUIZOID Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="shortcut icon" type="image/png" href="img/quizl.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>

body { padding: 2em; }


/* Shared */
.loginBtn {
  box-sizing: border-box;
  position: relative;
  /* width: 13em;  - apply for fixed size */
  margin: 0.2em;
  padding: 0 15px 0 46px;
  border: none;
  text-align: left;
  line-height: 34px;
  white-space: nowrap;
  border-radius: 0.2em;
  font-size: 16px;
  color: #FFF;
}
.loginBtn:before {
  content: "";
  box-sizing: border-box;
  position: absolute;
  top: 0;
  left: 0;
  width: 34px;
  height: 100%;
}
.loginBtn:focus {
  outline: none;
}
.loginBtn:active {
  box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
}


/* Facebook */
.loginBtn--facebook {
  background-color: #4C69BA;
  background-image: linear-gradient(#4C69BA, #3B55A0);
  /*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
  text-shadow: 0 -1px 0 #354C8C;
}
.loginBtn--facebook:before {
  border-right: #364e92 1px solid;
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
}
.loginBtn--facebook:hover,
.loginBtn--facebook:focus {
  background-color: #5B7BD5;
  background-image: linear-gradient(#5B7BD5, #4864B1);
}


/* Google */
.loginBtn--google {
  /*font-family: "Roboto", Roboto, arial, sans-serif;*/
  background: #DD4B39;
}
.loginBtn--google:before {
  border-right: #BB3F30 1px solid;
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
}
.loginBtn--google:hover,
.loginBtn--google:focus {
  background: #E74B37;
}
</style>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
	   
		<div class="img">
		  <span ><big>Welcome to <h2 >QUIZOID </h2><hr/></big></span>
			<img src="img/quiz.svg">
		</div>
		<div class="login-content">
			<form action="" method="post" >
				<img src="img/avatar.svg">
				<h3 class="title"> Hello, <h2>AMIGO!</h2></h3>
                <?php 
                //if( $_SESSION["loggedin"] != true)
                //echo("<h4>haaai</h4>")
                ?>
              
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username/Email</h5>
           		   		<input type="text" name="username" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="password" class="input">
            	   </div>
            	</div>
         
            	<input type="submit" class="btn" value="Login">
               <!-- <a href="indexgl.php" class="loginBtn loginBtn--google">Login with Google</a>-->
               
				<div>Not yet registered? <a href="register.php">Register here</a></div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
