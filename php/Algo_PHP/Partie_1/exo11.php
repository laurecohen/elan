<?php

/* Exercice 11
Affichage (attention à utiliser une liste à puces)
Il y a 4 marques de voitures dans le tableau :
Peugeot
Renault
BMW
Mercedes */

$voitures = ["Peugeot","Renault","BMW","Mercedes"];
$nbVoitures = count($voitures);
echo "Il y a $nbVoitures marques de voitures dans le tableau :<ul>";

foreach ($voitures as $voiture) {
    echo "<li>$voiture</li>";
}

echo "</ul>";