<!DOCTYPE html>
<html>
<head>
    <title>Authenticating...</title>
    <META charset="utf-8"/>
</head>
<body>
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

        if(empty($nafn)){
            echo "Array is empty";
        }else{
            echo $nafn[0][0];
        }
    ?>
</body>
</html>