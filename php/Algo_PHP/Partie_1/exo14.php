<?php

/* Exercice 14 
Affichage (si la date courante est le 21/05/2018 et la date de naissance le 17/01/1985 :
Age de la personne : 33 ans 4 mois 4 jours */

$datetime1 = new DateTime();
$datetime2 = new DateTime("1985-01-17");

echo "Âge de la personne : ".(date_diff($datetime1, $datetime2))->format("%y ans %m mois %d jours");