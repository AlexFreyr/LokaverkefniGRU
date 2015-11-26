<?php
	if(isset($_POST['kt']) === true && empty($_POST['kt']) === false){
		require '../php/dbcon.php';

		$query = mysql_query("
			SELECT notandi.*
			FROM notandi 
			WHERE kennitala = '". mysql_real_escape_string(trim($_POST['kt'])) . "'
			AND lykilord = '". mysql_real_escape_string(trim(md5($_POST['password']))) ."'
		");

		echo (mysql_num_rows($query) !== 0) ? 'Correct' : 'Kennitala eða lykilorð ekki rétt';
	}

	//mysql_result($query, 0, 'kennitala')
	// query result, row number, row name
?>