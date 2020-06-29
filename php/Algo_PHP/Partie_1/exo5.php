<?php

/* Exercice 5
Affichage : Montant en francs : 100
100 francs = 15.24 € */

$value = 100;
$result = number_format($value / 6.55957, 2, ',', ' ');
echo "Montant en francs : $value <br>$value francs = $result €";