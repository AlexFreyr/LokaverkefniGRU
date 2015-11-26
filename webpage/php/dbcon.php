<?php

$servername = "tsuts.tskoli.is";
$username = "GRU_H7";
$password = "mypassword";
$dbname = "gru_h7_grulokaverk";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$connection->exec('SET NAMES "utf8"');
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

mysql_connect('tsuts.tskoli.is', 'GRU_H7', 'mypassword');
mysql_select_db('gru_h7_grulokaverk');
?>