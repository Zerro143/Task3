<?php  
session_start();
include 'conn.php';?>
<html>
    <head>

    </head>
    <body>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css"> 
        <link rel="stylesheet" href="assets/css/style.css">
        <section id="header">
          <?php   include 'nav.php';?>
        </section>
        <?php include 'btn.php';?>         
        <div class="container">            
                   
           
            <div class="row justify-content-center">
            <table class="table datatable" id = "datatable">
                <thead>
                  <tr>
                    <th><input type="checkbox" name="" id="master"></td>
                    <th>Student ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th colspan="4">Action</th>
                  </tr>
                </thead>
                  <?php $sql = "SELECT * FROM `student`;"; 
                      $result = $conn->query($sql); 
                      // output data of each row
                    while($row = $result->fetch_assoc()):?> 
                    <div class="row" justify-content-center>
                      <tr>
                        <td><input type="checkbox" class="sil" id="checkbox" value=<?php echo $row['id'];?>></td>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['fname'];?></td>
                        <td><?php echo $row['lname'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td>   
                      <button id="edit" class="btn btn-info edit1" 
                        did="<?php echo $row['id'];?>" 
                        dfname="<?php echo $row['fname'];?>" 
                        dlname = "<?php echo $row['lname'];?>"
                        dmail= "<?php echo $row['email'];?>"
                        dm = "<?php echo $row['m'];?>"
                        dbdate = "<?php echo $row['bdate'];?>"
                        dcourse = "<?php echo $row['course_id'];?>"
                        >
                        Edit
                      </button>
                      <button id="Delete" class="btn btn-danger delete1" did="<?php echo $row['id'];?>">Delete</button>
                      </td>
                    
                      </tr>
                    </div>  
                  <?php endwhile;?>
              </table>

            </div>
        </div>

        <section id = "course_form" class="container mt-5">
          <?php include 'addcr.php';?>
        </section>
        <section id = "student_form" class="studentForm container mt-5">
          <?php include 'record.php';?>
        </section>
        
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/craction.js"></script>
    <script src="assets/js/saction.js"></script>
        
    </body>
</html>


