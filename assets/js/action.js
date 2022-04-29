$(document).ready(function(){
    $("#myForm").hide();
  

    $("#openForm").click(function(){
        $("#myForm").show();
        $("#update").hide();
        $("#add").show();
        $("#crerr").html("");
    });
    $("#closeForm").click(function(){
        $("#myForm").hide();
        $("#crerr").html("");
    });

    $("#edit").click(function(e){
        e.preventDefault();
        $("#add").hide();
        $("#update").show();
        $("#myForm").show();
    });
    
    $("#add").click(function(e){
        e.preventDefault();
        
        var add = $("#add").attr("value");
        var course = $("#course").val()
        //alert(course + "Added to Database")
        if(course !== ""){
            $.ajax({url:"upcr.php", 
            method:"POST", 
            data:{a:add,b:course}, 
            success:function(dataabc){ 
                alert(course + " Added to Database");
                $("#course").val("");
            }});
        }else{
            //alert("Please enter the Course");
            $("#crerr").html("<b>Please Enter the Course</b>")
        }
    
    });

});