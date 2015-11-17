<?php
	include "dbcon.php";

	$kt = $_POST['login-kt'];
	$lykill = $_POST['login-lykilord'];

    $command = "SELECT nafn FROM notandi WHERE kennitala = '$kt' AND lykilord = '$lykill'";
    try
    {
        $result = $connection->query($command);
    }
    catch (PDOException $ex)
    {
        echo "Error fetching record: " . $ex->getMessage();
    }
    while($row = $result->fetch())
	{
	    $nafn[] = array($row['nafn']);
	}
	if ($result->num_rows == 0){
		die("Wrong user/pass");
	}else if ($result->)
?>