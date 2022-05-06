<?php

include_once 'conn.php';
 
if(!empty($_FILES["file"]["name"]))
{
 
    
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );
 

    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes))
    {
 

            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
 
            // Skip the first line
            fgetcsv($csvFile);
 
            // Parse data from CSV file line by line
            while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
            {
                // Get row data
                $name = $getData[0];
                $email = $getData[1];
                $phone = $getData[2];
                $status = $getData[3];
 
                // If user already exists in the database with the same email
                $query = "SELECT id FROM student WHERE email = '" . $getData[1] . "'";
 
                $check = mysqli_query($conn, $query);
 
                if ($check->num_rows > 0)
                {
                    mysqli_query($conn, "UPDATE student SET `fname` = '$fname', `lname` = '$lname' , `email` = '$email' , `m` = $m , `course_id` = '$course_id' , `bdate` = '$bdate', `update_date`= '$cdate' WHERE id = $id");
                }
                else
                {
                     mysqli_query($conn, "INSERT INTO student(`fname`, `lname`, `email`, `m`, `course_id`, `bdate`, `created_date`,`update_date`) VALUES ('$fname','$lname','$email','$m','$course_id','$bdate','$cdate','$cdate')");
 
                }
            }
 
            // Close opened CSV file
            fclose($csvFile);
 
            echo "Success";
         
    }
    else
    {
        echo "Error1";
    }
}else{
  echo "Error2";  
}