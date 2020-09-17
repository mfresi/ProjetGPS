<?php
class bateau
{
    private $_bdd;

    public function __construct(){
        $this->_bdd = new PDO('mysql:host=localhost; dbname=geoboat; charset=utf8', 'root', '');
    }
    public function afficherUser()
    {
        $response = $this->_bdd->query("SELECT * FROM user");
        while ($donneesBrutes = $response->fetch()) {
            echo "<option value='".$donneesBrutes['id_user']."'>".$donneesBrutes['nom']." ".$donneesBrutes['prenom']."</option>";
        }
    }
    public function afficherBateau($iduser){
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
            <table class='highlight'>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Marque</th>
                        <th>Type</th>
                        ";
            if(!empty($donneesBateau['vitesse'])){
                echo "  <th>Vitesse</th>";
            }
            if(!empty($donneesBateau['longitude'])){
                echo "  <th>Longitude</th>";
            }
            if(!empty($donneesBateau['latitude'])){
                echo "  <th>Latitude</th>";
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
                echo "  <td>".$donneesBateau['vitesse']." km/h</td>";
            }
            if(!empty($donneesBateau['longitude'])){
                echo "  <td>".$donneesBateau['longitude']." km/h</td>";
            }
            if(!empty($donneesBateau['latitude'])){
                echo "  <td>".$donneesBateau['latitude']." km/h</td>";
            }
            echo "
                    </tr>
                </tbody>
            </table>
            ";
        }
    }
}