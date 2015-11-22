<?php
	include "php/dbcon.php";
	header("Content-Type: text/xml");
	echo "<?xml version='1.0' encoding='UTF-8' standalone='yes' ?>";

	echo "<response>";
		$kt = $_GET['kt'];

		$command = "SELECT kennitala FROM notandi WHERE kennitala = '$kt'";
        try{
            $result = $connection->query($command);
        } catch (PDOException $ex) {
            echo "Error fetching record: " . $ex->getMessage();
        }
        while($row = $result->fetch())
        {
            $kennitala[] = array($row['kennitala']);
        }

        if(empty($kennitala)){
            echo " ";
        }else{
            echo "Kennitalan er nú þegar í notkun";   
        }
	echo "</response>";
?>