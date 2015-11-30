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
            <div class="pure-u-1 pure-u-md-1-5">
                <div class="pure-menu">
                    <a href="../index.php" class="pure-menu-heading custom-brand">Áríon banki</a>
                    <a href="#" class="custom-toggle" id="toggle"><s class="bar"></s><s class="bar"></s></a>
                </div>
            </div>
            <div class="pure-u-1 pure-u-md-2-5">
                <div class="pure-menu pure-menu-horizontal custom-can-transform">
                    <div class="pure-menu-list">
                        <li class="pure-menu-item"><a href="home.php" class="pure-menu-link">Reikningar</a></li>
                        <li class="pure-menu-item"><a href="#" class="pure-menu-link" id="selected">Millifæra</a></li>
                        <li class="pure-menu-item"><a href="stofnareikning.php" class="pure-menu-link">Stofna reikning</a></li>
                    </div>
                </div>
            </div>
            <div class="pure-u-1 pure-u-md-2-5">
                <div class="pure-menu pure-menu-horizontal custom-menu-3 custom-can-transform">
                    <ul class="pure-menu-list">
                        <li class="pure-menu-item">
                            <a href="#" class="pure-menu-link" id="selected">
                                <?php
                                    session_start();
                                    require "../php/dbcon.php";

                                    if (!isset($_SESSION['nafn'])) {
                                        die("Þú ert ekki skráð/ur inn");
                                    }

                                    echo "Skráð/ur inn sem " . $_SESSION['nafn'];
                                ?>
                            </a>
                        </li>
                        <li class="pure-menu-item"><a href="skraut.php" class="pure-menu-link">Útskráning</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="main">
            <h2 class="middle-style">Millifæra</h2>
            
            <form class="pure-form pure-form-stacked" id="millifaera-form">
                <div class="pure-g">
                    <fieldset>
                        <div class="pure-u-1 pure-u-md-2-3">
                            <label>Eigin reikningar*</label>
                            <select class="pure-input-1" id="not_reikn">
                                <?php
                                    $reikningar_user = mysql_query("
                                          SELECT reikningar.id Reikningsnumer, reikningar.tegund ReiknTegund, innistaeda.innistaeda Innist FROM notandi
                                          INNER JOIN reikningar ON reikningar.id_notandi = notandi.id
                                          INNER JOIN innistaeda ON innistaeda.id = reikningar.id
                                          WHERE notandi.id = '" . $_SESSION['id'] . "'
                                          ");

                                    while($inner = mysql_fetch_array($reikningar_user, MYSQL_ASSOC)){
                                        echo "<option>" . $inner['Reikningsnumer'] . " | " . $inner['ReiknTegund'] . " | " . $inner['Innist'] ." kr.</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="pure-u-1 pure-u-md-1-3">
                            <label>Upphæð*</label>
                            <input type="text" placeholder="Upphæð" class="pure-input-1" id="not_upphaed"/>
                        </div>

                        <div class="pure-u-1 pure-u-md-1-3">
                            <label>Reikningsnr. hjá viðtakanda*</label>
                            <input type="text" placeholder="Reikningsnúmer." class="pure-input-1" id="vid_nr"/>
                        </div>

                        <div class="pure-u-1 pure-u-md-2-3">
                            <label>Kennitala viðtakanda*</label>
                            <input type="text" placeholder="Kennitala viðtakanda" class="pure-input-1" id="vid_kennitala"/>
                        </div>

                        <div class="pure-controls">
                            <button type="button" class="pure-button pure-button-primary" id="klara-btn">Klára</button>
                        </div>
                    </fieldset>
                </div>
                <p id="alert-notification"></p>

                <div class="pure-g">
                    <div class="pure-u-1">
                        <?php
                            if(isset($_SESSION['nUpE'])){
                                echo "<strong>Millifærslan var samþykkt</strong>";
                                echo "<p>Þú millifærðir ". $_SESSION['nUp'] ." kr. á reikningsnr. " . $_SESSION['vRn'] . "</p>";

                                unset($_SESSION['nReiknings']); //Reikningsnúmer notanda
                                unset($_SESSION['nUpE']); //Notandi upphæð eftir
                                unset($_SESSION['vRn']); //viðkomandi reikingsnúmer
                                unset($_SESSION['nUp']); //notandi upphæð
                            }
                        ?>
                    </div>
                </div>
            </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!--Öll scripts fara fyrir neðan þetta comment-->
        <script type="text/javascript" src="../js/menu.js"></script>
        <script type="text/javascript" src="../js/plugins/numeric.js"></script>
        <script type="text/javascript" src="../js/millifaera.js"></script>
        <script type="text/javascript" src="millifaerslaValid.js"></script>
    </body>
</html>