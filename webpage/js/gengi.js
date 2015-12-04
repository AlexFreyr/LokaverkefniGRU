
$(document).ready(function() {
	var getCountry;
	var getKaup = $("tr td:nth-child(2)");
	var country = ["isk", "usd", "gbp", "eur", "jpy"];
	var gengi = [];
	for(var i = 0; i < getKaup.length; i++){
		gengi[i] = 1000/getKaup[i].innerHTML;
		$('#' + country[i]).val((Math.round(gengi[i] * 100)/100).toString());
	}
 });

$('input').on('input', function(){
	if($(this).attr("id") == "usd"){
		$('#isk').val((Math.round(($(this).val() * 129.37) * 100) / 100).toString());
	}else if($(this).attr("id") == "gbp"){
		$('#isk').val((Math.round(($(this).val() * 197.34) * 100) / 100).toString());
	}else if($(this).attr("id") == "eur"){
		$('#isk').val((Math.round(($(this).val() * 140.48) * 100) / 100).toString());
	}else if($(this).attr("id") == "jpy"){
		$('#isk').val((Math.round(($(this).val() * 1.06) * 100) / 100).toString());
	}

	$('#usd').val((Math.round(($('#isk').val() / 129.37) * 100) / 100).toString());
	$('#gbp').val((Math.round(($('#isk').val() / 197.34) * 100) / 100).toString());
	$('#eur').val((Math.round(($('#isk').val() / 140.48) * 100) / 100).toString());
	$('#jpy').val((Math.round(($('#isk').val() / 1.06) * 100) / 100).toString());
});

/*
	Bæta við punktum inn í tölur ? 
	td núna: 10000, eftir: 10.000
	Sjá til
*/