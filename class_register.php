<?php
class Register{ //Class pour l'inscription
    private $_email;
    private $_mdp;
    private $_mdpConfirm;
    private $_nom;
    private $_prenom;

    public function __construct($email, $mdp, $mdpConfirm, $nom, $prenom){
        $this->_email = $email;
        $this->_mdp = $mdp;
        $this->_mdpConfirm = $mdpConfirm;
        $this->_nom = $nom;
        $this->_prenom = $prenom;
    }

    public function tests(){ //Fonction vérifiant si les champs sont remplis correctement
        if (filter_var($this->_email, FILTER_VALIDATE_EMAIL)) {
            if(!empty($this->_mdp)){
                if(!empty($this->_nom) && !empty($this->_prenom)){
                    if($this->_mdp == $this->_mdpConfirm){
                        $bdd = new PDO('mysql:host=localhost; dbname=geoboat; charset=utf8', 'root', '');
                        $requeteMail = $bdd->prepare("SELECT * FROM user WHERE email = ?");
                        $requeteMail->execute(array($this->_email));
                        $userExist = $requeteMail->rowCount();
                        if($userExist == 1){  //Test pour savoir si l'email rentré est déjà utilisé
                            return "mailUsed";
                        }
                        else{
                            $date = date("Y-m-d");
                            $requeteInscription = $bdd->query("INSERT INTO `user`(`id_user`, `nom`, `prenom`, `date`, `email`, `droit`, `password`) VALUES (NULL,'".$this->_nom."','".$this->_prenom."','".$date."','".$this->_email."','USER','".$this->_mdp."')");
                            return "succes";
                        }
                    }
                    else{
                        return "mdpDifferents";
                    }
                }
                else{
                    return "nomPrenomVide";
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

    public function erreur($erreur){ //Fonction affichant le message d'erreur si erreur il y a
        if($erreur == "mdpDifferents"){
            echo "<p class='red-text'>Les deux mots de passes ne correspondent pas</p>";
        }
        if($erreur == "mailInvalide"){
            echo "<p class='red-text'>L'adresse e-mail est incorrecte</p>";
        }
        if($erreur == "mdpVide"){
            echo "<p class='red-text'>Merci de remplir le champ mot de passe</p>";
        }
        if($erreur == "nomPrenomVide"){
            echo "<p class='red-text'>Merci de remplir les champs nom et prenom</p>";
        }
        if($erreur == "mailUsed"){
            echo "<p class='red-text'>Adresse e-mail déjà utilisée</p>";
        }
        if($erreur == "succes"){
            echo "<p class='green-text'>Vous êtes inscris!</p>";
        }
    }
}