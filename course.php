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
        <title>Course Grid</title>
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
                  <td id = "course_id<?php echo $row['course_id'];?>"><?php echo $row['course_id'];?></td>
                  <td id = "course_name<?php echo $row['course'];?>"><?php echo $row['course'];?></td>
                  <td>  
                    <button id="edit" class="btn btn-info edit" did="<?php echo $row['course_id'];?>" dname="<?php echo $row['course'];?>">Edit</button>
                    <button id="Delete" class="btn btn-info delete" did="<?php echo $row['course_id'];?>" dname="<?php echo $row['course'];?>">Delete</button>
                    
                  </td>
              
                </tr>
              </div>  
            <?php endwhile;?>
        </table>

                
      </div>
    <section id = "course_form" class="container mt-5">
      <div class="row">
          <div class="col-4">
        
            <div style="padding-left:20px">
              <div class="form" id="myForm">
                <form class="form-container" id="courseform">
                  <input type="hidden" id="cid" value="cid">
                  <div class="row">
                    <label for="course"><b>Couse Name</b></label>
                    <input type="text" id="course" placeholder="Enter course" name="course" value="" >
                    <span id="crerr"></span>
                  </div>
                  <button type="button" id="update" class="btn btn-info"  placeholder="update" value="update">Update</button>
                         
                  <button type="button" id="add" class="btn btn-primary" placeholder="ADD" name="add" value="add">Add</button>
               
                  <button type="button" class="btn btn-primary" id="closeForm">Close</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </section>
          
    </div>

    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/action.js"></script>
  </body>
</html>