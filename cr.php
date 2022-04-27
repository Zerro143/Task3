<html lang="en"> 
 <head> 
   <title>Course</title> 
   <meta charset="utf-8"> 
   <meta name="viewport" content="width=device-width, initial-scale=1"> 
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
 </head> 
 <body> 
   
 <div class="container py-5"> 
   <h2>Add Course</h2> 
   <p class="text-right"><a href="index.php" class="btn btn-primary">View all course</a></p> 
   <form> 
     <div class="form-group"> 
       <label for="title">Course</label> 
       <input type="text" class="form-control" id="course"> 
     </div> 
    <button type="button" id="save" class="btn btn-primary">Submit</button> 
   </form> 
 </div> 
   
   
 <script> 
 $('#save').click(function () { 
   
 $course = $('#course').val(); 
 
   
   
   
 $.ajax({url:"icr.php", 
 method:"POST", 
 data:{course:$course}, 
 success:function(dataabc){ 
   window.location.href="icr.php"; 
 }}); 
   
   
 }); 
   
   
   
 </script> 
   
   
 </body> 
 </html> 