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
                        <li class="pure-menu-item"><a href="home.php" class="pure-menu-link">Reikningar</a></li>
                        <li class="pure-menu-item"><a href="millifaera.php" class="pure-menu-link">Millifæra</a></li>
                        <li class="pure-menu-item"><a href="#" class="pure-menu-link" id="selected">Stofna reikning</a></li>
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

                                    echo "Skráð/ur inn sem " . $_SESSION['nafn'] . "";
                                ?>
                            </a>
                        </li>
                        <li class="pure-menu-item"><a href="skraut.php" class="pure-menu-link">Útskráning</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="main">
            <h2 class="middle-style">Stofna reikning</h2>

            <form class="pure-form pure-form-stacked">
                <legend>Upplýsingar um nýjann reikning</legend>
                <div class="pure-g">
                    <fieldset>
                        <div class="pure-u-1 pure-u-md-1-3">
                            <label for="first-name">First Name</label>
                            <input id="first-name" class="pure-u-23-24" type="text">
                        </div>

                        <div class="pure-u-1 pure-u-md-1-3">
                            <label for="last-name">Last Name</label>
                            <input id="last-name" class="pure-u-23-24" type="text">
                        </div>

                        <div class="pure-u-1 pure-u-md-1-3">
                            <label for="email">E-Mail</label>
                            <input id="email" class="pure-u-23-24" type="email" required>
                        </div>

                        <div class="pure-u-1 pure-u-md-1-3">
                            <label for="city">City</label>
                            <input id="city" class="pure-u-23-24" type="text">
                        </div>

                        <div class="pure-u-1 pure-u-md-1-3">
                            <label for="tegund">Tegund reiknings</label>
                            <select id="tegund" class="pure-input-1">
                                <option>Sparnaðarreikningur</option>
                                <option>Ávísunarreikningur</option>
                                <option>Debitkortareikingur</option>
                                <option>Kreditkortareikingur</option>
                                <option>Framtíðarreikningur</option>
                            </select>
                        </div>

                        <div class="pure-u-1 pure-u-md-1-3">
                            <label for="vextir">Vextir</label>
                            <select id="vextir" class="pure-input-1-2">
                                <option>1.5%</option>
                                <option>2.1%</option>
                                <option>2.8%</option>
                                <option>3.7%</option>
                                <option>4.8%</option>
                            </select>
                        </div>

                        <div class="pure-controls">
                            <button type="button" class="pure-button pure-button-primary" id="klara-btn">Klára</button>
                        </div>
                    </fieldset>
                </div>
            </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!--Öll scripts fara fyrir neðan þetta comment-->
        <script type="text/javascript" src="../js/menu.js"></script>
    </body>
</html>