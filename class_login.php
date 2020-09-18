<?php
    class Login{ //Class pour la page de connexion
        private $_email;
        private $_mdp;

        public function __construct($email, $mdp){
            $this->_email = $email;
            $this->_mdp = $mdp;
        }

        public function tests(){ //Fonction vérifiant si les champs sont remplis correctement
            if (filter_var($this->_email, FILTER_VALIDATE_EMAIL)) {
                if(!empty($this->_mdp)){
                    $bdd = new PDO('mysql:host=localhost; dbname=geoboat; charset=utf8', 'root', '');
                    $requeteUser = $bdd->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
                    $requeteUser->execute(array($this->_email, $this->_mdp));
                    $userExist = $requeteUser->rowCount();
                    if($userExist == 1){ //Test vérifiant si l'utilisateur correspondant aux coordonnées rentrées par l'utilisateur existe
                        $donneesUser = $requeteUser->fetch();
                        session_start();
                        $_SESSION['logged'] = true;
                        $_SESSION['id'] = $donneesUser['id_user'];
                        $_SESSION['droits'] = $donneesUser['droit'];
                        header('Location: tableau_de_bord.php');
                    }
                    else{
                        return "userNoExist";
                    }
                }
                else{
                    return "mdpVide";
                }
            }
            else{
                return "mailInvalide";
            }
        }

        public function erreur($erreur){ //Fonction affichant l'erreur dans le formulaire si erreur il y a
            if($erreur == "mailInvalide"){
                echo "<p class='red-text'>L'adresse e-mail est invalide</p>";
            }
            if($erreur == "mdpVide"){
                echo "<p class='red-text'>Merci de remplir le champ mot de passe</p>";
            }
            if($erreur == "userNoExist"){
                echo "<p class='red-text'>E-mail ou mot de passe incorrect</p>";
            }
            if($erreur == "succes"){
                echo "<p class='green-text'>Connecté!</p>";
            }
        }
    }
?>