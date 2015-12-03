<?php
	if(isset($_POST['vid_rn']) === true && empty($_POST['vid_kt']) === false){

		require '../../php/dbcon.php';

		$query = mysql_query("
			SELECT notandi.nafn vNafn, innistaeda.innistaeda vInni, notandi.kennitala vKenn FROM notandi
			INNER JOIN reikningar ON reikningar.id_notandi = notandi.id
			INNER JOIN innistaeda ON innistaeda.id = reikningar.id
			WHERE reikningar.id = ". mysql_real_escape_string($_POST['vid_rn']) . " AND
			notandi.kennitala = '". mysql_real_escape_string($_POST['vid_kt']) ."'
		");

		session_start();
		$_SESSION['vRn'] = $_POST['vid_rn'];
		
		echo (mysql_num_rows($query) !== 0) ? 'Success' : 'Reikningsnúmer eða kennitala röng';

		while($inner = mysql_fetch_array($query, MYSQL_ASSOC)){
			$_SESSION['vNafn'] = $inner['vNafn'];
			$_SESSION['vInni'] = $inner['vInni'];
			$_SESSION['vKenni'] = $inner['vKenn'];
        }
	}
?>