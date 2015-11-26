$(document).ready(function(){
	$('#login-submit').click(function(){

		var kt = $('#login-kt').val();
		var password = $('#login-lykilord').val();

		if($.trim(kt) != '' && $.trim(password) != ''){
			
			$.ajax({
				type: 'POST',
				url: 'ajax/userSignIn.php',
				data: {
					kt: kt,
					password: password
				},
				success: function(data){
					if(data == "Correct"){
						window.location.replace('signed/user.php');
					}
					else{
						$('#login-notification').text(data);
					}
				}
			});
		}
		return false;
	});
});