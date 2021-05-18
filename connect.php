<?php 
 
$dbhost 	= "localhost"; 
$dbuser 	= "root"; 
$dbpass 	= "root"; 
$db      	= "iooa"; 
 
$con = new mysqli($dbhost, $dbuser, $dbpass, $db); 

if($con->connect_error) {
    die("Greška u konekciji : " . $con->connect_error);
} 
 
/* end of file */