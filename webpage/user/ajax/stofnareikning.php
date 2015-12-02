<?php
	require '../../php/dbcon.php';
	session_start();
	
	$userid = $_SESSION['id'];
	$tegund = $_POST['tegundr'];
	$vextir = $_POST['vextir'];

	$query = mysql_query(
			  "INSERT INTO reikningar(`id_notandi`, `tegund`)
			  VALUES($userid, '$tegund');");

	$query = mysql_query(
			 "INSERT INTO innistaeda(`innistaeda`, `vextir`)
			  VALUES(0, '$vextir')");

	$_SESSION['tegund'] = $tegund;
	echo "Success";
?>