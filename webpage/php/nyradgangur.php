<!DOCTYPE html>
<html>
<head>
    <title>Býr til aðgang...</title>
    <META charset="utf-8"/>
</head>
<body>
    <?php
    include "dbcon.php";
    try{
        $kt = $_POST['kennitala'];
        $nafn = $_POST["nafn"];
        $netfang = $_POST['netfang'];
        $kyn = $_POST['kyn'];
        $land = $_POST['land'];
        $lykilord = md5($_POST['lykilord']);
    } catch (Exception $e) {
         echo "Error fetching: " . $e->getMessage();
    }

    $sql = 'INSERT INTO notandi(kennitala, nafn, netfang, kyn, land, lykilord)
            VALUES(:kennitala, :nafn, :netfang, :kyn, :land, :lykilord)';
    $q = $connection->prepare($sql);
    try{
        $q->bindValue(':kennitala', $kt);
        $q->bindValue(':nafn', $nafn);
        $q->bindValue(':netfang', $netfang);
        $q->bindValue(':kyn', $kyn);
        $q->bindValue(':land', $land);
        $q->bindValue(':lykilord', $lykilord);
        $q->execute();
    } 
    catch (Exception $e) {
        echo "Error fetching: " . $e->getMessage();
    }

    #Setja inn reikningar þegar notandi býr til nýjann aðgang
    $sql = "SELECT id FROM notandi WHERE kennitala = '$kt'";

    try{
        $result = $connection->query($sql);
    } catch(PDOException $ex) {
        echo "Error fetching record: " . $ex->getMessage();
    }
    while($row = $result->fetch()) {
        $id[] = array($row['id']);
    }
    $id_notandi = $id[0][0];

    $sql = 'INSERT INTO reikningar(id_notandi)
            VALUES(:id_notandi)';

    $q = $connection->prepare($sql);
    try{
        $q->bindValue(':id_notandi', $id_notandi);
        $q->execute();
    } catch (Exception $e){
        echo "Error inserting: " . $e->getMessage();
    }

    #Gerir einn reikning fyrir notandann, fær 10000kr þegar nýr reikningur er stofnaður
    $sql = 'INSERT INTO innistaeda(innistaeda, vextir)
            VALUES(10000, 0)';
    $q = $connection->prepare($sql);
    try{
        $q->execute();
    } catch (Exception $e){
        echo "Error inserting: " . $e->getMessage();
    }

    session_start();

    $_SESSION['kennitala'] = $_POST["kennitala"];
    $_SESSION['lykilord'] = $lykilord = md5($_POST['lykilord']);

    header('Location: ../user/skrain.php');
    exit;
?>
</body>
</html>