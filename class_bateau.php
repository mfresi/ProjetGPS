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
        $requeteBateau = $this->_bdd->query("SELECT * FROM `bateau` INNER JOIN `assoc_bateau-user` ON `bateau`.id_bateau = `assoc_bateau-user`.id_bateau AND `assoc_bateau-user`.id_user = ".$iduser);
        $donneesBateau = $requeteBateau->fetch();
        if($donneesBateau != NULL){
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
                        <th>Vitesse</th>
                        <th>Longitude</th>
                        <th>Latitude</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>".$donneesBateau['nom']."</td>
                        <td>".$donneesBateau['marque']."</td>
                        <td>".$donneesBateau['type']."</td>
                        <td>".$donneesBateau['vitesse']." km/h</td>
                        <td>".$donneesBateau['longitude']."</td>
                        <td>".$donneesBateau['latitude']."</td>
                    </tr>
                </tbody>
            </table>
            ";
        }
    }
}