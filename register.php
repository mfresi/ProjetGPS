<?php
    include("class_register.php");
    if(isset($_POST['action'])){
        $register = new Register($_POST['email'], $_POST['mdp'], $_POST['mdpconfirm']);
        $test = $register->tests();
    }
?>

<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body style="background-image: url('images/background.jpg');">
        <nav>
            <div class="nav-wrapper">
                <a href="" class="brand-logo"><i class="material-icons">directions_boat</i>GeoBoat</a>
                <ul id="nav-mobile" class="right">
                <li><a href="">Accueil</a></li>
                <li class="active"><a href="">Inscription</a></li>
                <li><a href="login.php">Connexion</a></li>
                </ul>
            </div>
        </nav>
        <div class="white container z-depth-3" style="min-height:50vh;">
            <div class="container" style="margin-top : 10%; padding-top : 5%">
                <div class="center-align">
                    <i class="large material-icons">contact_mail</i>
                </div>
                <h5>S'inscrire</h5>
                <?php
                    if(isset($test)){
                        $register->erreur($test);
                    }
                ?>
                <form action="" method="post">
                    <div class="input-field center-align">
                        <input id="email" name="email" type="text" class="validate">
                        <label for="email">E-mail</label>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="mdp" name="mdp" type="password" class="validate">
                            <label for="mdp">Mot de passe</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="mdpconfirm" name="mdpconfirm" type="password" class="validate">
                            <label for="mdpconfirm">Confirmer mot de passe</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="right-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">S'inscrire
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>