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

	function Redirect($url, $permanent = false)
	{
	    if (headers_sent() === false)
	    {
	    	header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
	    }

	    exit();
	}

	unset($_SESSION['nReiknings']);
	unset($_SESSION['vNafn']);
	unset($_SESSION['vInni']);

	Redirect('http://tsuts.tskoli.is/2t/2408982179/gru/user/millifaerslasamthygg.php', false);
?>