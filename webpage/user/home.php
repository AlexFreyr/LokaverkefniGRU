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
            <div class="pure-u-1 pure-u-md-1-5">
                <div class="pure-menu pure-menu-horizontal custom-can-transform">
                    <ul class="pure-menu-list">
                        <li class="pure-menu-item"><a href="#" class="pure-menu-link" id="selected">Reikningar</a></li>
                        <li class="pure-menu-item"><a href="millifaera.php" class="pure-menu-link">Millifæra</a></li>
                        <li class="pure-menu-item"><a href="stofnareikning.php" class="pure-menu-link">Stofna reikning</a></li>
                    </ul>
                </div>
            </div>
            <div class="pure-u-1 pure-u-md-3-5">
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

                                    if($_SESSION['kyn'] == "Karlkyns"){
                                        echo "Skráður inn sem " . $_SESSION['nafn'] . "";
                                    }elseif($_SESSION['kyn'] == "Kvenkyns"){
                                        echo "Skráð inn sem " . $_SESSION['nafn'] . "";
                                    }else{
                                        echo "Skráð/ur inn sem " . $_SESSION['nafn'] . "";
                                    }

                                ?>
                            </a>
                        </li>
                        <li class="pure-menu-item"><a href="skraut.php" class="pure-menu-link">Útskráning</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="main">
            <h2 class="middle-style">Þínir reikningar</h2>

            <div>
                <table class="pure-table pure-table-bordered" id="n_reikningar">
                    <thead>
                        <tr>
                            <th id="rn">Reikningsnúmer</th>
                            <th>Tegund reiknings</th>
                            <th>Vextir</th>
                            <th>Innistæða</th>
                        </tr>
                    </thead>
                    <?php

                        $reikningar_user = mysql_query("
                              SELECT reikningar.id Reikningsnumer, reikningar.tegund ReiknTegund, innistaeda.vextir ReiknVextir, innistaeda.innistaeda ReiknInnistaeda FROM notandi
                              INNER JOIN reikningar ON reikningar.id_notandi = notandi.id
                              INNER JOIN innistaeda ON innistaeda.id = reikningar.id
                              WHERE notandi.id = '" . $_SESSION['id'] . "'
                              ");

                        while($inner = mysql_fetch_array($reikningar_user, MYSQL_ASSOC)){
                            echo "<tr>";
                                echo "<td>" . $inner['Reikningsnumer'] . "</td>";
                                echo "<td>" . $inner['ReiknTegund'] . "</td>";
                                echo "<td>" . $inner['ReiknVextir'] . "%</td>";
                                echo "<td>" . $inner['ReiknInnistaeda'] . " kr.</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>

            <div class="nyrReikningur">
                <?php
                    if(isset($_SESSION['tegund'])){
                        echo "<strong>Nýr " . $_SESSION['tegund'] . " hefur verið stofnaður</strong>";
                        unset($_SESSION['tegund']);
                    }
                ?>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!--Öll scripts fara fyrir neðan þetta comment-->
        <script type="text/javascript" src="../js/menu.js"></script>
        <script type="text/javascript" src="../js/userhome.js"></script>
    </body>
</html>