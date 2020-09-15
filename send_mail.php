<html>
    <head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
<?php

$prenom = 'Florian';
$message = '<h3 style="margin-top:30%;"><i class="large material-icons">directions_boat</i>GeoBoat</h3>
<div class="bonjour">
    <p>
        Bonjour '.$prenom.', On dirait que vous venez de rejoindre Geoboat ! Nous sommes passionnés
        d\'aider les jeunes marin à naviguer et a se repérer en mer !
    </p>
</div>
<p> Voici nos meilleurs conseils pour vous aider à démarrer </p>
<li> Lire le <a href=""> guide de démarrage </a>
<li> <a href=""> abonnez vous </a> au forum communautaire pour vous tenir au courant des dernières nouvelles et obtenir des réponses.
</div>';

mail('floflobg1999@hotmail.fr', 'Bienvenue sur GeoBoat', $message); 

echo 'envoyé';?>

</html>

