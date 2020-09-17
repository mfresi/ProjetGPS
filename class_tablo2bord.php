<?php
    class tablo2bord{

        private $_bdd;

        public function __construct(){
            $this->_bdd = new PDO('mysql:host=localhost; dbname=geoboat; charset=utf8', 'root', '');
        }

        public function bienvenueUser($iduser){
            $requeteUser = $this->_bdd->query("SELECT * FROM user WHERE id_user = ".$iduser);
            $donneesUser = $requeteUser->fetch();
            echo "
                <div class='center-align'>
                    <h3 style='margin-top:25%;'>Bienvenue ".$donneesUser['prenom']."</h3>
                    <h6>Heureux de vous (re)voir parmis nous :)</h6>
                </div>
            ";
        }

        public function bateauInfo($iduser){
            $requeteUserExist = $this->_bdd->prepare("SELECT * FROM `assoc_bateau-user` WHERE id_user = ?");
            $requeteUserExist->execute(array($iduser));
            $userExist = $requeteUserExist->rowCount();
            if($userExist == 1){  
                $requeteBateau = $this->_bdd->query("SELECT * FROM `bateau` INNER JOIN `assoc_bateau-user` ON `bateau`.id_bateau = `assoc_bateau-user`.id_bateau AND `assoc_bateau-user`.id_user = ".$iduser);
                $donneesBateau = $requeteBateau->fetch();
                echo "
                    <div class='center-align'>
                        <h5>Bateau<i class='material-icons'>directions_boat</i></h5>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Marque</th>
                                <th>Type</th>
                ";
                if(!empty($donneesBateau['vitesse'])){
                    echo "      <th>Vitesse</th>";
                }
                if(!empty($donneesBateau['longitude'])){
                    echo "      <th>Longitude</th>";
                }
                if(!empty($donneesBateau['latitude'])){
                    echo "      <th>Latitude</th>";
                }
                echo "
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>".$donneesBateau['nom']."</td>
                                <td>".$donneesBateau['marque']."</td>
                                <td>".$donneesBateau['type']."</td>
                ";
                if(!empty($donneesBateau['vitesse'])){
                    echo "      <td>".$donneesBateau['vitesse']." km/h</td>";
                }
                if(!empty($donneesBateau['longitude'])){
                    echo "      <td>".$donneesBateau['longitude']." km/h</td>";
                }
                if(!empty($donneesBateau['latitude'])){
                    echo "      <td>".$donneesBateau['latitude']." km/h</td>";
                }
                echo "
                                <td>".$donneesBateau['longitude']."</td>
                                <td>".$donneesBateau['latitude']."</td>
                            </tr>
                        </tbody>
                    </table>
                ";
            }
            else{
                echo "
                    <div class='center-align' id='noBoat'>
                        <p style='margin-top:25%;'>Vous n'avez pas de bateau.</p>
                        <button class='btn waves-effect waves-light' onclick='displayAddBoat()' name='submitLogin'>Ajouter un bateau
                            <i class='material-icons right'>add</i>
                        </button>
                        </form>
                    </div>
                ";
            }
        }

        public function ajouterBato($nom, $marque, $type,$id){
            $requeteAjoutBato = $this->_bdd->query("INSERT INTO `bateau`(`id_bateau`, `nom`, `marque`, `type`, `vitesse`, `longitude`, `latitude`) VALUES (NULL,'".$nom."','".$marque."','".$type."',NULL,NULL,NULL)");
            $id_bateau = $this->_bdd->lastInsertId();
            $requeteAjoutAssoc = $this->_bdd->query("INSERT INTO `assoc_bateau-user`(`id_user`,`id_bateau`) VALUES ('".$id."','".$id_bateau."')");
        }
    }
?>