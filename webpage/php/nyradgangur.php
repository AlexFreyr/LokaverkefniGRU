<?php
    include "dbcon.php";

    $kt = $_POST['kennitala'];
    $kt = mysql_real_escape_string($kt);

    $nafn = $_POST["nafn"];
    $nafn = mysql_real_escape_string($nafn);

    $netfang = $_POST['netfang'];
    $netfang = mysql_real_escape_string($netfang);

    $kyn = $_POST['kyn'];
    $kyn = mysql_real_escape_string($kyn);

    $land = $_POST['land'];
    $land = mysql_real_escape_string($land);

    $lykilord = md5($_POST['lykilord']);
    $lykilord = mysql_real_escape_string($lykilord);

    //Setur nýjann notanda í notanda töfluna
    $nyrNotandi = "
            INSERT INTO notandi(kennitala, nafn, netfang, kyn, land, lykilord)
            VALUES('$kt', '$nafn', '$netfang', '$kyn', '$land', '$lykilord')";

    mysql_query($nyrNotandi) or die(trigger_error(mysql_error()." in ". $nyrNotandi));

    //Ná í id frá notandanum
    $notandiId = mysql_query("
        SELECT id nID FROM notandi WHERE kennitala = '$kt'");

    while($inner = mysql_fetch_array($notandiId, MYSQL_ASSOC)) {
        $id_notandi = $inner['nID'];
    }

    //Nýr reikingur sem notar id hjá notandanum
    $nyrReikningur = "
            INSERT INTO reikningar(id_notandi, tegund)
            VALUES('$id_notandi', 'Byrjendareikningur')";

    mysql_query($nyrReikningur) or die(trigger_error(mysql_error()." in ". $nyrReikningur));

    //Notandi fær 10000kr inn á þann reikning
    $nyInnistaeda = "
        INSERT INTO innistaeda(innistaeda, vextir)
        VALUES('10000', '0')";

    mysql_query($nyInnistaeda) or die(trigger_error(mysql_error()." in ". $nyInnistaeda));

    //Býr til nýtt session
    session_start();

    $_SESSION['kennitala'] = $kt;
    $_SESSION['lykilord'] = $lykilord;

    //Skráir strax inn
    header('Location: ../user/skrain.php');
    exit;
?>