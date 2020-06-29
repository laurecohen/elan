<?php

/* Exercice 8 
Affichage (pour la table de 8) :
Table de 8 :
1 x 8 = 8
2 x 8 = 16
3 x 8 = 24 … */

$nb = 1;
echo "Table de $nb : <br>";

for ($i=1; $i <= 10; $i++) { 
    $result = $nb * $i;
    echo "$nb x $i = $result <br>";
}

echo "<br>Table de $nb : <br>";
$j = 1;
while ($j < 10) {
    $result = $nb * $j;
    echo "$nb x $j = $result <br>";
    $j++; 
}

