function update()
{
$(document).ready(function(){
    $("#submit_btn").click(function(){
        var name = $("#name").val();
        var age = $("#age").val();
        var dob = $("#dob").val();
        var contact = $("#contact").val();

        $.ajax({
            type: "POST",
            url: "profile.php",
            data: {name: name, age: age, dob: dob, contact: contact},
            success: function(data){
                alert("Profile Updated Successfully");
            }
        });
    });
});
}