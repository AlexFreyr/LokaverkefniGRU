<?php
	if(isset($_POST['kt']) === true && empty($_POST['kt']) === false){
		if(isset($_POST['password']) === true && empty($_POST['password']) === false){
			require '../php/dbcon.php';

			$query = mysql_query("
				SELECT notandi.*
				FROM notandi 
				WHERE kennitala = '". mysql_real_escape_string(trim($_POST['kt'])) . "'
				AND lykilord = '". mysql_real_escape_string(trim(md5($_POST['password']))) ."'
			");

			session_start();
			
			echo (mysql_num_rows($query) !== 0) ? 'Success' : 'Kennitala eða lykilorð ekki rétt';

			$_SESSION['kennitala'] = $_POST['kt'];
			$_SESSION['lykilord'] = md5($_POST['password']);
		}
	}
?>