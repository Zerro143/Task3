<html>
    <head>
        <script src="assets/js/jquery.js"></script>
        <script >
            $(document).ready(function(){
                $("#myForm").hide()

                $("#openForm").click(function(){
                    $("#myForm").show();
                });

                $("#edit").click(function(){
                    $("#myForm").show();
                });
                
                $("#add").click(function(){
                    $add = $(".add").attr("value");
                    $course = $("#course").val();

                    $.ajax({url:"upcr.php", 
                        method:"POST", 
                        data:{a:$add,b:$course}, 
                        success:function(){ 
                            alert(dataabc);
                }});
                });

            });

        </script>
          
     

        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
    </head>
    <body>
    <section id="header">
      <?php   include 'nav.php';?>
    </section>
    <div class="row">
        <div class="col-4">
          <a class="btn btn-primary" id="openForm">Add</a>
          <div style="padding-left:20px">
            <div class="form" id="myForm">
              <form class="form-container" id="courseform">
                <input type="hidden" name="id" value="<?php echo $id = $_SESSION['cid'];?>">
                <div class="row">
                  <label for="course"><b>Couse Name</b></label>
                  <input type="text" id="course" placeholder="Enter course" name="course" value="<?php echo /*$course;*/$_SESSION['course'];  unset($_SESSION['course']);?>" >
                </div>
                <?php
                  if($_SESSION['crupdate']==true):
                ?>
                  <button type="submit" class="btn btn-info" placeholder="update" name="update">Update</button>
                <?php unset($_SESSION['crupdate']); ?>  
                <?php else:?>
                  <button type="submit" id="add" class="btn btn-primary add" placeholder="ADD" name="add" value="add">Add</button>
                <?php endif;?>  
                <button type="button" class="btn btn-primary" onclick="closeForm()">Close</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </body>
</html>