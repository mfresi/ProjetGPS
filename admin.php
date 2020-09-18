<?php
include("class_admin.php");
session_start();
$admin = new Admin;
if(isset($_POST['submitModifier'])){
    $dataUser = $admin->choixUser($_POST['selectUser']);
}
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
    <div class="white container z-depth-3" style="min-height:50vh;">
        <div class="container" style="margin-top : 10%; padding-top : 5%; padding-bottom : 5%; margin-bottom : 10%;">
            <?php 
            if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && $_SESSION['droits'] == "ADMIN"){ 
            ?>
                <a href="bateau_admin.php">Voir les bateaux des utilisateurs</a>
                <div class="center-align">
                    <h5>Page d'administration</h5>
                </div>
                <div class="row">
                    <form method="post" action="">
                        <div class="row valign-wrapper center-align">
                            <div class="input-field col s8">
                                <select class="browser-default" name="selectUser">
                                    <option value="" disabled selected>Choisissez un utilisateur à modifier</option>
                                    <?php $admin->afficheUser() ?>
                                </select>
                            </div>
                            <div class="input-field col s4">
                                <button class="btn waves-effect waves-light" type="submit" name="submitModifier">Choisir</button>
                            </div>
                        </div> 
                    </form>
                </div>
                <?php if(isset($dataUser)){
                    $admin->champUser($dataUser);
                }
                if(isset($_POST['modifierUser'])){
                    $admin->modifier($_POST['iduser'],$_POST['email'], $_POST['nom'], $_POST['prenom'], $_POST['droits']);
                } 
                if(isset($_POST['supprimerUser'])){
                    $admin->supprimer($_POST['iduser']);
                }
            } 
            else{
                header('Location: 403.php');
            }?>
        </div>
    </div>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>