<?php
    class Login{
        private $_email;
        private $_mdp;

        public function __construct($email, $mdp){
            $this->_email = $email;
            $this->_mdp = $mdp;
        }

        public function tests(){
            if (filter_var($this->_email, FILTER_VALIDATE_EMAIL)) {
                if(!empty($this->_mdp)){
                    $this->testBDD();
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
            if($erreur == "mailInvalide"){
                echo "<p class='red-text'>L'adresse e-mail est incorrecte</p>";
            }
            if($erreur == "mdpVide"){
                echo "<p class='red-text'>Merci de remplir le champ mot de passe</p>";
            }
        }

        public function testBDD(){
            
        }
    }
?>