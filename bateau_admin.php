<?php include("class_bateau.php"); 
    session_start();
    $bateau = new bateau;
?>
<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8">
</head>

<body style="background-image: url('images/background.jpg');background-attachment: fixed;background-position: center center;">
    <!-- Début du header -->
    <nav>
        <div class="nav-wrapper">
            <a href="tableau_de_bord.php" class="brand-logo"><i class="material-icons">directions_boat</i>GeoBoat</a>
            <ul id="nav-mobile" class="right">
                <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && $_SESSION['droits'] == "ADMIN"){ ?>
                    <li><a href="tableau_de_bord.php">Tableau de bord</a></li>
                    <li><a href="">Documentation</a></li>
                    <li class="active"><a href='admin.php'>Admin</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="">Modifier mon compte</a></li>
                    <li><a href="deconnexion.php"><i class="material-icons">power_settings_new</i></a></li>
                <?php } ?>
            </ul>
        </div>
    </nav>
    <!-- Fin du header -->
    <div class="white container z-depth-3" style="min-height:50vh;">
        <div class="container" style="margin-top : 10%; padding-top : 5%; padding-bottom : 5%; margin-bottom : 10%;">
            <?php
            //Si l'utilisateur est connecté et il est administrateur, on affiche la page (1/2)
            if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && $_SESSION['droits'] == "ADMIN"){ ?>
            <!-- Bouton permettant de retourner à la page admin -->
            <a href="admin.php"><i class="material-icons">arrow_back</i>Retour à la page d'administration</a>
            <div class="center-align">
                <h5>Bateaux des utilisateurs</h5>
            </div>
            <div class="row">
                <form method="post" action="">
                    <div class="row valign-wrapper center-align">
                        <!-- Liste déroulante avec tous les utilisateurs -->
                        <div class="input-field col s8">
                            <select class="browser-default" name="selectUser">
                                <option value="" disabled selected>Choisissez un utilisateur</option>
                                <?php $bateau->afficherUser() ?>
                            </select>
                        </div>
                        <div class="input-field col s4">
                            <button class="btn waves-effect waves-light" type="submit" name="submitUser">Choisir</button>
                        </div>
                    </div> 
                </form>
            </div>
            <?php 
            } 
            //Sinon il est redirigé (2/2)
            else{
                header('Location: 403.php');
            } ?>
        <?php    
            //Si l'utilisateur appuye sur le bouton Choisir, on execute la fonction afficherBateau qui affichera les données du bateau associé à l'utilisateur choisi
            if(isset($_POST['submitUser'])){
                $bateau->afficherBateau($_POST['selectUser']);
            }
        ?>
        </div>
    </div>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>