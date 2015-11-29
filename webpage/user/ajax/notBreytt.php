<?php
	if(isset($_POST['not_up']) === true && empty($_POST['not_up']) === false){

		require '../../php/dbcon.php';
		session_start();

		$query = mysql_query("
			SELECT innistaeda.innistaeda nInni FROM notandi
			INNER JOIN reikningar ON reikningar.id_notandi = notandi.id
			INNER JOIN innistaeda ON innistaeda.id = reikningar.id
			WHERE notandi.kennitala = '". $_SESSION['kennitala'] ."'
		");


		while($inner = mysql_fetch_array($query, MYSQL_ASSOC)){
			if($inner['nInni'] < $_POST['not_up']){
				echo "Ólögleg heimild";
			}else{
				echo (mysql_num_rows($query) !== 0) ? 'Success' : 'Villa kom upp: ';
				$_SESSION['nReiknings'] = $_POST['not_rk'];
				$_SESSION['nUp'] = $_POST['not_up'];
				$_SESSION['nUpE'] = $inner['nInni'] - $_POST['not_up'];
			}
        }
	}
?>