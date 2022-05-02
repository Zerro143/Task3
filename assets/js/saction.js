//$("#myForm").hide();

$(document).ready(function(){

    $(".delete").click(function(){
        
        
        var id = $(this).attr("did");
        //var course = $(this).attr("dname");
        var btn = "del";
          
        if(confirm("Are you sure u want to delete")){
            
            $.ajax({url:"ups.php", 
            method:"POST", 
            data:{a:btn,c:id}, 
            success:function(dataabc){ 
                location.reload();
                alert("Record Deleted from Database");
                
            }});
        }


    });
  
   
    var f = /^[a-zA-Z]*$/;
    var k = /(6|7|8|9)\d{9}/;
    var q = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
    var errcode = 0;

    function validate(fname,lname,m,mail){
         errcode = 0 ;
        //const f = /^[a-zA-Z]*$/;
         if(fname == ""){
             $("#fname").focus();
             $("#ferr").html("<b>Please Enter you name</b>");
             //alert("enter name");
             errcode = 1;
                
         } else{
             //console.log("1")
             $("#ferr").html("");
             //$("#ferr").hide();
             

         }
         if (f.test(fname) == false){
             $("#fname").focus();
             //alert("Only char ");
             $("#ferr").html("<b>Only Alphabets are allowed</b>");
             errcode = 1;
         } 
         
         
         if(lname == ""){
             $("#lname").focus();
             $("#lerr").html("<b>Please Enter your Last name</b>");
             //alert("enter lname");
             errcode = 1;
             
         }
         else{
             $("#lerr").html("");
         }
         if (f.test(lname) == false){
             $("#lname").focus();
             //alert("Only char ");
             $("#lerr").html("<b>Only Alphabets are allowed</b>");
             errcode = 1;
         }
         
        
         //if(m !== ""){
         if(k.test(m) == false){
             $("#m").focus();
             //alert("Invalid Phone Number");
             $("#merr").html("<b>Only 10 digits are allowed</b>");
             errcode = 1;
     
         }
         else{
             $("#merr").html("");
         }
       

         if (q.test(mail) == false){
             $("#mailerr").html("<b> Please enter a valid email id");
             errcode = 1;

         }
         else{
             $("#mailerr").html("");
         }
     

         //}
         
       
         

         return errcode;

        
    }


    $("#add").click(function(e){
        e.preventDefault();

        var today = new Date();
        var y = String(today.getFullYear());
        var mm = String(1 + today.getMonth()).padStart(2, '0');
        var d = String(1 + today.getDay()).padStart(2, '0');

        
      
       var btn = $("#add").attr("value");
       var fname = $("#fname").val();
       var lname = $("#lname").val();
       var bdate = $("#bdate").val();
       var m = $("#m").val();
       var mail = $("#mail").val();
       var course = $("#course").val();
       var cdate = y +"-"+ mm +"-"+ d; //$("#cdate").val();
     
       
       
       
       errcode = validate(fname,lname,m,mail);
       

      
      
        if(errcode == 0){
           
            $.ajax({url:"ups.php", 
                method:"POST", 
                data:{a:btn,b:fname,c:lname,d:bdate,e:m,f:mail,g:course,h:cdate}, 
                success:function(dataabc){ 
                    //location.reload();
                    alert(fname + " Added to Database");
                    
                }});
            
            
        }

    });

    
});