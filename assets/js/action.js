$("#myForm").hide();

$(document).ready(function(){
   
    const f = /^[a-zA-Z]*$/;

    

    $("#openForm").click(function(){
        $("#myForm").show();
        $("#update").hide();
        $("#add").show();
        
        $("#course").val("");
        $("#crerr").html("");
    });
    $("#closeForm").click(function(){
        $("#myForm").hide();
        $("#crerr").html("");
    });

    $(".edit").click(function(){
        
        var cid = $(this).attr("did");
        var course = $(this).attr("dname");
             
        $("#add").hide();
        $("#update").show();
        $("#myForm").show();
        $("#course").val(course);
        $("#update").click(function(e){
            e.preventDefault();
            var btn = $("#update").val();
            var course = $("#course").val()
            if(course !== ""){
                if(f.test(course) == true){
                    $.ajax({url:"upcr.php", 
                    method:"POST", 
                    data:{a:btn,b:course,c:cid}, 
                    success:function(){ 
                        location.reload();
                        $("#myForm").hide();
                        alert(course + " Updated in Database");
                        $("#course").val("");
                        $("#crerr").html("");
                    }});
                }
                else{
                    $("#crerr").html("<b>Only Alphabets are allowed</b>")
                }
            }else{
                
                $("#crerr").html("<b>Please Enter the Course</b>")
            }

        });
        
       
    });
    
    $("#add").click(function(e){
        e.preventDefault();
       
        
        var btn = $("#add").attr("value");
        var course = $("#course").val()
        
        //alert(course + "Added to Database")
        if(course !== ""){
            if(f.test(course) == true){
                $.ajax({url:"upcr.php", 
                method:"POST", 
                data:{a:btn,b:course}, 
                success:function(dataabc){ 
                    location.reload();
                    alert(course + " Added to Database");
                    $("#myForm").hide();
                    $("#course").val("");
                    $("#crerr").html("");
                }});

            }
            else{
                $("#crerr").html("<b>Only Alphabets are allowed</b>")
            }

        }else{
            //alert("Please enter the Course");
            $("#crerr").html("<b>Please Enter the Course</b>")
        }
    
    });

    $(".delete").click(function(e){
        e.preventDefault();
        
        var cid = $(this).attr("did");
        var course = $(this).attr("dname");
        var btn = "del";
          
        if(confirm("Are you sure u want to delete" + course)){
            
            $.ajax({url:"upcr.php", 
            method:"POST", 
            data:{a:btn,c:cid}, 
            success:function(dataabc){ 
                location.reload();
                alert(course + " Deleted from Database");
                
            }});
        }


    });

});