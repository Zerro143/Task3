<?php 
session_start();
include 'conn.php';
$id="0";
$_SESSION['crupdate']=false;

#$_SESSION['message']="";
#$_SESSION['msg_type']="";

$a = $_POST['a'];
//echo $a;
//exit;


if ($a == "add") {
    
    $course = $_POST['b'];
    $sql = "INSERT INTO course(course) VALUES ('$course')"or die("ERROR: Data no stored in database.".mysqli_error($conn));
    echo $sql;
    //mysqli_query($conn, $sql);
   
  
    
}

if (isset($_GET['delete'])) {
    $course_id = $_GET['delete'];
    $sql = "DELETE FROM course WHERE course_id = $course_id" or die("ERROR: Data no stored in database.".mysqli_error($conn));
   mysqli_query($conn, $sql);
  

   $_SESSION['message'] = "Course and Course Related Students has been deleted";
   $_SESSION['msg_type'] = "Danger";
    
   header("location:course.php");
}


if ($a == "update") {
    
    $id = $_POST['c'];
    $course = $_POST['b'];
    
    $sql = "UPDATE course SET course = '$course' WHERE course_id = $id";// or die("ERROR: Data not stored in database.".mysqli_error($conn));
    echo $sql;  
    //mysqli_query($conn, $sql);
     

    //header("location:course.php"); 
  
    
    
}



mysqli_close($conn);
?>