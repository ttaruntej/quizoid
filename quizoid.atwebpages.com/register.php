<?php
require_once "config.php";
$name=$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
function function_alert($message) { 
    // Display the alert box  
    echo "<script>alert('$message');</script>"; 
}
if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
		$username_err = "Username cannot be blank";
		function_alert($username_err ); 
                
    }
    else{
		$sql = "SELECT id FROM users WHERE username = ?";
		
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
					$username_err = "This username is already taken"; 
					function_alert($username_err ); 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
	$password_err = "Password cannot be blank";
	function_alert($password_err); 
}
elseif(strlen(trim($_POST['password'])) < 5){
	$password_err = "Password cannot be less than 5 characters";
	function_alert($password_err); 
}
else{
	$password = trim($_POST['password']);
	}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
	$password_err = "Passwords should match";
	function_alert($password_err); }


	
// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
	
	$sql = "INSERT INTO users (username, password) VALUES (?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);
        $param_name=$name;
        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
			$name = trim($_POST['nama']);
				   $sql = "UPDATE users SET nama='$name' WHERE username = '$username'";
				   if ($conn->query($sql) === TRUE) {
					
                                        //echo "Record updated successfully";
				   }
                                   else {
					// echo "Error updating record: " . $conn->error;
				   }
            header("location: login.php");
        }
        else{
        function_alert( "Something went wrong... cannot redirect!");
        }
	}
	
	mysqli_stmt_close($stmt);
	
}

mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>QUIZOID Registration Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="img/quizl.png" />

<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>QUIZOID Registration Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="" method="post">
				   <input class="text" type="text" name="nama" placeholder="Name" required="">
				  
					<input class="text email" type="email" name="username" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="Password" required=""><br>
					<input class="text" type="password" name="confirm_password" placeholder="Confirm Password" required="">
					<h6>Note:Your email will be your username</h6>
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" value="Register">
				</form>
				<p>Already have an Account? <a href="login.php"> Login here!</a></p>
			</div>
		</div>
		<!-- copyright -->
		<div class="colorlibcopy-agile">
			<p>© 2020 QUIZOID Registration Form.</p>
		</div>
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>