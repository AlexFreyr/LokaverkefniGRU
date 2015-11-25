var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject(){
	var xmlHttp;

	if(window.ActiveXObject){
		try{
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch(e){
			xmlHttp = false;
		}
	} else {
		try{
			xmlHttp = new XMLHttpRequest();
		} catch(e){
			xmlHttp = false;
		}
	}	

	if(!xmlHttp)
		alert("Can't create that object");
	else
		return xmlHttp;
}

function process(){
	if(xmlHttp.readyState == 0 || xmlHttp.readyState == 4){
		kt = encodeURIComponent(document.getElementById('login-kt').value);
		password = encodeURIComponent(document.getElementById('login-lykilord').value);
		//alert(kt + " " + CryptoJS.MD5(password));
		//xmlHttp.open("GET", "userSignIn.php?kt=" + kt + "&password=" + CryptoJS.MD5(password), true); //Ekki valid URL ?
		//xmlHttp.onreadystatechange = handleServerResponse;
		//xmlHttp.send(null);

		$.ajax({
			url: "userSignIn.php",
			data: {
				kt: kt
			},
			type: "GET",
			dataType : "json",
			success: function(json){
				$('#login-notification').text(json.title);
			},
			error: function( xhr, status, errorThrown ) {
	        alert( "Sorry, there was a problem!" );
	        console.log( "Error: " + errorThrown );
	        console.log( "Status: " + status );
	        console.dir( xhr );
	    	},
	    	complete: function( xhr, status ) {
		        alert( "The request is complete!" );
		    }
		});
	}
}

function handleServerResponse(){
	if(xmlHttp.readyState == 4){
		if(xmlHttp.status == 200){
			xmlResponse = xmlHttp.responseXML;
			xmlDocumentElement = xmlResponse.documentElement;
			message = xmlDocumentElement.firstChild.data;
			document.getElementById('kt-alert').innerHTML = message;
		} else {
			alert("XMLHTTP STATUS: " + xmlHttp.statusText);
		}
	}
}

$(document).ready(function(){
	$('#login-submit').click(function(){
		process();
	});
});