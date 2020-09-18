<?php
class Admin
{
    private $_bdd;

    public function __construct(){
        $this->_bdd = new PDO('mysql:host=localhost; dbname=geoboat; charset=utf8', 'root', '');
    }

    public function afficheUser()
    {
        $response = $this->_bdd->query("SELECT * FROM user ");
        while ($donneesBrutes = $response->fetch()) {
            echo "<option value='".$donneesBrutes['id_user']."'>".$donneesBrutes['nom']." ".$donneesBrutes['prenom']."</option>";
        }
    }

    public function erreur($erreur)
    {
        if ($erreur == "mailInvalide") {
            echo "<p class='red-text'>L'adresse e-mail est invalide</p>";
        }
        if ($erreur == "mdpVide") {
            echo "<p class='red-text'>Merci de remplir le champ mot de passe</p>";
        }
        if ($erreur == "userNoExist") {
            echo "<p class='red-text'>E-mail ou mot de passe incorrect</p>";
        }
        if ($erreur == "succes") {
            echo "<p class='green-text'>Connecté!</p>";
        }
    }

    public function choixUser($id){
        $requeteUserAModifier = $this->_bdd->query("SELECT * FROM user WHERE id_user = ".$id);
        $donneesUserAModifier = $requeteUserAModifier->fetch();
        return $donneesUserAModifier;
    }

    public function champUser($dataUser){
        echo "
        <form method='post' action=''>
            <input type='hidden' name='iduser' value='".$dataUser['id_user']."'>
            <div class='input-field center-align'>
                <input id='email' name='email' type='text' value='".$dataUser['email']."' class='validate'>
                <label for='email'>E-mail</label>
            </div>
            <div class='row'>
                <div class='col s6'>
                    <p>
                        <label>
                            <input name='droits' type='radio' value='ADMIN'";
                            if($dataUser['droit'] == "ADMIN"){echo "checked";}
                            echo " />
                            <span>Administrateur</span>
                        </label>
                    </p>
                </div>
                <div class='col s6'>
                    <p>
                        <label>
                            <input name='droits' type='radio' value='USER'";
                            if($dataUser['droit'] == "USER"){echo "checked";}
                            echo " />
                            <span>Utilisateur</span>
                        </label>
                    </p>
                </div>
            </div>
            <div class='row'>
                <div class='input-field col s6'>
                    <input id='nom' name='nom' type='text' value='".$dataUser['nom']."' class='validate'>
                    <label for='nom'>Nom</label>
                </div>
                <div class='input-field col s6'>
                    <input id='prenom' name='prenom' type='text' value='".$dataUser['prenom']."' class='validate'>
                    <label for='prenom'>Prenom</label>
                </div>
            </div>
            <div class='row valign-wrapper center-align'>
                <div class='input-field col s6 left-align'>
                    <button class='btn waves-effect waves-light' type='submit' name='supprimerUser'>Supprimer
                        <i class='material-icons right'>delete_forever</i>
                    </button>
                </div>
                <div class='input-field col s6 right-align'>
                    <button class='btn waves-effect waves-light' type='submit' name='modifierUser'>Modifier
                        <i class='material-icons right'>edit</i>
                    </button>
                </div>
            </div>
        </form>
        ";
    }

    public function modifier($id,$email,$nom,$prenom,$droits){
        $requeteModification = $this->_bdd->query("UPDATE user SET `nom`='".$nom."',`prenom`='".$prenom."',`email`='".$email."',`droit`='".$droits."' WHERE id_user = ".$id);
    }

    public function supprimer($id){
        $requeteSuppressionUser = $this->_bdd->query("DELETE FROM user WHERE id_user = ".$id);
        $requeteRecupIdBateau = $this->_bdd->query("SELECT * FROM `assoc_bateau-user` WHERE id_user = ".$id);
        $donneesAssoc = $requeteRecupIdBateau->fetch();
        $requeteSuppressionAssoc = $this->_bdd->query("DELETE FROM `assoc_bateau-user` WHERE id_user = ".$id);
        $requeteSuppressionBateau = $this->_bdd->query("DELETE FROM bateau WHERE id_bateau = ".$donneesAssoc['id_bateau']);
    }
}
