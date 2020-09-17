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
<<<<<<< HEAD:bateau.php
                <li><a href="admin.php">Admin</a></li>
                <li><a href="">Deconnexion</a></li>
=======
                <?php
                    if($_SESSION['droits'] == "ADMIN"){
                        echo "<li><a href='admin.php'>Admin</a></li>";
                    }
                ?>
>>>>>>> b0195ceb9873bfd4d09e004af643ba4757f98c77:tableau_de_bord.php
            </ul>
        </div>
    </nav>
    <div class="white container z-depth-3" style="min-height:50vh;">
<<<<<<< HEAD:bateau.php
        <div class="container" style="margin-top : 10%; padding-top : 5%; padding-bottom : 5%; margin-bottom : 10%;">
            <div class="center-align">
                <select class="browser-default">
                    <option value="" disabled selected>nom des propriètaires du bateau</option>
                    <option value="1"><?php $bateau->afficherName()?></option>
                </select>
=======
        <div class="container" style="margin-top:10%;padding-top:5%;">
            <div class="row">
                <div class="col s6">
                    
                </div>
                <div class="col s6">

                </div>
>>>>>>> b0195ceb9873bfd4d09e004af643ba4757f98c77:tableau_de_bord.php
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>