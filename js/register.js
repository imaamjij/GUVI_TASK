function register(){
$(document).ready(function(){
    $('#registerForm').on('submit', function(e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'register.php',
            data: data,
            success: function(data){
                console.log(data);
            }
        });
    });
});
}