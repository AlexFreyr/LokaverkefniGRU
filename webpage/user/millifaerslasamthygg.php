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
                        <li class="pure-menu-item"><a href="#" class="pure-menu-link">Stofna reikning</a></li>
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
            <h2 class="middle-style">Millifærslan var samþykkt</h2>
            
            <form class="pure-form pure-form-stacked" id="millifaera-form">
                <div>
                    <?php
                        if(isset($_SESSION['nUp'])){
                            echo "<p>Þú millifærðir ". $_SESSION['nUp'] ." kr. á reikningsnr. " . $_SESSION['vRn'] . "</p>";
                            echo "<p>Þú átt " . $_SESSION['nUpE'] . " kr. eftir";

                            unset($_SESSION['nUpE']);
                            unset($_SESSION['vRn']);
                            unset($_SESSION['nUp']);
                        }else{
                            header("Location: millifaera.php");
                        }
                    ?>
                </div>
            </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!--Öll scripts fara fyrir neðan þetta comment-->
        <script type="text/javascript" src="../js/menu.js"></script>
    </body>
</html>