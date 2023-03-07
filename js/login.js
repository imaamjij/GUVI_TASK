function validateForm(){
	var username = document.forms[0].username.value;
	var password = document.forms[0].password.value;
	
	if(username == "" || password == ""){
		alert("Please enter a username and password.");
		return false;
	}
	
	// AJAX
	$.ajax({
		url: 'login.php',
		type: 'POST',
		dataType: 'json',
		data: {
			user: username,
			pass: password
		},
		success: function(response){
			if(response.status == "success"){
				window.location.href = "members.php";
			}
			else{
				alert("Incorrect username or password!");
			}
		}
	});
	
	return false;
}