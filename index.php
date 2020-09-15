<script type="text/javascript">
    function displayRegister(){
        var loginForm = document.getElementById("loginForm");
        var registerForm = document.getElementById("registerForm");
        if(loginForm.style.display == "block"){
            loginForm.style.display = "none";
            registerForm.style.display = "block";
        }
    }
    function displayLogin(){
        var loginForm = document.getElementById("loginForm");
        var registerForm = document.getElementById("registerForm");
        if(registerForm.style.display == "block"){
            loginForm.style.display = "block";
            registerForm.style.display = "none";
        }
    }

</script>

<?php
    include("class_register.php");
    include("class_login.php");
    if(isset($_POST['submitRegister'])){
        $register = new Register($_POST['emailRegister'], $_POST['mdpRegister'], $_POST['mdpconfirmRegister']);
        $testRegister = $register->tests();
    }
    if(isset($_POST['submitLogin'])){
        $login = new Login($_POST['emailLogin'], $_POST['mdpLogin']);
        $testLogin = $login->tests();
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
                <li class="active"><a href="">Accueil</a></li>
                <li><a href="">Qu'est ce que GeoBoat?</a></li>
                <li><a href="">L'equipe</a></li>
                <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </nav>
        <div class="white container z-depth-3" style="min-height:50vh;">
            <div class="container" style="margin-top : 10%; padding-top : 5%">
                <div class="row">
                    <div class="col s6">
                        <h3 style="margin-top:30%;"><i class="large material-icons">directions_boat</i>GeoBoat</h3>
                    </div>
                    <div class="col s6">
                            <?php
                                if(isset($testRegister)){
                                    echo("<div id='loginForm' style='display : none;'>");
                                }
                                else{
                                    echo("<div id='loginForm' style='display : block;'>");
                                }
                            ?>
                                <h5>Se connecter</h5>
                                <?php
                                    if(isset($testLogin)){
                                        $login->erreur($testLogin);
                                    }
                                ?>
                                <form action="" method="post">
                                <div class="input-field center-align">
                                    <input id="emailLogin" name="emailLogin" type="text" class="validate">
                                    <label for="emailLogin">E-mail</label>
                                </div>
                                <div class="row">
                                <div class="input-field col s12">
                                    <input id="mdpLogin" name="mdpLogin" type="password" class="validate">
                                    <label for="mdpLogin">Mot de passe</label>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col s6">
                                        <a style="cursor: pointer;" onclick="displayRegister()">S'inscrire</a>
                                    </div>
                                    <div class="col s6 right-align">
                                        <button class="btn waves-effect waves-light" type="submit" name="submitLogin">Allons-y !
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <?php
                                if(isset($testRegister)){
                                    echo("<div id='registerForm' style='display : block;'>");
                                }
                                else{
                                    echo("<div id='registerForm' style='display : none;'>");
                                }
                            ?>
                                <h5>S'inscrire</h5>
                                <?php
                                    if(isset($testRegister)){
                                        $register->erreur($testRegister);
                                    }
                                ?>
                                <form action="" method="post">
                                    <div class="input-field center-align">
                                        <input id="emailRegister" name="emailRegister" type="text" class="validate">
                                        <label for="emailRegister">E-mail</label>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input id="mdpRegister" name="mdpRegister" type="password" class="validate">
                                            <label for="mdpRegister">Mot de passe</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="mdpconfirmRegister" name="mdpconfirmRegister" type="password" class="validate">
                                            <label for="mdpconfirmRegister">Confirmer mot de passe</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s6">
                                            <a style="cursor: pointer;" onclick="displayLogin()">Se connecter</a>
                                        </div>
                                        <div class="col s6 right-align">
                                            <button class="btn waves-effect waves-light" type="submit" name="submitRegister">S'inscrire
                                                <i class="material-icons right">send</i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>