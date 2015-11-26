function allow(){
	var kt = $('#login-kt').val();
	var password = $('#login-lykilord').val();
	
	if($.trim(kt) != '' && $.trim(password) != ''){
		
	}
	return false;
}

$(document).ready(function () {
    $("#login-form").submit(function(e){
    	e.preventDefault();

    	$.ajax({
			type: 'POST',
			url: 'ajax/userSignIn.php',
			data: {
				kt: kt,
				password: password
			},
			success: function(data){
				if(data == "Success"){
					
					//window.location.replace('user/system.php');
				}
				else{
					$('#login-notification').text(data);
				}
			}
		});
    });
 });

function showMsg(current, sender){
	if(current == "Success"){
		if(sender != null){
			return false;
		} else {
			$('#login-form').unbind('submit').submit();
		}
	}
}