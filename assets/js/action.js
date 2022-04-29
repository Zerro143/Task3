$(document).ready(function(){
    $("#myForm").hide();
  

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
            if(course !== ""){
                $.ajax({url:"upcr.php", 
                method:"POST", 
                data:{a:btn,b:course,c:cid}, 
                success:function(dataabc){ 
                    alert(course + " Updated in Database");
                    $("#course").val("");
                    $("#crerr").html("");
                }});
            }else{
                //alert("Please enter the Course");
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
            $.ajax({url:"upcr.php", 
            method:"POST", 
            data:{a:btn,b:course}, 
            success:function(dataabc){ 
                alert(course + " Added to Database");
                $("#course").val("");
                $("#crerr").html("");
            }});
        }else{
            //alert("Please enter the Course");
            $("#crerr").html("<b>Please Enter the Course</b>")
        }
    
    });

});