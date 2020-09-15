<?php
class Admin
{
    public function afficheUser()
    {

        $bdd = new PDO('mysql:host=localhost; dbname=geoboat; charset=utf8', 'root', '');
        $response = $bdd->query("SELECT * FROM user ");
        while ($donneesBrutes = $response->fetch()) {
            echo "<tr><td>" . $donneesBrutes['nom'] . "</td>";
            echo "<td>" . $donneesBrutes['prenom'] . "</td>";
            echo "<td>" . $donneesBrutes['email'] . "</td>";
            echo "<td>" . $donneesBrutes['droit'] . "</td>";
            echo "<td>" . $donneesBrutes['password'] . "</td></tr>";
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
}
