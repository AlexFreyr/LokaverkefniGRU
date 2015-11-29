$(document).ready(function () {
    $("#klara-btn").click(function(e){

    	var vid_kt = $('#vid_kennitala').val();
    	var vid_rn = $('#vid_nr').val();
    	var not_up = $('#not_upphaed').val();

    	var not_rk = get_rk($('#not_reikn').val());
		
		if($.trim(vid_kt) != '' && $.trim(vid_rn) != ''){
			$.ajax({
				type: 'POST',
				url: 'ajax/vidExist.php',
				data: {
					vid_rn: vid_rn,
					vid_kt: vid_kt			
				},
				success: function(data){
					if(data == "Success"){	
						$.ajax({
							type: 'POST',
							url: 'ajax/notBreytt.php',
							data: {
								not_up: not_up,
								not_rk: not_rk			
							},
							success: function(data){
								if(data == "Success"){	
									window.location.replace('millifaeraUpplysingar.php');
								}
								else{
									$('#alert-notification').text(data);
								}
							}
						});
					}
					else{
						$('#alert-notification').text(data);
					}
				}
			});
		}
    });
 });

function get_rk(str){
	var res = str.split(" ");
	return res[0];
}