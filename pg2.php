<section id= "main">

   
<div class="container">

  <div class="row justify-content-center">
  <table class="table datatable" id = "datatable">
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
          <?php $sql = "SELECT * FROM student INNER JOIN course ON student.course_id = course.course_id WHERE id BETWEEN 10 AND 20;"; 
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
                <td><?php echo $row['course'];?></td>
                <td><?php echo $row['bdate'];?></td>
                <td><?php echo $row['created_date'];?></td>
                <td><?php echo $row['update_date'];?></td>
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
 