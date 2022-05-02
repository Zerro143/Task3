<?php 
  session_start();
  include 'conn.php';
  $sql = "SELECT * FROM `course`;"; 
  $result = $conn->query($sql); 
  $sql1 = "SELECT * FROM `course`;";
  // output data of each row

?>
<style>
  .container {

    border-radius: 70px;

    padding: 20px;
    margin: 20%; 

    margin-top: 0%;
  }
  .col-25 {
    text-align: center;
    float: Left;
    width: 25%;
    margin-top: 6px;
  }
  .col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
  }
  .row:after {
    content: "";
    display: table;
    clear: both;
  }
  form{
      align-self: center;
  }
</style>

<html>
  <head>
      <title>Create Record</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="assets/css/bs.css"> 
  </head>
  <body>
    <section id="header">
        <?php //include 'nav.php';?>
    </section>
    <?php   include 'alert.php';?>
    <div class="container">
      <div class="form">
        <form name="student"  action="#" method="post">
          
          <div class="row">
          <input type="hidden" name="id" value="<?php echo $id = $_SESSION['sid'];?>">
            <div class="col-25">
              <label for="fname">First Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="fname" name="fname" placeholder="Your name.."value="<?php echo $_SESSION['fname']; unset($_SESSION['fname']);?>">
              <span class="error"id = "ferr">* </span>
            </div>

          </div>
          <div class="row">
            <div class="col-25">
              <label for="lname">Last Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="lname" placeholder="Your last name.." value="<?php echo $_SESSION['lname'];unset($_SESSION['lname']);?>">
              <span class="error" id = "lerr">* </span>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Birth Date</label>
            </div>
            <div class="col-75">
              <input type="date" name="bdate" id="bdate"value="<?php echo $_SESSION['bdate'];unset($_SESSION['bdate']);?>">
              <span class="error" id="bderr">*</span>

            </div>
          </div>
          <div class="row">
            <div class="col-25">
            <label for="m">Mobile no:</label>
            </div>
            <div class="col-75">
            <input type="phone" id="m" name="m"placeholder="Mobile no." value="<?php echo $_SESSION['m']; unset($_SESSION['m']);?>">  
            <span class="error"id = "merr">* </span>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
            <label for="mail">Email:</label>
            </div>
            <div class="col-75">
            <input type="email" id="mail" name="mail"placeholder="Email" value="<?php echo  $_SESSION['mail'];unset( $_SESSION['mail']);?>">  
            <span class="error" id="mailerr">* </span>
            </div>
          </div>
          <div class="row">
              <div class="col-25">
                  <label for="course">Course:</label>
              </div>
              <div class="col-75">
              <select id = "course" class = "course "name = "course">
                      <?php while($row = $result->fetch_assoc()): ?>
                      <option value="<?php echo $row['course_id'];?>"><?php echo $row['course'];?> </option>

                      <?php endwhile;?>
                  </select> 
              <span class="error">* <?php echo $_SESSION['course_idErr'];unset($_SESSION['course_idErr']);?></span>
            </div>
          </div>
          <?php
            if($_SESSION['supdate']==true):
          ?>    
          <div class="row">
            <div class="col-25">
              <label>Updated Date</label>
            </div>
            <div class="col-75">
              <input type="date" name="cdate" id="cdate"  value="<?php echo  $_SESSION['cdate'];unset( $_SESSION['cdate']);?>">
              <span class="error">* <?php echo $_SESSION['cdateErr'];unset($_SESSION['cdateErr']);?></span>

            </div>
          </div>
      
          
          <center><button type="submit" class="btn btn-info" placeholder="update" name="update">Update</button></center>
          <?php unset($_SESSION['supdate']); ?>  
          
          <?php else:?>

          <center><button id="add" type="submit" class="btn btn-primary" value = "add">Add</button></center>
          <?php endif;?>
          


                      


          
        </form>
      </div>
      </div>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/saction.js"></script>
  </body>
</html>      