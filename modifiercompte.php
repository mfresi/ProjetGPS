<?php include("class_modif.php"); 
    session_start();
    $modif = new modif;
    if(isset($_POST['modifierUser'])){
        if(!isset($_POST['nvxMdp'])){
            $_POST['nvxMdp'] = false;
        }
        $erreur = $modif->modifierUser($_SESSION['id'], $_POST['email'], $_POST['nom'], $_POST['prenom'], $_POST['nvxMdp'], $_POST['mdp'], $_POST['mdpConfirm'], $_SESSION['droits'], $_POST['droits']);
    }
?>

<script type="text/javascript">
    function displayMdp(){
        var divMdp = document.getElementById("champMdp");
        var checkMdp = document.getElementById("nvxMdp");
        if(checkMdp.checked == false){
            divMdp.style.display = "none";
        }
        if(checkMdp.checked == true){
            divMdp.style.display = "block";
        }
    }
    
</script>

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
                <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){ ?>
                    <li><a href="tableau_de_bord.php">Tableau de bord</a></li>
                    <li><a href="">Documentation</a></li>
                    <?php
                        if($_SESSION['droits'] == "ADMIN"){
                            echo "<li><a href='admin.php'>Admin</a></li>";
                        }
                    ?>
                    <li><a href="contact.php">Contact</a></li>
                    <li class="active"><a href="">Modifier mon compte</a></li>
                    <li><a href="deconnexion.php"><i class="material-icons">power_settings_new</i></a></li>
                <?php } ?>
            </ul>
        </div>
    </nav>
    <div class="white container z-depth-3" style="min-height:50vh;">
        <div class="container" style="margin-top : 10%; padding-top : 5%; padding-bottom : 5%; margin-bottom : 10%;">
            <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){ ?>
                <div class="center-align">
                    <h5>Modifier mon compte</h5>
                </div>
            <?php 
                if(isset($erreur)){
                    $modif->erreur($erreur);
                }
                $modif->champUser($_SESSION['id']);
            } else{
                include('403.php');
            } ?>
        </div>
    </div>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>