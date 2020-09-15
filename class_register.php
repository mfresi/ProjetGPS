<?php
class Register{
    private $_email;
    private $_mdp;
    private $_mdpConfirm;

    public function __construct($email, $mdp, $mdpConfirm){
        $this->_email = $email;
        $this->_mdp = $mdp;
        $this->_mdpConfirm = $mdpConfirm;
    }

    public function tests(){
        if (filter_var($this->_email, FILTER_VALIDATE_EMAIL)) {
            if(!empty($this->_mdp)){
                if($this->_mdp == $this->_mdpConfirm){
                    $this->enregistrementBDD();
                }
                else{
                    return "mdpDifferents";
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

    public function erreur($erreur){
        if($erreur == "mdpDifferents"){
            echo "<p class='red-text'>Les deux mots de passes ne correspondent pas</p>";
        }
        if($erreur == "mailInvalide"){
            echo "<p class='red-text'>L'adresse e-mail est incorrecte</p>";
        }
        if($erreur == "mdpVide"){
            echo "<p class='red-text'>Merci de remplir le champ mot de passe</p>";
        }
    }

    public function enregistrementBDD(){

    }
}