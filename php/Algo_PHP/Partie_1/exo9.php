<?php

/* Exercice 9
Affichage :
Age : 32
Sexe : F
La personne est imposable. */

$age = 17;
$sexe = "F";
$msg = "";

if (($sexe === "F" && $age > 18 && $age <35) || ($sexe === "H" && $age > 20)){
    $msg = "imposable";
} else {
    $msg = "non imposable";
}
echo "Age : $age<br>Sexe : $sexe<br>La personne est $msg";