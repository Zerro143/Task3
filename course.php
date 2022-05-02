<?php  
session_start();
include 'conn.php';
mysqli_query($conn, $sql);
?>


<html>
    <head>
        <title>Course Grid</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css"> 
        
    </head>

  <body>
    <section id="header">
      <?php include 'nav.php';?>
    </section>
    <?php include 'alert.php';?>
   
    <?php include 'btn.php';?>
          
                
      
    <section id = "">
      <div class="container" id = "">

        <div class="row" justify-content-center>
          <table class="table" id = "datatable">
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
                      <button id="Delete" class="btn btn-danger delete" did="<?php echo $row['course_id'];?>" dname="<?php echo $row['course'];?>">Delete</button>

                    </td>
                
                  </tr>
                </div>  
              <?php endwhile;?>
          </table>



        </div>
      </div>
    </section>
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
    <script src="assets/js/craction.js"></script>
  </body>
</html>