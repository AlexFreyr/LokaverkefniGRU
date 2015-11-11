<?php
$servername = "tsuts.tskoli.is";
$username = "2408982179";
$password = "mypassword";
$dbname = "2408982179_grulokaverk";

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
?>