<?php 
session_start();
include 'conn.php';

$a = $_POST['a'];
//echo $a;



if ($a == "add1") {
    
    $fname = $_POST['b'];
    $lname = $_POST['c'];
    $email = $_POST['f'];
    $m = $_POST['e'];
    $course_id =$_POST['g'];
    $bdate= $_POST['d'];
    $cdate= $_POST['h'];


    $sql = "INSERT INTO student(`fname`, `lname`, `email`, `m`, `course_id`, `bdate`, `created_date`,`update_date`) VALUES ('$fname','$lname','$email','$m','$course_id','$bdate','$cdate','$cdate')";
    //echo $sql;
    mysqli_query($conn, $sql);
   
  
    
}

if ($a == "del") {
   
    if(isset($_POST['ids'])){
        $ids=$_POST['ids'];
        foreach ($ids as $id_d)
        {
            $sql = "DELETE FROM student WHERE id = $id_d" or die("ERROR: Data no stored in database.".mysqli_error($conn));
            echo $sql;
            mysqli_query($conn, $sql);
        }
    }else{
        $id = $_POST['c'];
        $sql = "DELETE FROM student WHERE id = $id" or die("ERROR: Data no stored in database.".mysqli_error($conn));
        mysqli_query($conn, $sql);
    }

}


if ($a == "update1") {
    
    $id = $_POST['i'];
    $fname = $_POST['b'];
    $lname = $_POST['c'];
    $email = $_POST['f'];
    $m = $_POST['e'];
    $course_id =$_POST['g'];
    $bdate= $_POST['d'];
    $cdate= $_POST['h'];
    
    $sql = "UPDATE student SET `fname` = '$fname', `lname` = '$lname' , `email` = '$email' , `m` = $m , `course_id` = '$course_id' , `bdate` = '$bdate', `update_date`= '$cdate' WHERE id = $id" ;
    //echo $sql;  
    mysqli_query($conn, $sql);
     

  
    
    
}

if($a == "export"){
    if(isset($_POST['ids'])){
        $ids=$_POST['ids'];
        $output = fopen("output.csv", "a");
        fputcsv($output, array('id','fname','lname','email','m','course', 'bdate','created_date','update_date'));
        foreach ($ids as $id_d)
        {
          

            $sql = "SELECT * FROM student INNER JOIN course ON student.course_id = course.course_id WHERE id=$id_d ;"; 

            $result = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($result)) {
                fputcsv($output, $row);
                

            }
            fclose($output);
        }
    }

}



mysqli_close($conn);
?>