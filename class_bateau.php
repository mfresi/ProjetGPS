<?php
class bateau
{
    public function afficherName()
    {

        $bdd = new PDO('mysql:host=localhost; dbname=geoboat; charset=utf8', 'root', '');
        $response = $bdd->query("SELECT * FROM bateau ");
        while ($donneesBrutes = $response->fetch()) {
            echo "<tr><td>" . $donneesBrutes['nom'] . "</td>";
        }
    }
}