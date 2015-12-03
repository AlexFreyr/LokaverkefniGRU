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
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!--[if lte IE 8]>
  <link rel="stylesheet" href="http://yui.yahooapis.com/combo?pure/0.6.0/base-min.css&pure/0.6.0/grids-min.css&pure/0.6.0/grids-responsive-old-ie-min.css">
<![endif]-->
<!--[if gt IE 8]><!-->
  <link rel="stylesheet" href="http://yui.yahooapis.com/combo?pure/0.6.0/base-min.css&pure/0.6.0/grids-min.css&pure/0.6.0/grids-responsive-min.css">
<!--<![endif]-->
    </head>
    <body>
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-old-ie-min.css">
        <![endif]-->
        <!--[if gt IE 8]><!-->
            <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
        <!--<![endif]-->

        

        <div class="custom-wrapper pure-g" id="menu">
            <div class="pure-u-1 pure-u-md-1-5">
                <div class="pure-menu">
                    <a href="index.php" class="pure-menu-heading custom-brand">Áríon banki</a>
                    <a href="#" class="custom-toggle" id="toggle"><s class="bar"></s><s class="bar"></s></a>
                </div>
            </div>
            <div class="pure-u-1 pure-u-md-2-5">
                <div class="pure-menu pure-menu-horizontal custom-can-transform">
                    <ul class="pure-menu-list">
                        <li class="pure-menu-item"><a href="#" class="pure-menu-link" id="selected">Um okkur</a></li>
                        <li class="pure-menu-item"><a href="skilmalar.php" class="pure-menu-link">Skilmálar</a></li>
                        <li class="pure-menu-item"><a href="hafaSamband.php" class="pure-menu-link">Hafa samband</a></li>
                    </ul>
                </div>
            </div>
            <div class="pure-u-1 pure-u-md-2-5">
                <div class="pure-menu pure-menu-horizontal custom-menu-3 custom-can-transform">
                    <ul class="pure-menu-list">
                        <?php
                            session_start();

                            if(isset($_SESSION['nafn'])){
                                echo '<li class="pure-menu-item"><a href="user/home.php" class="pure-menu-link">';
                                    if($_SESSION['kyn'] == "Karlkyns"){
                                        echo "Skráður inn sem " . $_SESSION['nafn'] . "";
                                    }elseif($_SESSION['kyn'] == "Kvenkyns"){
                                        echo "Skráð inn sem " . $_SESSION['nafn'] . "";
                                    }else{
                                        echo "Skráð/ur inn sem " . $_SESSION['nafn'] . "";
                                    }
                                    echo '</a></li>';
                                echo '<li class="pure-menu-item"><a href="user/skraut.php" class="pure-menu-link">Útskráning</a></li>';
                            }else{
                                echo '<li class="pure-menu-item"><a href="nyrAdgangur.php" class="pure-menu-link">Nýr aðgangur eða skráðu þig inn</a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="main pure-g">
            <div class="pure-u-1-1">
                <h1>Velkomin í viðskipti</h1>
                     </div>
                <div class="pure-u-1-1 pure-u-sm-1-1 pure-u-md-1-2">
                <p>Við hjá Áríon banka tökum vel á móti þér. Markmið okkar er að veita framúrskarandi þjónustu, sérsniðna að þínum þörfum. 
Með því að fylla út formið hér að neðan gefur þú okkur kost á að fara yfir stöðu mála og leita réttra lausna fyrir þig. Ráðgjafi hefur svo samband við þig við fyrsta tækifæri og bókar fund á þeim tíma sem þér hentar best. Á fundinum verður farið yfir þær vörur og þjónustu sem hentar þínum þörfum. Fundurinn er þér að kostnaðarlausu og án allra skuldbindinga en ráðgjafi okkar annast flutning bankaviðskipta þinna til Áríon banka óskir þú þess.</p>
<p>Ef viðskiptavinur telur lausn í máli sínu ekki í samræmi við þær lausnir sem bankinn býður viðskiptavinum sínum almennt getur hann leitað til umboðsmanns viðskiptavina. Áður en óskað er aðkomu umboðsmanns er mikilvægt að búið sé að leita lausna hjá útibúi viðskiptavinar eða því sviði bankans sem fer með mál viðskiptavinar.</p>
                 <p>Umboðsmaður hefur það hlutverk að styðja við ferli fjárhagslegrar endurskipulagningar fyrirtækja í skuldavanda. Umboðsmaður leggur áherslu á að farið sé eftir reglum um fjárhagslega endurskipulagningu fyrirtækja. Umboðsmaður skal einkum gæta þess að viðskipavinir njóti jafnræðis og sanngirni, að vinna við mál sé gegnsæ og skráð, að höfð sé hliðsjón af samkeppnissjónarmiðum og að stefnt sé að rekstri lífvænlegra fyrirtækja.</p> 
                </div>
                <div class="pure-u-1-1 pure-u-sm-1-1 pure-u-md-1-2 pure-u-lg-1-2">
                    <img class="pure-img" src="http://www.allanlloyds.com/wp-content/uploads/2013/01/bigstock-Business-People-Discussing-Wor-7014723.jpg" >
                 </div>
       
            <div class="pure-u-1-1 pure-u-md-1-3 l-box ">
                <h2>Umboðsmaður viðskiptavina</h2>
                 <p>Ef viðskiptavinur telur lausn í máli sínu ekki í samræmi við þær lausnir sem bankinn býður viðskiptavinum sínum almennt getur hann leitað til umboðsmanns viðskiptavina. Áður en óskað er aðkomu umboðsmanns er mikilvægt að búið sé að leita lausna hjá útibúi viðskiptavinar eða því sviði bankans sem fer með mál viðskiptavinar.</p>
                <p>Umboðsmaður hefur það hlutverk að styðja við ferli fjárhagslegrar endurskipulagningar fyrirtækja í skuldavanda. Umboðsmaður leggur áherslu á að farið sé eftir reglum um fjárhagslega endurskipulagningu fyrirtækja. Umboðsmaður skal einkum gæta þess að viðskipavinir njóti jafnræðis og sanngirni, að vinna við mál sé gegnsæ og skráð, að höfð sé hliðsjón af samkeppnissjónarmiðum og að stefnt sé að rekstri lífvænlegra fyrirtækja.</p>            
            </div>
            <div class="pure-u-1-1 pure-u-md-1-3 l-box ">
                <h2>Eignir til sölu</h2>
                 <p>Stefna bankans er að eiga ekki eignarhluti í félögum í óskyldum rekstri lengur en ástæða þykir til. Þannig erum við tilbúnir að selja viðskipavinum þessar eignir</p>
                 <h3>Siminn hf. (7.2%)</h3>

                 <p>Síminn er öflugt rekstrarfélag með starfsemi í fjarskiptum, upplýsingatækni og afþreyingu. Bankinn eignaðist hlutinn um mitt ár 2013 í tengslum við endurskipulagningu félagsins og er stefnt að skráningu þess á Aðalmarkað Nasdaq OMX Iceland hf. á haustmánuðum 2015.</p>
                <h3>Farice ehf. (39,3%)</h3>
                <p>Farice er eigandi tveggja sæstrengja sem tengja saman Ísland og Evrópu. Hlutur bankans í Farice er til sölu og geta áhugasamir fjárfestar haft samband við Fyrirtækjaráðgjöf Áríon banka.</p>

            </div>
            <div class="pure-u-1-1 pure-u-md-1-3 l-box">
                <h2>Stefna Áríon banka</h2>
                 <p >Áríon banki er fjárhagslega sterkur banki sem veitir alhliða bankaþjónustu til fyrirtækja og einstaklinga. </p>
                 <ul>
                    <li>Áhersla á fyrirtæki og einstaklinga sem þurfa fjölbreytta fjármálaþjónustu </li>
                    <li>Áhersla á viðskiptasamband til langs tíma með því að bjóða framúrskarandi þjónustu og sérsniðnar lausnir</li>
                    <li>Starfar á höfuðborgarsvæðinu og í stærstu byggðakjörnum</li>
                    <li>Leggur sitt af mörkum til uppbyggingar atvinnulífs og samfélags </li>
                    <li>Ætlar að ná afgerandi stöðu til lengri tíma á íslenskum bankamarkaði hvað varðar arðsemi, skilvirkni og þjónustuframboð</li>
                    <li>Utan Íslands á bankinn einkum viðskipti við fyrirtæki sem tengjast sjávarútvegi í Evrópu og Norður-Ameríku</li>

                 </ul>
            </div>
           
           
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!--Öll scripts fara fyrir neðan þetta comment-->
        <script type="text/javascript" src="js/menu.js"></script>

    </body>
</html>
