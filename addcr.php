<html>
    <head>
     

      <link rel="stylesheet" href="assets/css/style.css">
      <link rel="stylesheet" href="assets/css/bootstrap.css"> 
    </head>
    <body>
    <section id = "course_form" class="container mt-5">
      <div class="row">
          <div class="col-4">
            <button type="button"class="btn-xs btn-primary" id="openForm">Add Course</button>
            <div style="padding-left:20px">
              <div class="form" id="myForm">
                <form class="form-container" id="courseform">
                  <input type="hidden" name="id" value="<?php echo $id = $_SESSION['cid'];?>">
                  <div class="row">
                    <label for="course"><b>Couse Name</b></label>
                    <input type="text" id="course" placeholder="Enter course" name="course" value="<?php echo /*$course;*/$_SESSION['course'];  unset($_SESSION['course']);?>" >
                    <span id="crerr"></span>
                  </div>
                  <?php
                    if($_SESSION['crupdate']==true):
                  ?>
                    <button type="submit" class="btn btn-info" placeholder="update" name="update">Update</button>
                  <?php unset($_SESSION['crupdate']); ?>  
                  <?php else:?>
                    <button type="submit" id="add" class="btn btn-primary add" placeholder="ADD" name="add" value="add">Add</button>
                  <?php endif;?>  
                  <button type="button" class="btn btn-primary" id="closeForm">Close</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </section>


      <script src="assets/js/bootstrap.js"></script>
      <script src="assets/js/popper.js"></script>
      <script src="assets/js/jquery.js"></script>
      <script src="assets/js/action.js"></script>
                        

    </body>
</html>