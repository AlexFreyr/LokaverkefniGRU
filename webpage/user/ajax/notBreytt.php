<?php
	if(isset($_POST['not_up']) === true && empty($_POST['not_up']) === false){

		require '../../php/dbcon.php';
		session_start();

		$query = mysql_query("
			SELECT innistaeda.innistaeda nInni FROM notandi
			INNER JOIN reikningar ON reikningar.id_notandi = notandi.id
			INNER JOIN innistaeda ON innistaeda.id = reikningar.id
			WHERE reikningar.id = '". $_POST['not_rk'] ."'
		");


		while($inner = mysql_fetch_array($query, MYSQL_ASSOC)){
			if($inner['nInni'] < $_POST['not_up']){
				echo "Ólögleg heimild: " . $_POST['not_up'] . "kr.";
			}elseif($_POST['not_up'] <= 0){
				echo "Ólögleg upphæð";
			}elseif($_POST['not_rk'] == $_SESSION['vRn']){
				echo "Þú getur ekki millifært á þetta reikningsnr.";
			} else{
				echo (mysql_num_rows($query) !== 0) ? 'Success' : 'Villa kom upp: ';
				$_SESSION['nReiknings'] = $_POST['not_rk'];
				$_SESSION['nUp'] = $_POST['not_up'];
				$_SESSION['nUpE'] = $inner['nInni'] - $_POST['not_up'];
			}
        }
	}
?>