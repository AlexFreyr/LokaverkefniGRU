<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Lokaverkefni GRU">

        <title>Áríon banki</title>

        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

        <!--[if lt IE 9]>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="css/main.css">

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
                        <li class="pure-menu-item"><a href="umOkkur.php" class="pure-menu-link">Um okkur</a></li>
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
                                echo '<li class="pure-menu-item"><a href="#" class="pure-menu-link">Nýr aðgangur eða skráðu þig inn</a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="main pure-g"> 
            <div class="pure-u-1-2" id="login-form">
                <h2>Skráðu þig inn</h2>

                <!--PHP breytur-->
                <form class="pure-form pure-form-aligned" id="login-form">
                    <fieldset>
                        <div class="pure-control-group">
                            <label for="nafn">Kennitala</label>
                            <input id="login-kt" type="text" placeholder="Kennitala" name="kt">
                        </div>
                        <div class="pure-control-group">
                            <label for="nafn">Lykilorð</label>
                            <input id="login-lykilord" type="password" placeholder="Lykilorð" name="lykilord">
                        </div>
                        <div class="pure-controls">
                            <button type="button" class="pure-button pure-button-primary" id="login-btn">Login</button>
                        </div>
                        <p id="login-notification"></p>
                    </fieldset>
                </form>
            </div>
            <div class="pure-u-1-2" id="nyrReikningur">
            <h2>Nýr aðgangur</h2>
                <p>Stofanðu reikning með okkur, það er fljótt einfalt og þægilegt</p>

                <!--PHP breytur-->
                <form class="pure-form pure-form-aligned" action="php/nyrAdgangur.php" method="POST">
                    <fieldset>
                        <div class="pure-control-group">
                            <label for="nafn">Nafn</label>
                            <input id="nafn" type="text" placeholder="Nafn" name="nafn">
                        </div>

                        <div class="pure-control-group">
                            <label for="kennitala">Kennitala</label>
                            <input id="kennitala" type="text" placeholder="Kennitala" name="kennitala">
                        </div>

                        <div class="pure-control-group">
                            <label for="netfang">Netfang</label>
                            <input id="netfang" type="text" placeholder="Netfang" name="netfang">
                        </div>

                        <div class="pure-control-group">
                            <label for="land">Land</label>
                            <select id="land" name="land">
                                <option>Bretland</option>
                                <option>Bandaríkin</option>
                                <option>Danmörk</option>
                                <option>Ísland</option>
                                <option>Poland</option>
                                <option>Þýskaland</option>
                                <option>Frakkland</option>
                                <option>Kanada</option>
                                <option>Norður Kórea</option>
                                <option>Annað</option>
                            </select>
                        </div>

                        <div class="pure-control-group">
                            <label for="kyn">Kyn</label>
                            <select id="kyn" name="kyn">
                                <option>Karlkyns</option>
                                <option>Kvenkyns</option>
                                <option>Annað</option>
                            </select>
                        </div>

                        <div class="pure-control-group">
                            <label for="lykilord">Lykilorð</label>
                            <input id="lykilord" type="password" placeholder="Lykilorð" name="lykilord">
                        </div>

                        <div class="pure-controls">
                            <label for="cb" class="pure-checkbox">
                                <input id="cb" type="checkbox"> Ég hef lesið og samþykki skilmála Áríon banka
                            </label> 

                            <button type="submit" class="pure-button pure-button-primary" id="signup-submit">Submit</button>
                            <div id="notification"></div>
                            <div id="kt-alert"></div>
                        </div>
                    </fieldset>
                </form>    
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="signUpAjax.js"></script>
        <script type="text/javascript" src="signInAjax.js"></script>
        <!--Öll scripts fara fyrir neðan þetta comment-->
        <script type="text/javascript" src="js/menu.js"></script>
        <script type="text/javascript" src="js/signup.js"></script>
    </body>
</html>