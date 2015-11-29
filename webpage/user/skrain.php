<?php
	session_start();

	function Redirect($url, $permanent = false)
	{
	    if (headers_sent() === false)
	    {
	    	header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
	    }

	    exit();
	}

	require "../php/dbcon.php";

	$query = mysql_query("
			SELECT *
			FROM notandi
			WHERE kennitala = '" . mysql_real_escape_string($_SESSION['kennitala']) . "'
			AND lykilord = '". mysql_real_escape_string($_SESSION['lykilord']) ."'
		");

	while($row = mysql_fetch_array($query, MYSQL_ASSOC)){
		$_SESSION['nafn'] = $row['nafn'];
		$_SESSION['id'] = $row['id'];
		$_SESSION['kyn'] = $row['kyn'];
		$_SESSION['netfang'] = $row['netfang'];
		$_SESSION['land'] = $row['land'];
	}

	unset($_SESSION['lykilord']);

	Redirect('http://tsuts.tskoli.is/2t/2408982179/gru/user/home.php', false);
?>