$('#kennitala').on('focusout', function(){
	var kt = $('#kennitala').val();
	if($.trim(kt) != ''){
		$.post('ajax/userExist.php', {kt: kt}, function(data){
			$('#kt-alert').text(data);
		});
	}
});