<?php
    session_start();
    include("class_tablo2bord.php"); 
    $tablo2bord = new tablo2bord;
    if(isset($_POST['submitBoat'])){
        $tablo2bord->ajouterBato($_POST['nomBato'],$_POST['marqueBato'],$_POST['typeBato'],$_SESSION['id']);
    }
?>

<script type="text/javascript">

    function displayAddBoat(){
        var divButton = document.getElementById("noBoat");
        var addForm = document.getElementById("formulaire");
        divButton.style.display = "none";
        addForm.style.display = "block";
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
            <a href="" class="brand-logo"><i class="material-icons">directions_boat</i>GeoBoat</a>
            <ul id="nav-mobile" class="right">
                <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){ ?>
                    <li class="active"><a href="">Tableau de bord</a></li>
                    <li><a href="">Documentation</a></li>
                    <?php
                        if($_SESSION['droits'] == "ADMIN"){
                            echo "<li><a href='admin.php'>Admin</a></li>";
                        }
                    ?>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="modifiercompte.php">Modifier mon compte</a></li>
                    <li><a href="deconnexion.php"><i class="material-icons">power_settings_new</i></a></li>
                    <?php } ?>
            </ul>
        </div>
    </nav>
    <div class="white container z-depth-3" style="min-height:50vh;">
        <div style="margin-top:10%;padding-top:5%;">
            <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){ ?>
            <div class="row">
                <div class="col s6 center-align">
                    <?php $tablo2bord->bienvenueUser($_SESSION['id']); ?>
                </div>
                <div class="col s6 center-align">
                    <?php $tablo2bord->bateauInfo($_SESSION['id']); ?>
                    <div id="formulaire" style="display:none;">
                        <h5>Ajouter son bateau</h5>
                        <form action="" method="post">
                            <div class="row valign-wrapper">
                                <div class="input-field col s6">
                                    <input id="nomBato" name="nomBato" type="text" class="validate">
                                    <label for="nomBato">Nom du bateau :</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="marqueBato" name="marqueBato" type="text" class="validate">
                                    <label for="marqueBato">Marque du bateau :</label>
                                </div>
                            </div>
                            <div class="input-field center-align">
                                <input id="typeBato" name="typeBato" type="text" class="validate">
                                <label for="typeBato">Type de bateau :</label>
                            </div>
                            <div class="row">
                                <div class="col s12 right-align">
                                    <button class="btn waves-effect waves-light" type="submit" name="submitBoat">Allons-y !
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php } else {
                include('403.php');
            }?>
    </div>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>