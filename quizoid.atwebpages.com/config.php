<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/

define('DB_SERVER', 'fdb28.awardspace.net');
define('DB_USERNAME', '3513070_login');
define('DB_PASSWORD', 'Qwerty@2000');
define('DB_NAME', '3513070_login');

// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
}

?>
