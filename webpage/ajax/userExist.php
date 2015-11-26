<?php
	if(isset($_POST['kt']) === true && empty($_POST['kt']) === false){
		require '../php/dbcon.php';

		$query = mysql_query("
			SELECT notandi.kennitala 
			FROM notandi 
			WHERE kennitala = '". mysql_real_escape_string(trim($_POST['kt'])) . "'
		");

		echo (mysql_num_rows($query) !== 0) ? 'Kennitalan er nú þegar í notkun' : '';
	}

	//mysql_result($query, 0, 'kennitala')
	// query result, row number, row name
?>