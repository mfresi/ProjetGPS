<?php
include("class_admin.php");

$admin = new Admin;
?>

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
                <li><a href="index.php">Accueil</a></li>
                <li class="active"><a href="">Qu'est ce que GeoBoat?</a></li>
                <li><a href="ekip.php">L'équipe</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="admin.php">Admin</a></li>
            </ul>
        </div>
    </nav>
    <div class="white container z-depth-3" style="min-height:50vh;">
        <div class="container" style="margin-top : 10%; padding-top : 5%; padding-bottom : 5%; margin-bottom : 10%;">
            <div class="input-field col s12">
                <div class="responsive-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Mail</th>
                                <th>Droit</th>
                                <th>Password</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <?php $testAdmin = $admin->afficheUser(); ?>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>