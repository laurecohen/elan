<?php

/* Exercice 13
Affichage :
Les notes obtenues par l’élève sont : 10 12 8 19 3 16 11 13 9
Sa moyenne générale est donc de : 11.22 */

$notes = [10, 12, 8, 19, 3, 16, 11, 13, 9];
$array_pieces = implode(" ", $notes);
echo "Les notes obtenues par l'élève sont : $array_pieces<br>";

$moyenne = number_format(array_sum($notes) / count($notes), 1, ',', ' ');
echo "Sa moyenne générale est donc de : $moyenne";