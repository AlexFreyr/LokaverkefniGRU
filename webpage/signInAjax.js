$(document).ready(function () {
    $("#login-btn").click(function(e){

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
					if(data == "Success"){	
						window.location.replace('user/system.php');
					}
					else{
						$('#login-notification').text(data);
					}
				}
			});
		}
    });
 });