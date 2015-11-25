<?php
	include "php/dbcon.php";
	header("Content-Type: text/xml");
	echo "<?xml version='1.0' encoding='UTF-8' standalone='yes' ?>";

	echo "<response>";
        try{

    		$kt = $_GET['kt'];
            $lykill = $_GET['password'];

    		$command = "SELECT nafn FROM notandi WHERE kennitala = '$kt' AND lykilord = '$lykill'";
            try{
                $result = $connection->query($command);
            } catch (PDOException $ex) {
                echo "Error fetching record: " . $ex->getMessage();
            }
            while($row = $result->fetch())
            {
                $notendur[] = array($row['nafn']);
            }

            if(empty($notendur){
                echo " ";
            }else{
                echo "Rangt notendanafn / lykilorð";   
            }
        }catch(Exception $ex){
            echo $ex;
        }
	echo "</response>";
?>