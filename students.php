<?php  
  session_start();
  include 'conn.php';
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
<script>
  function openForm() {
    document.getElementById("myForm").style.display = "block";
  }

  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }
</script>

<html>
    <head>
        <title>Student Grid</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    </head>

  <body>
    <section id="header">
      <?php   include 'nav.php';?>
    </section>
    <?php   include 'alert.php';?>

    <?php include 'btn.php';?>
    <div class="container" >
           
        
    <section id= "main">

   
      <div class="container">

        <div class="row justify-content-center">
            <table class="table">
              <thead>
                <tr>
                  <th>Student ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Mobile No.</th>
                  <th>Course</th>
                  <th>Birthdate</th>
                  <th>Created Date</th>
                  <th>Updated Date</th>
                  <th colspan="4">Action</th>
                </tr>
              </thead>
                <?php $sql = "SELECT * FROM student INNER JOIN course ON student.course_id = course.course_id;"; 
                    $result = $conn->query($sql); 

                    // output data of each row
                  while($row = $result->fetch_assoc()):?> 
                  <div class="row" justify-content-center>
                    <tr>
                      <td><?php echo $row['id'];?></td>
                      <td><?php echo $row['fname'];?></td>
                      <td><?php echo $row['lname'];?></td>
                      <td><?php echo $row['email'];?></td>
                      <td><?php echo $row['m'];?></td>
                      <td><?php echo $row['course'];
                                //echo $course_id;
                           //$sql2 = "SELECT * FROM course WHERE id = $course_id";
                           //$result2 = $conn->query($sql2); 
                           //while($row1 = $result2->fetch_assoc())
                           //{
                           //     echo $row1['course']; 
                           //}  ?></td>
                      <td><?php echo $row['bdate'];?></td>
                      <td><?php echo $row['created_date'];?></td>
                      <td><?php echo $row['update_date'];?></td>
                      <td>   
                      <button id="edit" class="btn btn-info edit" did="<?php echo $row['id'];?>" dname="<?php echo $row['fname'];?>">Edit</button>
                      <button id="Delete" class="btn btn-danger delete" did="<?php echo $row['id'];?>">Delete</button>
                      </td>
                          
                    </tr>
                  </div>  
                <?php endwhile;?>
            </table>

                          
        </div>
       
                          
      </div>
    </section>  
    <div class="container">
      <div class="col-4">
       
        <div>
          <div class="form" id="myForm">
            <?php //include 'record.php';?>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/saction.js"></script>
  </body>
</html>