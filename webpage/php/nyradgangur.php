<html lang="en">
    <head>
       
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Lokaverkefni GRU">

        <title>Lokaverkefni GRU</title>

        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

        <!--[if lt IE 9]>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="../css/main.css">

    </head>
    <body>
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-old-ie-min.css">
        <![endif]-->
        <!--[if gt IE 8]><!-->
            <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
        <!--<![endif]-->

        <div class="custom-wrapper pure-g" id="menu">
            <div class="pure-u-1 pure-u-md-1-3">
                <div class="pure-menu">
                    <a href="../index.html" class="pure-menu-heading custom-brand">Áríon banki</a>
                    <a href="#" class="custom-toggle" id="toggle"><s class="bar"></s><s class="bar"></s></a>
                </div>
            </div>
            <div class="pure-u-1 pure-u-md-1-3">
                <div class="pure-menu pure-menu-horizontal custom-can-transform">
                    <ul class="pure-menu-list">
                        <li class="pure-menu-item"><a href="../index.html" class="pure-menu-link">Heim</a></li>
                        <li class="pure-menu-item"><a href="../umokkur.html" class="pure-menu-link">Um okkur</a></li>
                        <li class="pure-menu-item"><a href="../hafasamband.html" class="pure-menu-link">Hafa samband</a></li>
                    </ul>
                </div>
            </div>
            <div class="pure-u-1 pure-u-md-1-3">
                <div class="pure-menu pure-menu-horizontal custom-menu-3 custom-can-transform">
                    <ul class="pure-menu-list">
                        <li class="pure-menu-item"><?php echo "<p>Þú ert skráð/ur inn sem ". $_POST["nafn"] ."</p>";?></li>
                    </ul>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/menu.js"></script>
        <div class="main pure-g">
            <div class="pure-u-1-2">
                <h2>Velkomin og takk fyrir að gera nýjann aðgang hjá Áríon banka</h2>
                    <?php echo $_POST["nafn"]; ?><br>
                    <?php echo $_POST["netfang"]; ?><br>
                    <?php echo  $_POST["kennitala"]; ?><br>
                    <?php echo  $_POST["Land"]; ?><br>
                    <?php echo  $_POST["kyn"]; ?><br>
                     <?php
                        include "dbcon.php";
                        try{
                            $Nafn = $_POST["nafn"];
                            $netfang = $_POST['netfang'];
                            $kt = $_POST['kennitala'];
                            $Land = $_POST['Land'];
                            $kyn = $_POST['kyn'];
                            $lykilord = md5($_POST['lykilord']);
                        } catch (Exception $e) {
                             echo "Error fetching: " . $e->getMessage();
                        }

                        $sql = 'INSERT INTO notandi(nafn, kennitala, kyn, Land, lykilord, netfang)
                                VALUES(:nafn, :kennitala, :kyn, :Land, :lykilord, :netfang)';
                        $q = $connection->prepare($sql);
                        try{
                            $q->bindValue(':nafn',$Nafn);
                            $q->bindValue(':kennitala',$kt);
                            $q->bindValue(':kyn',$kyn);
                            $q->bindValue(':Land',$Land);
                            $q->bindValue(':lykilord',$lykilord);
                            $q->bindValue(':netfang',$netfang);
                            $q->execute();
                        } 
                        catch (Exception $e) {
                            echo "Error fetching: " . $e->getMessage();
                        }
                        ?>
            </div>
            <div class="pure-u-1-2">
                <p>Skylmálar Áríon banka: </p>
                <ul>
                    <li>
                        <p>Áríon banki er ekki í neinu tilviki tengdur Arion banka sem er alvöru banki</p>
                    </li>
                    <li>
                        <p>Við upphaf viðskiptasambands eða við upphaf einstakra viðskipta ber bankanum almennt
                        skylda til þess að kanna áreiðanleika viðskiptavina samkvæmt lögum um aðgerðir gegn
                        peningaþvætti og fjármögnun hryðjuverka nr. 64/2006 með síðari breytingum. Til þess að
                        geta kannað áreiðanleika væntanlegra viðskiptavina sinna óskar bankinn eftir upplýsingum
                        um þá. </p>
                        <ol>
                            <li>Nafn</li>
                            <li>Kennitölu</li>
                            <li>Netfang</li>
                            <li>Land</li>
                        </ol>
                        <p>Hafi bankinn ástæðu til að ætla að þeir fjármunir sem eiga að fara í gegnum kerfi bankans
                        séu ágóði af ólögmætri háttsemi eða tengjast fjármögnun hryðjuverka áskilur bankinn sér
                        allan rétt til að stöðva slík viðskipti án fyrirvara. Hafi bankinn rökstuddan grun eða réttmæta
                        ástæðu til að ætla að viðskipti séu hluti af peningaþvætti eða fjármögnun hryðjuverka
                        tilkynnir hann það til lögreglu. Hvort heldur sem lögreglu berst tilkynning um grunsamleg
                        viðskipti frá bankanum eða eftir öðrum leiðum er bankanum skylt að afhenda lögreglu allar
                        nauðsynlegar upplýsingar um viðskiptavin og viðskiptin. </p>
                    </li>
                    <li>
                        <p>
                            Bankinn áskilur sér rétt til að afhenda viðskiptavini öll skjöl á rafrænu formi eða öðrum
                            varanlegum miðlum, svo sem í netbanka eða á uppgefið netfang og með samþykki
                            viðskiptavinar, ef lög gera kröfur þar að lútandi. Varðveisla skjala í netbanka viðskiptavinar
                            er í samræmi við lög og reglur á hverjum tíma.<br>
                            Viðskiptavinur getur óskað þess að fá skjöl send til sín í bréfpósti og greiðir þá þóknun í
                            samræmi við verðskrá bankans hverju sinni. Óski viðskiptavinur eftir að fá skjöl send á
                            rafrænu formi greiðir hann þóknun í samræmi við verðskrá bankans hverju sinni.<br>
                            Fari viðskipti fram í gegnum tölvu, síma, smáforrit („App“) Áríon banka í síma, hraðbanka eða annars konar vélknúinn búnað skal viðskiptavinur leggja til þann vél- og hugbúnað sem nauðsynlegur er.<br> Búnaðurinn skal uppfylla kröfur bankans hverju sinni og er viðskiptavinur ábyrgur fyrir notkun á honum. Bankinn verður ekki gerður ábyrgur fyrir tjóni sem hlotist getur af galla eða bilun í vél- eða hugbúnaði. Uppfylli búnaður viðskiptavinar ekki þær lágmarkskröfur sem bankinn gerir er honum heimilt að synja um umbeðin viðskipti eða færslu.
                        </p>
                    </li>
                    <li>
                        <p>
                            Bankinn og starfsmenn hans eru bundnir trúnaðar- og þagnarskyldu um hvaðeina sem þeir fá vitneskju um við framkvæmd starfs síns og varðar einka- eða viðskiptamálefni viðskiptavina bankans. Þessi trúnaðar- og þagnarskylda helst þótt látið sé af starfi. Viðskiptavinur getur þó heimilað að trúnaði sé aflétt. Einnig getur dómari úrskurðað að skylt sé að veita upplýsingar fyrir dómi eða hjá lögreglu eða að skylt sé að veita upplýsingar lögum samkvæmt sem varða einka- og/eða viðskiptamálefni viðskiptavina og bankinn er að jafnaði bundinn trúnaði um. 
                        </p>
                    </li>
                </ul>
            </div>
        </div>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>
