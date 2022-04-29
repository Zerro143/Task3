//$("#myForm").hide();

$(document).ready(function(){
   
    const f = /^[a-zA-Z]*$/;
    const k = /(6|7|8|9)\d{9}/;

    $("#add").click(function(e){
        e.preventDefault();
      
       var btn = $("#add").attr("value");
       var fname = $("#fname").val();
       var lname = $("#lname").val();
       var bdate = $("#bdate").val();
       var m = $("#m").val();
       var mail = $("#mail").val();
       var course = $("#course").val();
       var cdate = $("#cdate").val();
       
      
       


       //function validate(fname,lname,m,mail){
            var errcode = 0;
           // const f = /^[a-zA-Z]*$/;
            if(fname == ""){
                $("#fname").focus();
                $("#ferr").html("<b>Please Enter you name</b>")
                //alert("enter name");
                errcode = 1;
                
               
            }
            if (f.test(fname) == false){
                $("#fname").focus();
                //alert("Only char ");
                $("#ferr").html("<b>Only Alphabets are allowed</b>")
                errcode = 1;
            }
            if(lname == ""){
                $("#lname").focus();
                $("#lerr").html("<b>Please Enter your Last name</b>")
                //alert("enter lname");
                errcode = 1;
                
            }
            if (f.test(lname) == false){
                $("#lname").focus();
                //alert("Only char ");
                $("#lerr").html("<b>Only Alphabets are allowed</b>")
                errcode = 1;
            }
           
            //if(m !== ""){
                if(k.test(m) == false){
                    $("#m").focus();
                    //alert("Invalid Phone Number");
                    $("#merr").html("<b>Only 10 digits are allowed</b>")
                    errcode = 1;

                }
            //}
            
          


            //return errcode;

           
        //}

        if(errcode==0){
            alert("Success")
            $("#ferr").html("")
            $("#lerr").html("")
            $("#merr").html("")
            
        }
            
        //validate(fname,lname,m,mail);
           
               
        
       
    
    });
  
});