$(document).ready(function() {
 
    $("#Add").click(function() {

        var cid = $("#cid").val();
        var course = $("#course").val();
        

        if(course = "") {
            alert("Please Enter Course Name.");
            return false;
        }

        $.ajax({
            type: "POST",
            url: "upcr.php",
            data: {course: course          
            },
            cache: false,
            success: function(data) {
                alert(data);
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
         
    });

});