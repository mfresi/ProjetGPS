<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8">
</head>

<body style="background-image: url('images/background.jpg');background-attachment: fixed;background-position: center center;">
    <nav>
        <div class="nav-wrapper">
            <a href="index.php" class="brand-logo"><i class="material-icons">directions_boat</i>GeoBoat</a>
            <ul id="nav-mobile" class="right">
                <li class="active"><a href="">Tableau de bord</a></li>
                <li><a href="presentation.php">Qu'est ce que GeoBoat?</a></li>
                <li><a href="ekip.php">L'équipe</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php
                    if($_SESSION['droits'] == "ADMIN"){
                        echo "<li><a href='admin.php'>Admin</a></li>";
                    }
                ?>
            </ul>
        </div>
    </nav>
    <div class="white container z-depth-3" style="min-height:50vh;">
        <div class="container" style="margin-top:10%;padding-top:5%;">
            <div class="row">
                <div class="col s6">
                    
                </div>
                <div class="col s6">

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>