<!DOCTYPE html>
<html>
<head>
	<title>Áríon banki</title>
	<meta charset="utf-8"/>
</head>
<body>
	<?php
		session_start();
		require '../php/dbcon.php';

		$query = mysql_query("
			SELECT *
			FROM notandi
			WHERE kennitala = '" . mysql_real_escape_string($_SESSION['notandi']) . "'
			AND lykilord = '". mysql_real_escape_string($_SESSION['lykilord']) ."'
		");
		while($row = mysql_fetch_array($query, MYSQL_ASSOC)){
			echo $row['nafn'];
		}
	?>
</body>
</html>