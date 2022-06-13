<?php 
$hostname     = "localhost";
$username     = "root";
$password     = "Admin@123"; 
//$password     = ""; 
$databasename = "jay"; 
// Create connection 
$conn = new mysqli($hostname, $username, $password,$databasename);
 // Check connection 
if ($conn->connect_error) { 
die("Unable to Connect database: " . $conn->connect_error);
 }
?>