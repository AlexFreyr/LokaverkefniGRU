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
                        <li class="pure-menu-item"><a href="#" class="pure-menu-link" id="selected">Hafa samband</a></li>
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
                <h1>Hafðu samband</h1>
            </div>
            <div class="pure-u-1-1 pure-sm-1-1 pure-u-md-1-1 pure-u-lg-1-2">
                
                <p>Það er hægt að hafa samband við okkur á ýmsa vegu. </p>
                
                <h3>Símanúmer</h3>
                <p>Þú getur hringt í símann okkar <b> 666 7272 </b>.</p>          
                <h3>Tövupóstur</h3>
                <p>Þú getur sent okkur tölvupóst á netfangið ÁríonBanki@gmail.com</p>
                <h3>Fax</h3>
                <p>Maður getur líka verið gammaldags og sent okkur Fax </p>
                <h3>Póstur</h3>
                <p>Póst númerið okkar er 23463 103 Reykjavík</p>
                

            </div>
            <div class="pure-u-1-1 pure-u-sm-1-1 pure-u-md-1-1 pure-u-lg-1-2">
                <img class="pure-img" src="http://calebstorkey.com/wp-content/uploads/2011/02/Being-Generous-With-Your-Contacts.jpg" >
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!--Öll scripts fara fyrir neðan þetta comment-->
        <script type="text/javascript" src="js/menu.js"></script>
    </body>
</html>
