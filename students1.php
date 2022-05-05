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


<html>
    <head>
        <title>Student Grid</title>
           
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/bootstrap.css"> 
        <link rel="stylesheet" href="assets/css/style.css">
    </head>

  <body>
    <section id="header">
      <?php   include 'nav.php';?>
    </section>


    <?php include 'btn.php';?>
    <div class="container" >
           
        
    <section id= "main">

   
      <div class="container"  id = "datatable">

        <div class="row justify-content-center">
        <table class="table datatable" id="tda">
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
              <tbody id="content">

              </tbody>
               
            </table>

                          
        </div>
       
                          
      </div>
    </section>  
    <section id = "course_form" class="container mt-5">
          <?php include 'addcr.php';?>
    </section>
    <section id = "student_form" class="studentForm container mt-5">
          <?php include 'record.php';?>
    </section>
   
    <script src="assets/js/jquery.js"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
   
    <script>
        $("#tda").DataTable({
                "ajax":{
                    "url": "getdata.php",
                    "method":"post",
                    "dataSrc": "",
                   
               
                },
                
                columns: [
                  {"data":"id"},
                  {"data":"fname"},
                  {"data":"lname"},
                  {"data":"email"},
                  {"data":"m"},
                  {"data":"course"},
                  {"data":"bdate"},
                  {"data":"created_date"},
                  {"data":"update_date"},

                ],
                


        })
        $('#tda tbody').on( 'click', 'tr', function () {
                    $(this).toggleClass('selected');
        } );
 
      

        $('#button').click( function () {
                table.row('.selected').remove().draw( false );
        } );
    </script>
     <script src="assets/js/craction.js"></script>
    <script src="assets/js/saction.js"></script>
  </body>
</html>