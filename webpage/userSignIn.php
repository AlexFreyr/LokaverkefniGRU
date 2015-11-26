<?php
	include "php/dbcon.php";
	header("Content-Type: text/xml");
	echo "<?xml version='1.0' encoding='UTF-8' standalone='yes' ?>";

	echo "<response>";
		$kt = $_GET['kt'];
        $lykill = md5($_GET['password']);

		$command = "SELECT nafn FROM notandi WHERE kennitala = '$kt' AND lykilord = '$lykill'";
        echo $command;
        try{
            $result = $connection->query($command);
        } catch (PDOException $ex) {
            echo "Error fetching record: " . $ex->getMessage();
        }

        while($row = $result->fetch())
        {
            $notendur[] = array($row['nafn']);
        }

        if(isset($notendur))
        {
            if(empty($notendur))
            {
                echo " ";
            }
            else
            {
                echo "Rangt notendanafn / lykilorð";   
            }
        }
        else
        {
            echo "Villa";
        }
	echo "</response>";
?>