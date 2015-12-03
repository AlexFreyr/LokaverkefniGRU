<?php
	session_start();
	require '../php/dbcon.php';

	$updateCurrent = mysql_query("
		UPDATE innistaeda 
		SET innistaeda='". $_SESSION['nUpE'] . "' 
		WHERE id = '" . $_SESSION['nReiknings'] . "'
	");

	$vidtakandifaer = $_SESSION['vInni'] + $_SESSION['nUp'];

	$updateVidtakandi = mysql_query("
		UPDATE innistaeda
		SET innistaeda='". $vidtakandifaer ."' 
		WHERE id = '". $_SESSION['vRn'] ."'
	");

	$vidkomandiRn = $_SESSION['vRn'];
	$lagtInn = $_SESSION['nUp'];
	$nafnNotanda = $_SESSION['nafn'];
	$ktNotanda = $_SESSION['kennitala'];
	$currentDate = date('Y-m-d');

	$updateVidtakandiHreyfingar = ("
		INSERT INTO hreyfingar(id_reikningur, upphaedBreytt, innistaedaEftir, skyring, tilvisun, dagsetning)
		VALUES('$vidkomandiRn', '$lagtInn', '$vidtakandifaer', '$nafnNotanda', '$ktNotanda', CURDATE())
		");
	mysql_query($updateVidtakandiHreyfingar) or die(trigger_error(mysql_error() . " in " .$updateVidtakandiHreyfingar));

	$vidkomandiRn = $_SESSION['nReiknings'];
	$lagtInn = ($_SESSION['nUp'] * -1);
	$upphaedEftir = $_SESSION['nUpE'];
	$vidkomandiKt = $_SESSION['vKenni'];

	$updateNotandiHreyfingar = mysql_query("
		INSERT INTO hreyfingar(id_reikningur, upphaedBreytt, innistaedaEftir, skyring, tilvisun, dagsetning)
		VALUES('$vidkomandiRn', '$lagtInn', '$upphaedEftir', 'Millifærsla', '$vidkomandiKt', CURDATE())
		");

	function Redirect($url, $permanent = false)
	{
	    if (headers_sent() === false)
	    {
	    	header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
	    }

	    exit();
	}

	unset($_SESSION['vNafn']); //Nafn viðkomanda
	unset($_SESSION['vInni']); //innistæða viðkomanda

	Redirect('http://tsuts.tskoli.is/2t/2408982179/gru/user/millifaera.php', false);
?>