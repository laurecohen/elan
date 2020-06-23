<?php

/* Exercice 10
Affichage :
Montant à payer : 152 €
Montant versé : 200 €
Reste à payer : 48 €
***************************************************
Rendue de monnaie :
4 billets de 10 € - 1 billet de 5 € - 1 pièce de 2 € - 1 pièce de 1 € */

$montantP = 152;
$montantV = 200;
$reste = $montantV - $montantP;
echo "Montant à payer : $montantP €<br>Montant versé : $montantV €<br>Reste à payer : $reste €<br>***************************************************<br>";

$nbBillets10 = floor($reste/10);
$reste = $reste % 10;
$nbBillets5 = floor($reste/5);
$reste = $reste % 5;
$nbPieces2 = floor($reste/2);
$reste = $reste % 2;

echo "Rendu de monnaie :<br>$nbBillets10 billets de 10 € - $nbBillets5 billet de 5 € - $nbPieces2 pièce de 2 € - $reste pièce de 1 €";


