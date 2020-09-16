<?php
    // Class formulaire de contact
    class Contact{
        private $_email;
        private $_prenom;
        private $_nom;
        private $_phone;
        private $_message;

        public function __construct($email, $prenom, $nom, $phone, $message){
            $this->_email = $email;
            $this->_prenom = $prenom;
            $this->_nom = $nom;
            $this->_phone = $phone;
            $this->_message = $message;
        }

        public function tests(){
            if (empty($this->_email) || empty($this->_prenom) || empty($this->_nom) || empty($this->_phone) || empty($this->_message)) {

                return "champInvalid";
    
            }else {
                if (filter_var($this->_email, FILTER_VALIDATE_EMAIL)) {
                    $this->sendMail($this->_message);

                    return "emailSend";
                }
                else {
                    return "emailIncorrect";
                }
                // envoyer un mail.
            }
        }

        public function erreur($erreur){
            if($erreur == "champInvalid"){
                echo "<p class='red-text'>Merci de remplir tous les champs</p>";
            }
            if($erreur == "emailIncorrect"){
                echo "<p class='red-text'>E-mail invalide !</p>";
            }
            if($erreur == "emailSend"){
                echo "<p class='red-text'>L'email a bien ete envoye !</p>";
            }
        }

        public function sendMail($message) {
            $retour = mail('mattei.fresi@hotmail.fr', 'Envoi depuis la page Contact', $message, 'From : support@geoboat.fr');
            if ($retour) {
                echo '<p>Votre message a bien été envoyé.</p>';
            }
        }
    }
?>