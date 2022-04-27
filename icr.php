<?php
include 'conn.php';

$course= $_POST['course']; 

$sql ="insert into course(course) values ('".$course."')"; 

mysqli_query($conn,$sql); 
?>
