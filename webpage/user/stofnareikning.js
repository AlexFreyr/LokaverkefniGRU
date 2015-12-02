$(document).ready(function(){
	$('#stofnareikning-btn').click(function(e){
		var tegundr = $('#tegund').val();
		var nafnr = $('#nafnR').val();
		var vextir = $('#vextir').val().slice(0, -1);

		$.ajax({
			type: 'POST',
			url: 'ajax/stofnareikning.php',
			data:{
				tegundr: tegundr,
				vextir: vextir
			},
			success: function(data){
				if(data == "Success"){
					window.location.replace('home.php');
				}else{
					$('#alert-notification').text(data);
				}
			}
		});
	});
});