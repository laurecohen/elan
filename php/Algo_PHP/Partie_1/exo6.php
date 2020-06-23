<?php

/* Exercice 6
Affichage :
Prix unitaire de l’article : 9.99 €
Quantité : 5
Taux de TVA : 0.2
Le montant de la facture à régler est de : 59.94 € */

$prixHT = 9.99;
$nbArticles = 5;
$taux = 0.2;

$result = ($prixHT + ($prixHT *$taux)) * $nbArticles;
echo "Le montant de la facture à régler est de : $result €";