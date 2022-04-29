<?php  
session_start();
include 'conn.php';

$id="";
mysqli_query($conn, $sql);
?>

<style>

.col-2{
  text-align: center;
  margin-top: 6px;
  
}
.col-1{
  text-align: center;
  margin-top: 6px;
}
.form-popup {
    display: none;
    position: relative;
    right: 15px;
   
    z-index: 9;
  }
  .form-container {
    max-width: 400px;
   
    text-align: center;
    
  }
  .form-container input[type=text] {
    width: 100%;
    padding: 5px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
  }
  

</style>


<html>
    <head>
        <title>Student Grid</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="assets/js/jquery.js"></script>
        <script>
          
        </script>
    </head>

  <body>
    <section id="header">
      <?php   include 'nav.php';?>
    </section>
    <?php   include 'alert.php';?>
    <div class="container" >
               
                
      <button class="btn-xs btn-primary" onclick="window.open('record.php','popup','width=600,height=600'); return false;">Create Student Record</button>
      <button class="btn-xs btn-primary" onclick="location.href='students.php'">Show All Students Record</button>
      <button class="btn-xs btn-primary" id="openForm">Add</button>
      <?php /*
      <button class="btn-xs btn-primary" onclick="location.href='course.php'">Show Course</button>*/?>
    </div> 

    <div class="container">

      <div class="row" justify-content-center>
        <table class="table">
          <thead>
            <tr>
              <th>Course ID</th>
              <th>Course Name</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
            <?php $sql = "SELECT * FROM `course`;"; 
                $result = $conn->query($sql); 
                // output data of each row
              while($row = $result->fetch_assoc()):?> 
              <div class="row" justify-content-center>
                <tr>
                  <td><?php echo $row['course_id'];?></td>
                  <td><?php echo $row['course'];?></td>
                  <td>  
                    <a id="edit" href="upcr.php?edit=<?php echo $row['course_id'];?>"class="btn btn-info">Edit</a>
                    <a href="upcr.php?delete=<?php echo $row['course_id'];?>"class="btn btn-danger">Delete</a>
                  </td>
              
                </tr>
              </div>  
            <?php endwhile;?>
        </table>

                
      </div>
      <section id="myForm">
        <?php include 'addcr.php';?>
      </section>
          
    </div>

    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/action.js"></script>
  </body>
</html>