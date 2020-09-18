<?php
    class modif //Class pour la page Modifier mon compte
    {
        private $_bdd;
    
        public function __construct(){
            $this->_bdd = new PDO('mysql:host=localhost; dbname=geoboat; charset=utf8', 'root', '');
        }
        
        public function champUser($iduser){ //Fonction affichant le formulaire prérempli avec les données de l'utilisateur
            $requeteUser = $this->_bdd->query("SELECT * FROM user WHERE id_user = ".$iduser);
            $dataUser = $requeteUser->fetch();
            echo "
            <form method='post' action=''>
                <input type='hidden' name='iduser' value='".$dataUser['id_user']."'>
                <div class='input-field center-align'>
                    <input id='email' name='email' type='text' value='".$dataUser['email']."' class='validate'>
                    <label for='email'>E-mail</label>
                </div>
                <p>
                    <label>
                        <input type='checkbox' id='nvxMdp' name='nvxMdp' onclick='displayMdp()' />
                        <span>Modfifer mot de passe</span>
                    </label>
                </p>
                <div class='row' id='champMdp' style='display:none'>
                    <div class='input-field col s6'>
                        <input id='mdp' name='mdp' type='password' class='validate'>
                        <label for='mdp'>Nouveau mot de passe</label>
                    </div>
                    <div class='input-field col s6'>
                        <input id='mdpConfirm' name='mdpConfirm' type='password' class='validate'>
                        <label for='mdpConfirm'>Confirmer nouveau mot de passe</label>
                    </div>
                </div>
                <div class='row'>
                    <div class='col s6'>
                        <p>
                            <label>
                                <input name='droits' type='radio' value='ADMIN' ";
                                if($dataUser['droit'] == "ADMIN"){echo "checked";}
                                else{echo"disabled='disabled'";}
                                echo " />
                                <span>Administrateur</span>
                            </label>
                        </p>
                    </div>
                    <div class='col s6'>
                        <p>
                            <label>
                                <input name='droits' type='radio' value='USER' ";
                                if($dataUser['droit'] == "USER"){echo "disabled='disabled' checked";}
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

        public function modifierUser($iduser, $email, $nom, $prenom, $checkmdp, $mdp, $confirmmdp, $droits, $droitsmodif){ //Fonction servant à modifier les données de l'utilisateur en base
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //Test si l'adresse rentrée est une adresse valide
                $requeteMail = $this->_bdd->prepare("SELECT * FROM user WHERE email = ?");
                $requeteMail->execute(array($email));
                $userExist = $requeteMail->rowCount();
                $requeteAncienMail = $this->_bdd->query("SELECT * FROM user WHERE id_user = ".$iduser);
                $donneesUser = $requeteAncienMail->fetch();
                if($userExist == 1 && $email != $donneesUser['email']){  //Test pour savoir si l'email rentré est déjà utilisé par un autre utilisateur
                    echo "<p class='red-text'>Adresse mail déjà utilisée par un autre utilisateur</p>";
                }
                else{
                    if($checkmdp == true){ //Si l'utilisateur a coché la case Modifier le mot de passe
                        if(!empty($mdp) && !empty($confirmmdp)){
                            if($mdp == $confirmmdp){
                                if($droits == 'ADMIN'){//Si c'est un administrateur on défini les droits selon ce qu'il a choisi
                                    $updateDroitEtMdp = $this->_bdd->query("UPDATE user SET `password` = '".$mdp."' `nom`='".$nom."',`prenom`='".$prenom."',`email`='".$email."',`droit`='".$droitsmodif."' WHERE id_user = ".$iduser);
                                    echo "<p class='green-text'>Modifié avec succès</p>";
                                }
                                else{ //Si c'est un utilisateur normal on ne change pas les droits
                                    $updateMdp = $this->_bdd->query("UPDATE user SET `password` = '".$mdp."' `nom`='".$nom."',`prenom`='".$prenom."',`email`='".$email."' WHERE id_user = ".$iduser);
                                    echo "<p class='green-text'>Modifié avec succès</p>";
                                }   
                            }
                            else{
                                echo "<p class='red-text'>Les deux mots de passes ne correspondent pas</p>";
                            }
                        }
                        else{
                            echo "<p class='red-text'>Merci de remplir les champs mot de passe</p>";
                        }
                    }
                    else{
                        if($droits == 'ADMIN'){ //Si l'utilisateur ne souhaite pas modifier son mdp et qu'il est admin
                            $updateDroit = $this->_bdd->query("UPDATE user SET `nom`='".$nom."',`prenom`='".$prenom."',`email`='".$email."',`droit`='".$droitsmodif."' WHERE id_user = ".$iduser);
                            echo "<p class='green-text'>Modifié avec succès</p>";
                        }
                        else{ //Si l'utilisateur ne souhaite pas modifier son mdp et qu'il n'est pas admin
                            $update = $this->_bdd->query("UPDATE user SET `nom`='".$nom."',`prenom`='".$prenom."',`email`='".$email."' WHERE id_user = ".$iduser);
                            echo "<p class='green-text'>Modifié avec succès</p>";
                        }
                    }
                }
            }
            else{
                echo "<p class='red-text'>Merci de rentrer une adresse mail valide</p>";
            }
        }
    }

?>