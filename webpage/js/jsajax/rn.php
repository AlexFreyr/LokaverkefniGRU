<?php
	session_start();

	if(isset($_SESSION['rn'])){
		unset($_SESSION['rn']);
	}
	$_SESSION['rn'] = $_POST['userRN'];
?>